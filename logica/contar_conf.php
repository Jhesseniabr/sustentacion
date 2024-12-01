<?php
include("../logica/conexion.php");
$con = conectar();

// Obtener el número total de turnos
$query_total_turnos = "SELECT COUNT(*) AS total_turnos FROM turnos";
$result_total_turnos = mysqli_query($con, $query_total_turnos);
$total_turnos = mysqli_fetch_assoc($result_total_turnos)['total_turnos'];

// Obtener el número total de marcas
$query_marcas = "SELECT COUNT(*) AS total_marcas FROM marca";
$result_marcas = mysqli_query($con, $query_marcas);
$total_marcas = mysqli_fetch_assoc($result_marcas)['total_marcas'];

// Obtener el número total de tipos
$query_tipos = "SELECT COUNT(*) AS total_tipos FROM tipo";
$result_tipos = mysqli_query($con, $query_tipos);
$total_tipos = mysqli_fetch_assoc($result_tipos)['total_tipos'];

// Obtener el número total de servicios
$query_servicios = "SELECT COUNT(*) AS total_servicios FROM servicios";
$result_servicios = mysqli_query($con, $query_servicios);
$total_servicios = mysqli_fetch_assoc($result_servicios)['total_servicios'];

$data = array(
    'total_turnos' => $total_turnos,
    'total_marcas' => $total_marcas,
    'total_tipos' => $total_tipos,
    'total_servicios' => $total_servicios
);

echo json_encode($data);
?>
