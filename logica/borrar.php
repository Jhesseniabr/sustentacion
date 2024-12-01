<?php
    include("conexion.php");
    $con=conectar();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM clientes WHERE id = $id";
        $result = mysqli_query($con, $query);
        if(!$result){
            die("Query Failed");
        }
        header('Location: ../vistas/dashboard.php');
    }
?>