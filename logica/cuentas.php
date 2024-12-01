<?php
include("../logica/conexion.php");
$con = conectar();

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nombre_completo = $nombre . ' ' . $apellido; // Concatenar nombre y apellido
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$turno = $_POST['turno'];
$rol = $_POST['rol'];
$usuario = $_POST['usuario'];
$password = $_POST['clave'];
$fecha = date('Y-m-d');

// Generar el ID de usuario
$sql = "SELECT MAX(id) AS id FROM usuario";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'] ?? 0;
$user_id = 'USER-00' . str_pad($id + 1, 2, '0', STR_PAD_LEFT);

// Encriptar la contraseña
//$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Preparar la consulta de inserción
$sql = "INSERT INTO usuario (nom_apellido, dni, telefono, correo, user_id, turno, rol, usuario, clave, creacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    // Enlazar los parámetros
    mysqli_stmt_bind_param($stmt, "ssssssssss", $nombre_completo, $dni, $telefono, $correo, $user_id, $turno, $rol, $usuario, $password, $fecha);
    
    // Ejecutar la consulta
    if (mysqli_stmt_execute($stmt)) {
        //echo "Registro exitoso";
        header("Location: ../vistas/crearcuenta.php");
    } else {
        echo "Error al registrar: " . mysqli_error($con);
    }
    
    // Cerrar la declaración
    mysqli_stmt_close($stmt);
} else {
    echo "Error al preparar la consulta: " . mysqli_error($con);
}

// Cerrar la conexión
mysqli_close($con);
?>
