<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/nav1.css">
    <style>
        .navbar1 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 3px;
            background-color: #f8f9fa; /* Cambia el color de fondo si es necesario */
            background-image: linear-gradient(90deg, rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40));
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            height: 20px; /* Ajusta el tamaño del logo según sea necesario */
            margin-right: 5px;
        }

        .logo-text-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo-line {
            width: 50%;
            border: 0.5px solid white; /* Ajusta el estilo de la línea según sea necesario */
            margin: 0;
        }

        .logo-text {
            font-size: 13px; /* Ajusta el tamaño de la fuente según sea necesario */
            text-align: center;
            color: white;
        }

        .user-info {
            display: flex;
            align-items: center;
            font-size: 14px; /* Ajusta el tamaño de la fuente según sea necesario */
            color: white; /* Añade esta línea para cambiar el color del texto a blanco */
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 100%;
            margin: 100px auto;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column; /* Cambia la dirección a columna para envolver */
            align-items: center; /* Centra el contenido horizontalmente */
        }

        .profile-pic-container {
            margin-bottom: 20px; /* Añade espacio entre la imagen y la información */
            text-align: center;
        }

        .profile-pic {
            width: 150px; /* Ajusta el tamaño de la imagen de perfil */
            height: 150px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .change-pic {
            font-size: 18px;
            color: #007bff;
            cursor: pointer;
        }

        .profile-info {
            text-align: center; /* Centra el texto dentro del contenedor */
            max-width: 80%; /* Limita el ancho para mantenerlo legible */
        }

        .profile-info label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .profile-info p {
            margin: 5px 0;
        }

        .upload-form {
            margin-top: 20px;
        }

        .upload-btn {
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .upload-btn:hover {
            background-color: #0056b3;
        }

        .file-input {
            display: none;
        }

        .file-label {
            display: inline-block;
            background-color: #f5f5f5;
            padding: 8px 12px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<?php
session_start();
// Incluye el archivo de conexión a la base de datos
include '../logica/conexion.php';

// Obtiene el nombre de usuario de la sesión
$username = $_SESSION['username'];

// Conecta a la base de datos
$con = conectar();

// Consulta para obtener los datos del usuario desde la base de datos
$sql = "SELECT nom_apellido, telefono, rol, correo FROM usuario WHERE usuario = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Obtiene los datos del usuario
    $row = $result->fetch_assoc();
    $nombreUsuario = $row['nom_apellido'];
    $telefonoUsuario = $row['telefono'];
    $cargoUsuario = $row['rol'];
    $correoUsuario = $row['correo'];
} else {
    // Si no se encuentran los datos del usuario, redirige a una página de error o muestra un mensaje
    echo "Error: No se encontraron los datos del usuario.";
    exit();
}
?>
<nav class="navbar1">
    <div class="logo-container">
        <!--<img src="../recursos/logo2.png" alt="Logo" class="logo">-->
        <!--<div class="logo-text-container">
            <span class="logo-text">GRUPO PERUSIS</span>
            <hr class="logo-line">
        </div>-->
    </div>
    <div class="user-info">
        <?php if ($nombreUsuario && $cargoUsuario) { ?>
        Usuario: <?php echo $nombreUsuario; ?> | Privilegio: <?php echo $cargoUsuario; ?>
        <?php } else { ?>
        No se encontraron datos para el número de registro proporcionado.
        <?php } ?>
    </div>
</nav>
<?php include 'sub_nav.php'; ?>
<div class="container col-md-8">
    <div class="profile-pic-container">
        <img src="../recursos/user.jpg" alt="Icono de Perfil" class="profile-pic">
        <div class="change-pic">
            <label for="file-input">
                <i class="fas fa-camera"></i>
            </label>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="upload-form">
                <input type="file" id="file-input" name="fotoPerfil" class="file-input">
                <!--<input type="submit" value="Subir" class="upload-btn">-->
            </form>
        </div>
    </div>
    <div class="profile-info">
        <h2>Perfil de Usuario</h2>
        <label>Nombre Completo:</label>
        <p><?php echo htmlspecialchars($nombreUsuario); ?></p>
        <label>Número de Teléfono:</label>
        <p><?php echo htmlspecialchars($telefonoUsuario); ?></p>
        <label>Rol o Cargo:</label>
        <p><?php echo htmlspecialchars($cargoUsuario); ?></p>
        <label>Correo Electrónico:</label>
        <p><?php echo htmlspecialchars($correoUsuario); ?></p>
    </div>
</div>
</body>
</html>
