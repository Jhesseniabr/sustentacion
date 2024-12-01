<?php
include("conexion.php");
$con=conectar();

$Id='';
$inicio=$_POST['t_inicio'];
$final=$_POST['t_final'];
$creacion= date('Y-m-d H:i:s');

$sql="INSERT INTO turnos(Id, t_inicio, t_final, fecha_creacion) VALUES('$Id','$inicio','$final','$creacion')";
$query= mysqli_query($con,$sql);

if($query){
        Header("Location: ../vistas/configuracion.php");
    }
?>