<?php
include("conexion.php");
$con=conectar();

$Id='';
$servicio=$_POST['servicio'];
$creacion= date('Y-m-d H:i:s');

$sql="INSERT INTO servicios(Id, servicio, fecha_creacion) VALUES('$Id','$servicio','$creacion')";
$query= mysqli_query($con,$sql);

if($query){
    //echo "se registro correctamente";
        Header("Location: ../vistas/configuracion.php");
    }
?>