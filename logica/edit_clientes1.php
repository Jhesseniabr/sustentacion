<?php
    session_start();
include("conexion.php");
$con = conectar();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM clientes WHERE id=$id";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $registro = $row['numero_registro'];
        $fecha_e = $row['fecha_emision'];
        $fecha_v = $row['fecha_vencimiento'];
        $dni = $row['dni'];
        $nombre = $row['nombre'];
        $telefono = $row['telefono'];
        $marca = $row['marca'];
        $tipo = $row['tipo'];
        $servicio = $row['servicio'];
        $descripcion = $row['descripcion'];
        $estado = $row['estado'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $registro = $_POST['numero_registro'];
    $fecha_e = $_POST['fecha_emision'];
    $fecha_v = $_POST['fecha_vencimiento'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $marca = $_POST['marca'];
    $tipo = $_POST['tipo'];
    $servicio = $_POST['servicio'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];

    $query = "UPDATE clientes SET 
                numero_registro = '$registro', 
                fecha_emision = '$fecha_e', 
                fecha_vencimiento = '$fecha_v',
                dni = '$dni', 
                nombre = '$nombre', 
                telefono = '$telefono', 
                marca = '$marca', 
                tipo = '$tipo', 
                servicio = '$servicio', 
                descripcion = '$descripcion', 
                estado = '$estado' 
              WHERE id = $id";
    mysqli_query($con, $query);
    header('Location: ../vistas/subnav.php');
}
?>
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

<?php include('../vistas/sub_nav.php'); ?>

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

    .user-info {
        display: flex;
        align-items: center;
        font-size: 14px;
        color: white;
        /* Ajusta el tamaño de la fuente según sea necesario */
    }
    </style>

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="content">
                <form id="updateForm" action="edit_clientes1.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="content bg-plomo p-4 rounded" style="background-color: #ebf0f5;">
                        <div class="row">
                            <!-- Form Fields -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>EMPRESA <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="nombre_empresa"
                                           value="<?php echo('PERUSIS'); ?>" name="nombre_empresa"
                                           placeholder="Nombre de la Empresa" readonly>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>N° REGISTRO <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="numero_registro"
                                           name="numero_registro" value="<?php echo $registro;?>"
                                           placeholder="Número de Registro/Orden" readonly>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>FECHA EMISION <span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" id="fecha_emision" name="fecha_emision"
                                           value="<?php echo $fecha_e; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>FECHA ENTREGA <span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" id="fecha_vencimiento"
                                           name="fecha_vencimiento" value="<?php echo $fecha_v; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>DNI <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="dni" name="dni" value="<?php echo $dni; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>NOMBRE <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>TELEFONO <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Marca <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="marca" name="marca" value="<?php echo $marca; ?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Tipo <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="tipo" name="tipo" value="<?php echo $tipo; ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Servicio <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="servicio" name="servicio" value="<?php echo $servicio; ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Descripcion <span class="text-danger">*</span></label>
                                    <input class="form-control" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Estado <span class="text-danger">*</span></label>
                                    <input class="form-control" name="estado" id="estado" value="<?php echo $estado; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="text-center mt-3">
                                    <button class="btn btn-outline-secondary submit-btn" name="update">ACTUALIZAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
