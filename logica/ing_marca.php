<?php
include("conexion.php");
$con=conectar();

$Id='';
$marca=$_POST['marca'];
$creacion= date('Y-m-d H:i:s');

$sql="INSERT INTO marca(Id, marca, fecha_creacion) VALUES('$Id','$marca','$creacion')";
$query= mysqli_query($con,$sql);

if($query){
        Header("Location: ../vistas/configuracion.php");
    }
?>