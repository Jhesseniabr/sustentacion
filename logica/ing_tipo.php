<?php
include("conexion.php");
$con=conectar();

$Id='';
$tipo=$_POST['tipo'];
$creacion= date('Y-m-d H:i:s');

$sql="INSERT INTO tipo(Id, tipo, fecha_creacion) VALUES('$Id','$tipo','$creacion')";
$query= mysqli_query($con,$sql);

if($query){
        Header("Location: ../vistas/configuracion.php");
    }
?>