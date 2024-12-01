<?php
    session_start();
include("../logica/conexion.php");
$con=conectar();
// Generar el próximo user_id
$sql = "SELECT MAX(id) AS id FROM clientes";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$max_id = $row['id'] ?? 0;
$new_id = $max_id + 1;
$new_reg_id = 'REG-' . str_pad($new_id, 6, '0', STR_PAD_LEFT);

if (isset($_GET['id'])) {
    include('../logica/edit_clientes.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perusis</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/sweetalert2.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="../css/t_clientes.css">
    <link rel="stylesheet" href="../css/poptic.css">
    <link rel="stylesheet" href="../css/navcliente.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/autofill/2.7.0/css/autoFill.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
/* Estilos para el modal */
.table thead th {

    text-align: center;
    vertical-align: middle;
    font-size: 12px;
}

.table tbody td {

    vertical-align: middle;
    font-size: 12px;
}

.table .btn {
    font-size: 12px;
    /* Ajusta el tamaño de la fuente de los botones */
    padding: 4px 8px;
    /* Ajusta el padding de los botones */
}

.popup-form {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    /* Fondo semitransparente */
    padding-top: 60px;
    /* Alineación del contenido */
}

/* Estilos para el contenido del modal */
.popup-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 800px;
    /* Anchura máxima */
    border-radius: 5px;
}

/* Estilos para el botón de cierre */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
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
            <!--<img src="../recursos/logo2.png" alt="Logo" class="logo">-->
            <!-- <div class="logo-text-container">
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
        <div class="table-wrapper">
            <div class="col-md-18">
                <div class="content bg-plomo p-3 rounded" style=" background-color: #ebf0f5;">
                    <h2 class="mb-4">Clientes</h2>

                    <div class="row">
                        <div class="col text-left mb-3">
                            <button class="btn btn-outline-secondary submit-btn" type="submit"
                                onclick="openFormRegistrar()" value="Registrarse">Registrar Servicio</button>
                        </div>
                        <div class="col text-right mb-6">
                            <button class="btn btn-outline-secondary submit-btn" type="submit"
                                onclick="mostrarFormulario('formTicket')" value="Generar Ticket">Generar Ticket</button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="min">De:</label>
                            <input type="text" id="min" class="form-control" placeholder="YYYY/MM/DD">
                        </div>
                        <div class="col-md-3">
                            <label for="max">A:</label>
                            <input type="text" id="max" class="form-control" placeholder="YYYY/MM/DD">
                        </div>
                        <div class="col-md-3">
                            <label for="status">Estado:</label>
                            <select id="status" class="form-control">
                                <option value="">Todos</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="proceso">En proceso</option>
                                <option value="finalizado">Finalizado</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>N° REGIS</th>
                                    <th>EMISION</th>
                                    <th>ENTREGA/FIN</th>
                                    <th>DNI</th>
                                    <th>CLIENTE</th>
                                    <th>TELEFONO</th>
                                    <th>MARCA</th>
                                    <th>TIPO</th>
                                    <th>SERVICIO</th>
                                    <th>DESCRIPCION</th>
                                    <th>ESTADO</th>
                                    <th>EDIT</th>
                                    <th>TK</th>
                                    <th>AC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    $query = "SELECT * FROM clientes";
                    $resultado = mysqli_query($con, $query);    
                    while($row = mysqli_fetch_array($resultado)) { ?>
                                <tr>
                                    <td><?php echo 'REG-'.$row['numero_registro'] ?></td>
                                    <td><?php echo $row['fecha_emision'] ?></td>
                                    <td><?php echo $row['fecha_vencimiento'] ?></td>
                                    <td><?php echo $row['dni'] ?></td>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['telefono'] ?></td>
                                    <td><?php echo $row['marca'] ?></td>
                                    <td><?php echo $row['tipo'] ?></td>
                                    <td><?php echo $row['servicio'] ?></td>
                                    <td><?php echo $row['descripcion'] ?></td>
                                    <td><?php echo $row['estado'] ?></td>
                                    <td><a href="../logica/edit_clientes1.php?id=<?php echo $row['id']?>"
                                            class="btn btn-secondary">
                                            <i class="fas fa-marker"></i></a>
                                    </td>
                                    <td>
                                    <a href="../vistas/verticket.php?numero_registro=<?php echo $row['numero_registro']; ?>"
                                            class="btn btn-secondary" target="_blank">
                                            <i class="fas fa-ticket-alt"></i>
                                        </a>
                                    </td>
                                    <td>
                                    <a href="#" class="btn btn-secondary" title="Actualizar Estado"
                                            onclick="confirmarActualizacion('<?php echo $row['numero_registro']; ?>', '<?php echo $row['estado']; ?>')">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                    <!--<td>
                                        <a href="../vistas/verticket.php?numero_registro=<?php echo $row['numero_registro']; ?>"
                                            class="btn btn-secondary" target="_blank">
                                            <i class="fas fa-ticket-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-secondary" title="Actualizar Estado"
                                            onclick="confirmarActualizacion('<?php echo $row['numero_registro']; ?>', '<?php echo $row['estado']; ?>')">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>-->
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--formulario de registro servicios-->
    <div id="formRegistrar" class="popup-form">
        <div class="popup-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="text-center m-b-3">
                <h2 class="mb-5">REGISTRO DE CLIENTE Y SERVICIO</h2>
            </div>
            <form action="../logica/clientes.php" method="POST">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>EMPRESA <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="nombre_empresa"
                                value="<?php echo('PERUSIS'); ?>" name="nombre_empresa"
                                placeholder="Nombre de la Empresa" readonly>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>N° REGISTRO <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="numero_registro" name="numero_registro"
                                placeholder="Número de Registro/Orden" value="<?php echo $new_reg_id; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>FECHA EMISION <span class="text-danger">*</span></label>
                            <input class="form-control" type="date" id="fecha_emision" name="fecha_emision"
                                value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>FECHA ENTREGA <span class="text-danger">*</span></label>
                            <input class="form-control" type="date" id="fecha_vencimiento" name="fecha_vencimiento"
                                placeholder="Fecha de Vencimiento" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>DNI <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="dni" name="dni" placeholder="DNI" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>NOMBRE Y APELLIDOS<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre"
                                required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>TELEFONO <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="telefono" name="telefono" placeholder="Telefono"
                                required>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>MARCA <span class="text-danger">*</span></label>
                            <input list="marcas" class="form-control" name="marca" id="marca"
                                placeholder="Escribe o selecciona una marca" required>
                            <datalist id="marcas">
                                <?php
                    $q = "SELECT marca FROM marca";
                    $resultado = mysqli_query($con, $q);
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo '<option value="' . $row['marca'] . '">';
                    }
                    ?>
                            </datalist>

                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Tipo <span class="text-danger">*</span></label>
                            <select type="checkbox" class="form-control" name="tipo" id="tipo" required>
                                <option value="">Seleccionar</option>
                                <?php
                         $q = "SELECT tipo FROM tipo";
                         $resultado = mysqli_query($con, $q);
                           while($row = mysqli_fetch_array($resultado)){ 
                       ?>
                                <option value="<?php echo $row['tipo']; ?>"><?php echo $row['tipo'] ; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Servicio <span class="text-danger">*</span></label>
                            <input list="servicios" class="form-control" name="servicio" id="servicio"
                                placeholder="Escribe o selecciona un servicio" required>
                            <datalist id="servicios">
                                <?php
                    $q = "SELECT servicio FROM servicios";
                    $resultado = mysqli_query($con, $q);
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo '<option value="' . $row['servicio'] . '">';
                    }
                    ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Descripcion <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion"
                                required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center m-b-3">
                            <button class="btn btn-outline-secondary submit-btn" type="submit">REGISTRAR</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--ventana generar ticket-->
    <div class="popup-form1" id="formTicket" style="display: none;">
        <span class="close" onclick="closeModal()" style="color: black;">&times;</span>
        <h2>TICKET</h2>
        <form action="../ticket/ticket.php" method="POST">
            <div class="col-sm-15">
                <div class="form-group">
                    <label>N° de Registro: <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" d="numero_registro" name="numero_registro"
                        placeholder="Servicio" required>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="form-group">
                    <input type="submit" value="Generar ticket">
                </div>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/actualizar_estado.js"></script>

    <script src="path/to/sweetalert2.all.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/autofill/2.7.0/js/dataTables.autoFill.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Custom Script -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/tablass.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            autoFill: true,
            paging: true,
            searching: true,
            order: [
                [0, 'desc'] // Ordenar la primera columna (índice 0) de manera descendente
            ],
            columnDefs: [{
                targets: 1, // Segunda columna (índice 1 en base 0) para las fechas
                render: function(data, type, row) {
                    if (type === 'display' || type === 'filter') {
                        // La fecha ya está en el formato correcto
                        return data;
                    }
                    return data; // Devolver la fecha en su formato original para otros tipos
                }
            }],
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });

        // Filtrar por fecha y estado
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#min').datepicker("getDate");
                var max = $('#max').datepicker("getDate");
                var startDate = new Date(data[1]); // Convertir la fecha a un objeto de fecha
                var status = $('#status').val().toLowerCase().trim();
                var recordStatus = data[10].toLowerCase().trim(); // Ajusta según la columna de estado

                if ((min === null && max === null) ||
                    (min === null && startDate <= max) ||
                    (max === null && startDate >= min) ||
                    (startDate <= max && startDate >= min)) {
                    if (status === "" || recordStatus.toLowerCase() === status.toLowerCase()) {
                        return true;
                    }
                }
                return false;
            }
        );

        // Inicializar Datepicker con el formato 'yy-mm-dd'
        $('#min, #max').datepicker({
            dateFormat: 'yy-mm-dd'
        });

        // Evento para actualizar el filtrado por fecha y estado
        $('#min, #max, #status').change(function() {
            table.draw();
        });
    });

    function openFormRegistrar() {
        document.getElementById("formRegistrar").style.display = "block";
    }

    function openFormTicket(id) {
        // Aquí puedes agregar lógica para obtener los datos del cliente usando AJAX
        // y llenar los campos del formulario de edición con esos datos.
        // Por ahora, simplemente mostramos el modal.
        document.getElementById("formTicket").style.display = "block";
    }

    function closeModal() {
        document.getElementById("formRegistrar").style.display = "none";
        document.getElementById("formTicket").style.display = "none";
    }

    document.getElementById("registrarBtn").addEventListener("click", openFormRegistrar);

    // función para el botón actualizar
    document.getElementById("updateForm").addEventListener("submit", function(event) {
        // Prevenir el envío del formulario
        event.preventDefault();
        // Redireccionar a la otra vista después de enviar el formulario
        window.location.href = "../vistas/dashboard.php";
    });

    function mostrarFormulario(id) {
        $('.popup-form1').hide(); // Ocultar todos los formularios con la clase popup-form1
        $('#' + id).fadeIn(); // Mostrar el formulario correspondiente
    }

    $(document).mouseup(function(e) {
        var container = $(".popup-form1");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.fadeOut();
        }
    });
    </script>
</body>

</html>