<?php
include("../logica/conexion.php");
$con = conectar();

// Obtener el número total de clientes
$query_total_clientes = "SELECT COUNT(DISTINCT dni) AS total_clientes FROM clientes";
$result_total_clientes = mysqli_query($con, $query_total_clientes);
$total_clientes = mysqli_fetch_assoc($result_total_clientes)['total_clientes'];
// Obtener el número total de trabajos
$query_total_trabajos = "SELECT COUNT(*) AS total_trabajos FROM clientes";
$result_total_trabajos = mysqli_query($con, $query_total_trabajos);
$total_trabajos = mysqli_fetch_assoc($result_total_trabajos)['total_trabajos'];

// Obtener el número de registros en estado pendiente
$query_pendiente = "SELECT COUNT(*) AS total_pendiente FROM clientes WHERE estado = 'pendiente'";
$result_pendiente = mysqli_query($con, $query_pendiente);
$total_pendiente = mysqli_fetch_assoc($result_pendiente)['total_pendiente'];

// Obtener el número de registros en estado en proceso
$query_proceso = "SELECT COUNT(*) AS total_proceso FROM clientes WHERE estado = 'proceso'";
$result_proceso = mysqli_query($con, $query_proceso);
$total_proceso = mysqli_fetch_assoc($result_proceso)['total_proceso'];

// Obtener el número de registros en estado finalizado
$query_finalizado = "SELECT COUNT(*) AS total_finalizado FROM clientes WHERE estado = 'finalizado'";
$result_finalizado = mysqli_query($con, $query_finalizado);
$total_finalizado = mysqli_fetch_assoc($result_finalizado)['total_finalizado'];

// Obtener el número de registros que ya se entregaron a los clientes
$query_entregados = "SELECT COUNT(*) AS total_entregados FROM clientes WHERE estado = 'entregado'";
$result_entregados = mysqli_query($con, $query_entregados);
$total_entregados = mysqli_fetch_assoc($result_entregados)['total_entregados'];

$data = array(
    'total_clientes' => $total_clientes,
    'total_trabajos' => $total_trabajos,
    'total_pendiente' => $total_pendiente,
    'total_proceso' => $total_proceso,
    'total_finalizado' => $total_finalizado,
    'total_entregados' => $total_entregados
);

echo json_encode($data);
?>
