<?php
// Incluir el archivo de conexión
require 'conexion.php';
$con = conectar();

session_start();

// Obtener los datos del formulario
$numero_registro = $_POST['numero_registro'] ?? '';
$codigo_unico = $_POST['codigo_unico'] ?? '';

// Verificar si se proporcionaron ambos datos
if (!empty($numero_registro) && !empty($codigo_unico)) {
    // Preparar la consulta SQL para obtener la información del cliente
    $sql = "SELECT * FROM clientes WHERE numero_registro = ? AND codigo_unico = ?";

    // Preparar la declaración
    $stmt = mysqli_prepare($con, $sql);

    if (!$stmt) {
        die('Error al preparar la consulta: ' . mysqli_error($con));
    }

    // Enlazar los parámetros
    mysqli_stmt_bind_param($stmt, 'ss', $numero_registro, $codigo_unico);

    // Ejecutar la declaración
    if (!mysqli_stmt_execute($stmt)) {
        die('Error al ejecutar la consulta: ' . mysqli_error($con));
    }

    // Obtener el resultado de la consulta
    $result = mysqli_stmt_get_result($stmt);

    // Verificar si se encontró algún resultado
    if (mysqli_num_rows($result) > 0) {
        // Iniciar sesión y redirigir a la página de inicio de sesión exitosa
        $_SESSION['numero_registro'] = $numero_registro;
        $_SESSION['codigo_unico'] = $codigo_unico;
        header("Location: ../vistas/consultas.php");
        exit();
    } else {
        // Si no se encontraron resultados, mostrar un mensaje de error
        echo "Número de registro y/o código único incorrectos.";
    }

    // Cerrar la declaración
    mysqli_stmt_close($stmt);
} else {
    // Si no se proporcionaron ambos datos, mostrar un mensaje de error
    echo "Por favor, proporcione tanto el número de registro como el código único.";
}

// Cerrar la conexión
mysqli_close($con);
?>
