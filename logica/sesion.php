<?php
session_start();
include("conexion.php");
$con=conectar();
    $username = $_SESSION['username']; // Asegúrate de haber establecido este valor al inicio de sesión
    $query = "SELECT nom_apellido, rol FROM usuario WHERE usuario = '$username'";
    $resultado = mysqli_query($con, $query);
    if ($row = mysqli_fetch_array($resultado)) {
        $nombre = $row['nom_apellido'];
        $rol = $row['rol'];
    ?>
    <nav class="navbar1">
    <div class="logo-container">
        <!--<img src="../recursos/logo2.png" alt="Logo" class="logo">-->
        <div class="logo-text-container">
            <span class="logo-text">GRUPO PERUSIS</span>
           <!-- <hr class="logo-line">-->
        </div>
    </div>
    <div class="user-info">
        <?php if ($nombre && $rol) { ?>
        Usuario: <?php echo $nombre; ?> | Privilegio: <?php echo $rol; ?>
        <?php } else { ?>
        No se encontraron datos para el número de registro proporcionado.
        <?php } ?>
    </div>
</nav><?php } ?>