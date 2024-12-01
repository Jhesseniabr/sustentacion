<?php
include("../logica/conexion.php");
session_start(); // Debe estar al principio, antes de cualquier salida HTML

$con = conectar();
$numero_registro = $_SESSION['numero_registro']; // Asegúrate de haber establecido este valor al inicio de sesión
$query = "SELECT nombre, tipo, marca, descripcion, servicio, estado FROM clientes WHERE numero_registro = '$numero_registro'";
$resultado = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento del Estado del Servicio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        color: #333;
    }

    .container {
        margin-top: 50px;
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        /* Puedes ajustar el porcentaje según lo necesites */
        max-width: 1500px;
        /* O puedes definir un ancho máximo en píxeles */
    }

    .progress-container {
        position: relative;
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 300px;
        /* Altura ajustable según el contenido */
        padding: 20px;
        position: relative;
    }

    .progress-circle {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border: 10px solid #ddd;
        display: none;
        /* Ocultamos todos por defecto */
        justify-content: center;
        align-items: center;
        font-size: 28px;
        font-weight: bold;
        color: #333;
        background-color: #fff;
        position: relative;
        margin-bottom: 40px;
        /* Espacio entre el círculo y el porcentaje */
        margin-left: auto;
        /* Mueve el círculo hacia la derecha */
        overflow: visible;
        /* Permite que el icono salga fuera del círculo */
    }

    .progress-circle span {
        position: absolute;
        top: 50%;
        /* Ajusta la posición vertical al centro */
        left: 50%;
        /* Ajusta la posición horizontal al centro */
        transform: translate(-50%, -50%);
        /* Centra el contenido */
        font-size: 30px;
        color: #000;
        /* Color negro para el texto */
    }

    .progress-circle i {
        font-size: 40px;
        margin-bottom: 10px;
        /* Ajusta el margen inferior del icono */
        position: absolute;
        top: -65px;
        /* Ajusta la posición vertical del icono */
        left: 50%;
        /* Ajusta la posición horizontal */
        transform: translateX(-50%);
        color: #333;
        /* Color del icono */
    }

    .green {
        border-color: green !important;
        color: green !important;
    }

    .progress-line {
        position: absolute;
        width: calc(100% - 220px);
        /* Ajusta el ancho según sea necesario */
        height: 4px;
        background-color: #ddd;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: -1;
    }

    .progress-line .progress-bar {
        height: 4px;
        background-color: #ff8073;
        position: relative;
        width: 0%;
        transition: width 1s ease;
    }

    .vertical-line {
        position: absolute;
        width: 2px;
        height: 100%;
        background-color: #ddd;
        left: 50%;
        transform: translateX(-50%);
        z-index: -1;
    }

    .mensaje-finalizado {
        text-align: center;
        font-size: 25px;
        color: #176403;
        margin-top: 20px;
        font-weight: bold;
    }

    .mensaje-finalizado strong {
        color: #333;
    }

    h1 {
        font-size: 50px;
        /* Tamaño del texto para h1 */
        margin-top: 20px;
        /* Margen superior para h1 */
        margin-bottom: 20px;
        /* Margen inferior para h1 */
        text-align: center;
        /* Alineación centrada para h1 */
        color: #ff8073;
        /* Color de texto para h1 */
        font-weight: bold;
    }

    p {
        font-size: 25px;
        /* Ejemplo de aumentar el tamaño de todos los párrafos */
        line-height: 1.6;
        /* Ajusta el interlineado para mejorar la legibilidad */
        margin-bottom: 10px;
        /* Añade un espacio inferior entre párrafos */
    }

    .navbar {
        font-size: 30px;
        font-weight: bold;
        background-image: linear-gradient(90deg, rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40));
    }


    @media (max-width: 768px) {
        .progress-circle {
            width: 100px;
            height: 100px;
            font-size: 18px;
        }

        .progress-circle span {
            font-size: 20px;
        }

        h1 {
            font-size: 35px;
        }

        p {
            font-size: 25px;
        }

        .navbar {
            font-size: 20px;
        }

        .mensaje-finalizado {
            font-size: 25px;
        }

        /* Ajuste para centrar el círculo y el icono en dispositivos móviles */
        .col-lg-6 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .progress-container {
            height: auto;
            /* Ajuste la altura según sea necesario */
        }
    }
</style>
</head>

<body>
    <?php
    if ($row = mysqli_fetch_array($resultado)) {
        $nombre_cliente = $row['nombre'];
    ?>
    <nav class="navbar navbar-dark bg-danger">
        <span class="navbar-text text-white">
            BIENVENID@, <?php echo $nombre_cliente; ?>, A TU CONSULTA
        </span>
        <li class="nav-item">
            <a class="nav-link text-white" href="../logica/logout.php">
                <i class="fas fa-sign-out-alt"></i>
                REGRESAR
            </a>
        </li>
    </nav>
    <?php } else { ?>
    <nav class="navbar navbar-dark bg-danger">
        <span class="navbar-text text-white">
            No se encontraron datos para el número de registro proporcionado.
        </span>
    </nav>
    <?php } ?>
    <div class="container">
        <h1 class="text-center text-danger">Seguimiento del Estado del Servicio</h1>
        <div class="row">
            <div class="col-lg-6">
                <div class="info mb-3">
                    <p><strong class="text-danger">Tipo de Equipo:</strong> <?php echo $row['tipo'] ?></p>
                    <p><strong class="text-danger">Marca:</strong> <?php echo $row['marca'] ?></p>
                    <p><strong class="text-danger">Servicio:</strong> <?php echo $row['servicio'] ?></p>
                    <p><strong class="text-danger">Descripción:</strong> <?php echo $row['descripcion'] ?></p>
                    <p><strong class="text-danger">Estado:</strong> <?php echo $row['estado'] ?></p>
                    <?php if ($row['estado'] == 'Finalizado') { ?>
                    <div class="mensaje-finalizado">
                        <strong>¡Felicidades!</strong> El servicio que solicitó para su equipo ha sido finalizado. Puede
                        pasar a recogerlo cuando guste. ¡Gracias!
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="progress-container">
                    <div class="vertical-line"></div>
                    <div class="progress-line">
                        <div class="progress-bar" style="width: 0%;"></div>
                    </div>
                    <?php if ($row['estado'] == 'Pendiente') { ?>
                    <div class="progress-circle d-flex justify-content-center align-items-center green" id="circle-0">
                        <i class="fas fa-hourglass-start"></i>
                        <span>0%</span>
                    </div>
                    <?php } elseif ($row['estado'] == 'Proceso') { ?>
                    <div class="progress-circle d-flex justify-content-center align-items-center green" id="circle-50">
                        <i class="fas fa-hourglass-half"></i>
                        <span>50%</span>
                    </div>
                    <?php } elseif ($row['estado'] == 'Finalizado') { ?>
                    <div class="progress-circle d-flex justify-content-center align-items-center green" id="circle-100">
                        <i class="fas fa-check-circle"></i>
                        <span>100%</span>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Ajustar el ancho de la barra de progreso según el estado
        const estado = "<?php echo $row['estado']; ?>";
        let width = 0;
        switch (estado) {
            case 'Pendiente':
                width = 0;
                break;
            case 'Proceso':
                width = 50;
                break;
            case 'Finalizado':
                width = 100;
                break;
            default:
                width = 0;
        }
        document.querySelector('.progress-bar').style.width = width + '%';

        // Mostrar el círculo de progreso correspondiente
        const circleId = `circle-${width}`;
        const circle = document.getElementById(circleId);
        if (circle) {
            circle.style.display = 'flex';
        }
    });
    </script>
</body>

</html>