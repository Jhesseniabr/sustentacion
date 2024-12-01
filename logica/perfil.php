// /logica/perfil.php
<?php
function conectar() {
    include 'conexion.php'; // Incluye el archivo de conexión a la base de datos
    $con = conectar();
}

function getUserData($username) {
    $con = conectar();
    $sql = "SELECT nom_apellido, telefono, rol, correo FROM usuario WHERE usuario = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}
?>
