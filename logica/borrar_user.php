<?php
    include("conexion.php");
    $con=conectar();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM usuario WHERE id = $id";
        $result = mysqli_query($con, $query);
        if(!$result){
            die("Query Failed");
        }
        header('Location: ../vistas/crearcuenta.php');
    }
?>