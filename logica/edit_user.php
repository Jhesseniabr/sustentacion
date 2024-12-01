<?php
include("conexion.php");
$con = conectar();

// Verificar si se está editando un usuario específico
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM usuario WHERE id=$id";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nom_apellido'];
        $dni = $row['dni'];
        $telefono = $row['telefono'];
        $correo = $row['correo'];
        $user = $row['user_id'];
        $turno = $row['turno'];
        $rol = $row['rol'];
        $usuario = $row['usuario'];
        $clave = $row['clave'];
    }
}

// Procesar la actualización del usuario
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];

    $query = "UPDATE usuario SET 
                telefono = '$telefono',
                correo = '$correo', 
                rol = '$rol'
              WHERE id = $id";
    mysqli_query($con, $query);
    header('Location: ../vistas/crearcuenta.php'); // Redireccionar después de la actualización
}
?>

<?php include('../vistas/nav1.php'); ?>
<style>
    .password-field {
        position: relative;
    }

    .eye-icon {
        position: absolute;
        top: 60%;
        right: 10px;
        transform: translateY(-10%);
        cursor: pointer;
    }
</style>
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="content">
                <form id="updateForm" action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="content bg-plomo p-4 rounded" style="background-color: #ebf0f5;">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Nombre <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="nombre" name="nombre"
                                        pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" value="<?php echo $nombre;?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="dni">DNI <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="dni" name="dni"
                                        value="<?php echo $dni;?>" redonly>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="telefono">Teléfono<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="telefono" name="telefono"
                                        pattern="[0-9]+" value="<?php echo $telefono;?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="correo">Correo<span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" id="correo" name="correo"
                                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3,}$"
                                        title="Por favor, ingrese un correo electrónico válido"
                                        value="<?php echo $correo;?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="user_id">Id de Usuario<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="user_id" name="user_id"
                                        value="<?php echo $user; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="turno">Turno<span class="text-danger">*</span></label>
                                    <input class="form-control" name="turno" id="turno" required
                                        value="<?php echo $turno;?>">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="rol">Rol<span class="text-danger">*</span></label>
                                    <input class="form-control" name="rol" id="rol" value="<?php echo $rol;?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="user_id">Usuario<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="usuario" name="usuario"
                                        value="<?php echo $usuario;?>" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="password-field">
                                        <label for="clave">Contraseña<span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" id="clave" name="clave"
                                            value="<?php echo $clave;?>" required>
                                        <span toggle="#clave" class="eye-icon fa fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-danger submit-btn" type="submit" name="update">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function togglePassword() {
        var passwordInput = document.getElementById('clave');
        var eyeIcon = document.querySelector('.eye-icon');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    }

    var eyeIcon = document.querySelector('.eye-icon');
    eyeIcon.addEventListener('click', togglePassword);
</script>
<script src="../js/cuentas.js"></script>
