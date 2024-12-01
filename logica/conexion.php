<?php
function conectar(){
    $host="localhost";
    $usuario= "root";
    $clave= ""; 
    $bd="seguimiento";
    $con=mysqli_connect($host,$usuario,$clave);
    mysqli_select_db($con,$bd);
    return $con;
}
?>