<?php
include("conexion.php");

$con = conectar();

// Verificar que el número de registro y el nuevo estado estén presentes en la solicitud GET
if (isset($_GET['numero_registro']) && isset($_GET['nuevo_estado'])) {
    $numero_registro = $_GET['numero_registro'];
    $nuevo_estado = $_GET['nuevo_estado'];

    // Actualizar el estado de la solicitud
    $sql_update = "UPDATE clientes SET estado = '$nuevo_estado' WHERE numero_registro = '$numero_registro'";
    $query_update = mysqli_query($con, $sql_update);

    if ($query_update) {
        echo "Estado actualizado correctamente.";
    } else {
        echo "Error al actualizar el estado: " . mysqli_error($con);
    }
} else {
    echo "No se proporcionó el número de registro o el nuevo estado.";
}
?>
