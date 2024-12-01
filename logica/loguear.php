<?php
// Incluir el archivo de conexión
require 'conexion.php';
$con = conectar();

// Iniciar sesión
session_start();

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['clave'];

// Consulta para verificar las credenciales del usuario
$query = "SELECT rol FROM usuario WHERE usuario = ? AND clave = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Verificar si se encontró un usuario con las credenciales proporcionadas
if (mysqli_num_rows($result) > 0) {
    // Obtener el rol del usuario
    $fila = mysqli_fetch_assoc($result);
    $rol = $fila['rol'];

    // Establecer la variable de sesión del usuario
    $_SESSION['username'] = $username;

    // Redireccionar según el rol del usuario
    if ($rol === 'Administrador') {
        header("Location: ../vistas/dashboard.php");
        exit(); // Es importante salir del script después de redirigir
    } elseif ($rol === 'Sub-Administrador') {
        header("Location: ../vistas/subnav.php");
        exit(); // Salir del script después de redirigir
    } else {
        // Si el rol no es ni "Administrador" ni "Sub-Administrador", redirigir a una página de error o mostrar un mensaje de error
        header("Location: ../vistas/error.php");
        exit();
    }
} else {
    // Si las credenciales no son válidas, redirigir a la página de inicio de sesión con un mensaje de error
    header("Location: ../vistas/nicio2.php?error=credenciales_invalidas");
    exit();
}
?>
