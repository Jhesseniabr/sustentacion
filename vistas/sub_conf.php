<?php 
    session_start();
    include("../logica/conexion.php");
    $con=conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perusis</title>
    <link rel="stylesheet" href="../css/conf.css">
    <link rel="stylesheet" href="../css/pop.css">
    <link rel="stylesheet" href="../css/navcliente.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
</head>

<body>
    <?php
    $username = $_SESSION['username']; // Asegúrate de haber establecido este valor al inicio de sesión
    $query = "SELECT nom_apellido, rol FROM usuario WHERE usuario = '$username'";
    $resultado = mysqli_query($con, $query);
    if ($row = mysqli_fetch_array($resultado)) {
        $nombre = $row['nom_apellido'];
        $rol = $row['rol'];
    ?>
    <nav class="navbar1">
        <div class="logo-container">
            <!--<img src="../recursos/logo2.png" alt="Logo" class="logo">
        <div class="logo-text-container">
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
    </nav><?php } ?>

    <style>
    .navbar1 {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 3px;
        background-color: #f8f9fa;
        /* Cambia el color de fondo si es necesario */
        background-image: linear-gradient(90deg, rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40));
    }

    .logo-container {
        display: flex;
        align-items: center;
    }

    .logo {
        height: 20px;
        /* Ajusta el tamaño del logo según sea necesario */
        margin-right: 5px;
    }

    .logo-text-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .logo-line {
        width: 100%;
        border: 0.5px solid white;
        /* Ajusta el estilo de la línea según sea necesario */
        margin: 0;
    }

    .logo-text {
        font-size: 13px;
        /* Ajusta el tamaño de la fuente según sea necesario */
        text-align: center;
        text-color: white;
    }

    .user-info {
        display: flex;
        align-items: center;
        font-size: 14px;
        /* Ajusta el tamaño de la fuente según sea necesario */
    }
    </style>


    <?php include 'sub_nav.php'; ?>
    <div class="container-fluid mt-3 my-5">
        <div class="section-summary">
            <div class="summary-item">
                <i class="icon">&#128197;</i> <!-- Icono de calendario para turnos -->
                <h2>Turnos</h2>
                <div class="stat-value" id="totalTurnos">0</div>
                <!--<div class="button-group">
                    <button type="button" role="button" class="read_bt" onclick="mostrarFormulario('formTurno')">Agregar
                        Turno</button>
                </div>-->
            </div>
            <div class="summary-item">
                <i class="icon">&#128230;</i> <!-- Icono de etiqueta para marcas -->
                <h2>Marcas</h2>
                <div class="stat-value" id="totalMarca">0</div>
                <!--<div class="button-group">
                    <button type="button" role="button" class="read_bt" onclick="mostrarFormulario('formMarca')">Agregar
                        Marca</button>
                </div>-->
            </div>
            <div class="summary-item">
                <i class="icon">&#128187;</i> <!-- Icono de monitor para tipos -->
                <h2>Tipos</h2>
                <div class="stat-value" id="totalTipos">0</div>
                <!--<div class="button-group">
                    <button type="button" role="button" class="read_bt" onclick="mostrarFormulario('formTipo')">Agregar
                        Tipo</button>
                </div>-->
            </div>
            <div class="summary-item">
                <i class="icon">&#128736;</i> <!-- Icono de herramienta para servicios -->
                <h2>Servicios</h2>
                <div class="stat-value" id="totalServicios">0</div>
                <!--<div class="button-group">
                    <button type="button" role="button" class="read_bt"
                        onclick="mostrarFormulario('formServicio')">Agregar Servicio</button>
                </div>-->
            </div>
        </div>

        <div class="filter">
            <label for="table-filter">Mostrar tabla:</label>
            <select id="table-filter">
                <option value="turnos">Turnos</option>
                <option value="marcas">Marcas</option>
                <option value="tipos">Tipos</option>
                <option value="servicios">Servicios</option>
            </select>
        </div>

        <div class="tables">
            <table class="data-table dataTable" id="turnos-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hora entrada</th>
                        <th>Hora Salida</th>
                        <th>Fecha de Creacion</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                  $q = "SELECT id, t_inicio, t_final, fecha_creacion FROM turnos";
                  $resultado = mysqli_query($con, $q);    
                  while($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['t_inicio'] ?></td>
                        <td><?php echo $row['t_final'] ?></td>
                        <td><?php echo $row['fecha_creacion'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <table class="data-table dataTable" id="marcas-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Fecha de Creación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  $q = "SELECT id, marca, fecha_creacion FROM marca";
                  $resultado = mysqli_query($con, $q);    
                  while($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['marca'] ?></td>
                        <td><?php echo $row['fecha_creacion'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <table class="data-table dataTable" id="tipos-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Fecha de Creacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  $q = "SELECT id, tipo, fecha_creacion FROM tipo";
                  $resultado = mysqli_query($con, $q);    
                  while($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['tipo'] ?></td>
                        <td><?php echo $row['fecha_creacion'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <table class="data-table dataTable" id="servicios-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Servicio</th>
                        <th>Fecha de Creacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  $q = "SELECT id, servicio, fecha_creacion FROM servicios";
                  $resultado = mysqli_query($con, $q);    
                  while($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['servicio'] ?></td>
                        <td><?php echo $row['fecha_creacion'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Formularios emergentes -->
    <div class="popup-form" id="formTurno">
        <h2>CREAR TURNOS</h2>
        <form action="../logica/reg_turno.php" method="POST">
            <div class="form-group">
                <label for="t_inicio">Hora de Inicio:</label>
                <input type="time" id="t_inicio" name="t_inicio" required>
            </div>
            <div class="form-group">
                <label for="t_final">Hora Salida:</label>
                <input type="time" id="t_final" name="t_final" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar Turno">
            </div>
        </form>
    </div>

    <div class="popup-form" id="formMarca">
        <h2>AGREGAR MARCAS</h2>
        <form action="../logica/ing_marca.php" method="POST">
            <div class="form-group">
                <label for="marca">Nombre:</label>
                <input type="text" id="marca" name="marca" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar Marcas">
            </div>
        </form>
    </div>

    <div class="popup-form" id="formTipo">
        <h2>AGREGAR TIPOS</h2>
        <form action="../logica/ing_tipo.php" method="POST">
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar Tipos">
            </div>
        </form>
    </div>

    <div class="popup-form" id="formServicio">
        <h2>AGREGAR SERVICIOS</h2>
        <form action="../logica/ing_servicios.php" method="POST">
            <div class="form-group">
                <label for="servicio">Nombre:</label>
                <input type="text" id="servicio" name="servicio" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Agregar Servicio">
            </div>
        </form>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script>
    function mostrarFormulario(id) {
        $('.popup-form').hide(); // Ocultar todos los formularios
        $('#' + id).fadeIn(); // Mostrar el formulario correspondiente
    }

    $(document).mouseup(function(e) {
        var container = $(".popup-form");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.fadeOut();
        }
    });

    function actualizarEstadisticas() {
        $.ajax({
            url: '../logica/contar_conf.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#totalTurnos').text(data.total_turnos);
                $('#totalMarca').text(data.total_marcas);
                $('#totalTipos').text(data.total_tipos);
                $('#totalServicios').text(data.total_servicios);
            }
        });
    }

    $(document).ready(function() {
        actualizarEstadisticas();
        setInterval(actualizarEstadisticas, 5000); // Actualiza cada 5 segundos
    });
    </script>
    <script>
    $(document).ready(function() {
        // Función para inicializar DataTables en la tabla seleccionada
        function inicializarDataTable(tablaId) {
            $('#' + tablaId).DataTable({
                "paging": true, // Habilita la paginación
                "pageLength": 5, // Número de filas por página
                // Otros ajustes opcionales que desees configurar
            });
            
        }

        // Función para destruir DataTables en la tabla seleccionada
        function destruirDataTable(tablaId) {
            var dataTable = $('#' + tablaId).DataTable();
            if (dataTable !== undefined) {
                dataTable.destroy();
            }
        }

        // Manejador para cambiar entre las tablas
        $('#table-filter').on('change', function() {
            var tablaSeleccionada = $(this).val();

            // Ocultar todas las tablas
            $('.data-table').hide();

            // Mostrar la tabla seleccionada
            $('#' + tablaSeleccionada + '-table').show();

            // Destruir DataTables en todas las tablas excepto la seleccionada
            $('.data-table').each(function() {
                var tablaId = $(this).attr('id');
                if (tablaId !== tablaSeleccionada + '-table') {
                    destruirDataTable(tablaId);
                }
            });

            // Inicializar DataTable en la tabla seleccionada si no está inicializada aún
            if (!$.fn.DataTable.isDataTable('#' + tablaSeleccionada + '-table')) {
                inicializarDataTable(tablaSeleccionada + '-table');
            }
        });

        // Inicializar la tabla inicialmente seleccionada
        var tablaInicial = $('#table-filter').val();
        $('#' + tablaInicial + '-table').show();
        inicializarDataTable(tablaInicial + '-table');
    });
    
    </script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js">
    </script>

    <script src="../js/conf.js"></script>
</body>

</html>