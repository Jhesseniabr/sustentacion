<?php
    session_start();
include("../logica/conexion.php");
$con = conectar();

// Generar el próximo user_id
$sql = "SELECT MAX(id) AS id FROM usuario";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$max_id = $row['id'] ?? 0;
$new_id = $max_id + 1;
$new_user_id = 'USER-00' . str_pad($new_id, 3, '0', STR_PAD_LEFT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crearcuentas.css">
    <link rel="stylesheet" href="../css/navcliente.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.7.0/css/autoFill.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Perusis</title>
</head>
<body>
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
    font-size: 12px; /* Ajusta el tamaño de la fuente de los botones */
    padding: 4px 8px; /* Ajusta el padding de los botones */
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
</nav><?php } ?>

<style>
    .navbar1 {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 3px;
        background-color: #f8f9fa; /* Cambia el color de fondo si es necesario */
        background-image: linear-gradient(90deg, rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40));
    }

    .user-info {
        display: flex;
        align-items: center;
        font-size: 14px; /* Ajusta el tamaño de la fuente según sea necesario */
    }
</style>
    
<?php include 'nav1.php'; ?>
<div class="container-fluid mt-3 my-5">
        <div class="table-wrapper">
            <div class="col-md-18">
                <div class="content bg-plomo p-3 rounded" style=" background-color: #ebf0f5;">
                    <h2 class="mb-4">USUARIOS</h2>

                    <div class="row">
                        <div class="col text-left mb-3">
                            <button class="btn btn-outline-secondary submit-btn" type="submit"
                                onclick="openFormRegistrar()" value="Registrarse">CREAR</button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="min">Fecha mínima:</label>
                            <input type="text" id="min" class="form-control" placeholder="dd/mm/yyyy">
                        </div>
                        <div class="col-md-3">
                            <label for="max">Fecha máxima:</label>
                            <input type="text" id="max" class="form-control" placeholder="dd/mm/yyyy">
                        </div>
                        <div class="col-md-3">
                            <label for="status">Rol:</label>
                            <select id="status" class="form-control">
                                <option value="">Todos</option>
                                <option value="pendiente">Administrador</option>
                                <option value="proceso">Subadministrado</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>F_CREACION</th>
                                    <th>DNI</th>
                                    <th>NOMBRE</th>
                                    <th>TELEFONO</th>
                                    <th>CORREO</th>
                                    <th>TURNO</th>
                                    <th>CARGO</th>
                                    <th>USUARIO</th>
                                    <th>CLAVE</th>
                                    <th>ACCION</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    $query = "SELECT * FROM usuario";
                    $resultado = mysqli_query($con, $query);    
                    while($row = mysqli_fetch_array($resultado)) { ?>
                                <tr>
                                    <td><?php echo $row['user_id'] ?></td>
                                    <td><?php echo $row['creacion'] ?></td>
                                    <td><?php echo $row['dni'] ?></td>
                                    <td><?php echo $row['nom_apellido'] ?></td>
                                    <td><?php echo $row['telefono'] ?></td>
                                    <td><?php echo $row['correo'] ?></td>
                                    <td><?php echo $row['turno'] ?></td>
                                    <td><?php echo $row['rol'] ?></td>
                                    <td><?php echo $row['usuario'] ?></td>
                                    <td><?php echo $row['clave'] ?></td>
                                    <td><a href="../logica/edit_user.php?id=<?php echo $row['id']?>"
                                            class="btn btn-secondary">
                                            <i class="fas fa-marker"></i></a>
                                            <a href="#" onclick="confirmDeletion(<?php echo $row['id']; ?>)" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="formRegistrar" class="popup-form">
        <div class="popup-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="text-center m-b-3">
                <h2 class="mb-5">CREAR CUENTAS</h2>
            </div>
            <form action="../logica/cuentas.php" method="post" id="registroForm">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Nombre <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="nombre" name="nombre" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="apellido">Apellido <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="apellido" name="apellido" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="dni">DNI <span class="text-danger">*</span></label>
                    <input class="form-control"type="text" id="dni" name="dni" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="telefono">Teléfono<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="telefono" name="telefono" pattern="[0-9]+" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="correo">Correo<span class="text-danger">*</span></label>
                    <input class="form-control" type="email" id="correo" name="correo" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3,}$" title="Por favor, ingrese un correo electrónico válido" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="user_id">Id de Usuario<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="user_id" name="user_id" value="<?php echo $new_user_id; ?>" readonly>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="turno">Turno<span class="text-danger">*</span></label>
                    <select class="form-control" name="turno" id="turno" required>
                        <option value="">Seleccionar</option>
                        <?php
                         $q = "SELECT t_inicio, t_final FROM turnos";
                         $resultado = mysqli_query($con, $q);
                           while($row = mysqli_fetch_array($resultado)){ 
                       ?>
                    <option value="<?php echo $row['t_inicio'] . '-' . $row['t_final']; ?>"><?php echo $row['t_inicio'] . '-' . $row['t_final']; ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="rol">Rol<span class="text-danger">*</span></label>
                    <select class="form-control" name="rol" id="rol" required>
                        <option value="">Seleccionar</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Sub-Administrador">Sub-Administrador</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="user_id">Usuario<span class="text-danger">*</span></label>
                    <input class="form-control" type="text"id="usuario" name="usuario" readonly>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <div class="password-field">
                        <label for="clave">Contraseña<span class="text-danger">*</span></label>
                        <input  class="form-control" type="password" id="clave" name="clave" readonly>
                        <span toggle="#clave" class="eye-icon fa fa-eye-slash"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-t-20 text-center">
        <button class="btn btn-danger submit-btn" type="submit" value="Registrarse">Registrar</button>

            </div>
        </form>
        </div>
    </div>

    <script>
    function confirmDeletion(id) {
        if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
            // Si el usuario confirma, redirige a la URL de eliminación
            window.location.href = '../logica/borrar_user.php?id=' + id;
        }
    }
</script>

    <script src="../js/cuentas.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
    <script src="../js/tablas.js"></script>
</body>
     <!-- Bootstrap JS, Popper.js, and jQuery -->

</body>
</html>
