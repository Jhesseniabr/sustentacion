<?php
// Incluir el archivo de conexión
require 'conexion.php';
$con = conectar();

// Iniciar la transacción
mysqli_begin_transaction($con, MYSQLI_TRANS_START_READ_WRITE);

try {
    // Generar el número de registro único
    function generarNumeroRegistro($con) {
        // Bloquear la tabla para evitar conflictos de concurrencia
        $lockResult = mysqli_query($con, "LOCK TABLES clientes WRITE");

        if (!$lockResult) {
            throw new Exception('Error al bloquear la tabla: ' . mysqli_error($con));
        }

        // Encontrar el máximo número de registro en la tabla
        $result = mysqli_query($con, "SELECT MAX(id) AS max_numero FROM clientes FOR UPDATE");
        if (!$result) {
            throw new Exception('Error al obtener el máximo número de registro: ' . mysqli_error($con));
        }

        $row = mysqli_fetch_assoc($result);
        $maxNumero = $row['max_numero'];

        // Incrementar el número máximo para obtener el siguiente número de registro
        $nextNumero = $maxNumero + 1;

        // Desbloquear la tabla
        mysqli_query($con, "UNLOCK TABLES");

        return $nextNumero;
    }

    // Generar el número de registro con formato REG-XXXXX
    $numero_registro = str_pad(generarNumeroRegistro($con), 6, '0', STR_PAD_LEFT);

    // Obtener los datos del formulario
    $fecha_emision = $_POST['fecha_emision'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $marca = $_POST['marca'];
    $tipo = $_POST['tipo'];
    $servicio = $_POST['servicio'];
    $descripcion = $_POST['descripcion'];

    // Generar el código único
    function generarCodigoUnico($con, $nombre, $dni) {
        $nombres = explode(' ', $nombre);
        $apellido1 = isset($nombres[count($nombres) - 2]) ? $nombres[count($nombres) - 2] : '';
        $apellido2 = isset($nombres[count($nombres) - 1]) ? $nombres[count($nombres) - 1] : '';
        $iniciales = strtoupper(substr($apellido1, 0, 1) . substr($apellido2, 0, 1));
        $ultimosCuatroDNI = substr($dni, -4);

        $codigoBase = $iniciales . $ultimosCuatroDNI;
        $codigoUnico = $codigoBase;
        $suffix = 1;

        // Verificar si el código único ya existe
        $result = mysqli_query($con, "SELECT COUNT(*) AS count FROM clientes WHERE codigo_unico = '$codigoUnico'");
        $row = mysqli_fetch_assoc($result);
        while ($row['count'] > 0) {
            $codigoUnico = $codigoBase . '-' . $suffix;
            $suffix++;
            $result = mysqli_query($con, "SELECT COUNT(*) AS count FROM clientes WHERE codigo_unico = '$codigoUnico'");
            $row = mysqli_fetch_assoc($result);
        }

        return $codigoUnico;
    }

    $codigo_unico = generarCodigoUnico($con, $nombre, $dni);

    // Definir el estado inicial
    $estado = 'Pendiente';

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO clientes (numero_registro, fecha_emision, fecha_vencimiento, dni, nombre, telefono, marca, tipo, servicio, descripcion, codigo_unico, estado) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = mysqli_prepare($con, $sql);

    if (!$stmt) {
        throw new Exception('Error al preparar la declaración: ' . mysqli_error($con));
    }

    // Enlazar los parámetros
    mysqli_stmt_bind_param($stmt, 'ssssssssssss', $numero_registro, $fecha_emision, $fecha_vencimiento, $dni, $nombre, $telefono, $marca, $tipo, $servicio, $descripcion, $codigo_unico, $estado);

    // Ejecutar la declaración
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception('Error al ejecutar la declaración: ' . mysqli_error($con));
    }

    // Confirmar la transacción
    mysqli_commit($con);

    // Redirigir a la página de éxito o mostrar un mensaje de éxito
    header("Location: ../vistas/dashboard.php");
    exit();
} catch (Exception $e) {
    // Revertir la transacción en caso de error
    mysqli_rollback($con);
    // Mostrar un mensaje de error
    echo "Error: " . $e->getMessage();
} finally {
    // Cerrar la declaración y la conexión
    if (isset($stmt)) {
        mysqli_stmt_close($stmt);
    }
    mysqli_close($con);
}
?>
