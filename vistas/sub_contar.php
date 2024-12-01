<?php
session_start();
include("../logica/conexion.php");
$con = conectar();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de Clientes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/poptic.css">
    <link rel="stylesheet" href="../css/navcliente.css">
    <style>
        .stat-box {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 150px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 20px auto; /* Centrar los elementos */
            text-align: center; /* Centrar el texto */
        }

        .stat-icon {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .stat-title {
            font-size: 18px;
            font-weight: bold;
        }

        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #17a2b8;
        }
    </style>
</head>

<body>
    <?php
    $username = $_SESSION['username'];
    $query = "SELECT nom_apellido, rol FROM usuario WHERE usuario = '$username'";
    $resultado = mysqli_query($con, $query);
    if ($row = mysqli_fetch_array($resultado)) {
        $nombre = $row['nom_apellido'];
        $rol = $row['rol'];
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
                <?php if ($nombre && $rol) { ?>
                    Usuario: <?php echo $nombre; ?> | Privilegio: <?php echo $rol; ?>
                <?php } else { ?>
                    No se encontraron datos para el número de registro proporcionado.
                <?php } ?>
            </div>
        </nav>
    <?php } ?>

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
            width: 10%;
            border: 0.5px solid white; /* Ajusta el estilo de la línea según sea necesario */
            margin: 0;
        }

        .logo-text {
            font-size: 13px; /* Ajusta el tamaño de la fuente según sea necesario */
            text-align: center;
            text-color: white;
        }

        .user-info {
            display: flex;
            align-items: center;
            font-size: 14px; /* Ajusta el tamaño de la fuente según sea necesario */
        }
    </style>
    <?php include 'sub_nav.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="stat-box">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-title">Total Clientes</div>
                    <div class="stat-value" id="totalClientes">0</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="stat-box">
                    <div class="stat-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="stat-title">Total Trabajos</div>
                    <div class="stat-value" id="totalTrabajos">0</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="stat-box">
                    <div class="stat-icon">
                        <i class="fas fa-hourglass-start"></i>
                    </div>
                    <div class="stat-title">Pendiente</div>
                    <div class="stat-value" id="totalPendiente">0</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="stat-box">
                    <div class="stat-icon">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <div class="stat-title">En Proceso</div>
                    <div class="stat-value" id="totalProceso">0</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="stat-box">
                    <div class="stat-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="stat-title">Finalizado</div>
                    <div class="stat-value" id="totalFinalizado">0</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="stat-box">
                    <div class="stat-icon">
                        <i class="fas fa-laptop-medical"></i>
                    </div>
                    <div class="stat-title">Entregado</div>
                    <div class="stat-value" id="totalEntregados">0</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script>
        function actualizarEstadisticas() {
            $.ajax({
                url: '../logica/conteo.php',
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    $('#totalClientes').text(data.total_clientes);
                    $('#totalTrabajos').text(data.total_trabajos);
                    $('#totalPendiente').text(data.total_pendiente);
                    $('#totalProceso').text(data.total_proceso);
                    $('#totalFinalizado').text(data.total_finalizado);
                    $('#totalEntregados').text(data.total_entregados);
                }
            });
        }

        $(document).ready(function() {
            actualizarEstadisticas();
            setInterval(actualizarEstadisticas, 5000); // Actualiza cada 5 segundos
        });
    </script>
</body>

</html>
