<?php
date_default_timezone_set('America/Lima');
# Incluyendo librerías necesarias #
require "./code128.php";
include("../logica/conexion.php");

$con = conectar();

// Verificar que el número de registro esté presente en la solicitud POST
if (isset($_POST['numero_registro'])) {
    $numero_registro = $_POST['numero_registro'];

    // Buscar los datos del cliente con el número de registro proporcionado
    $sql_cliente = "SELECT * FROM clientes WHERE numero_registro = '$numero_registro'";
    $query_cliente = mysqli_query($con, $sql_cliente);
    $cliente = mysqli_fetch_assoc($query_cliente);

    if ($cliente) {
        // Obtener los datos del cliente
        $cliente_nombre = $cliente['nombre'];
        $dni = $cliente['dni'];
        $telefono = $cliente['telefono'];
        $tipo = $cliente['tipo'];
        $marca = $cliente['marca'];
        $servicio = $cliente['servicio'];
        $descripcion = $cliente['descripcion'];
        $codigo_unico = $cliente['codigo_unico'];

        // Insertar los datos del ticket en la base de datos
        $sql_ticket = "INSERT INTO tickets (numero_registro, cliente_nombre, dni, telefono, tipo, marca, servicio, descripcion, codigo_unico) VALUES ('$numero_registro', '$cliente_nombre', '$dni', '$telefono', '$tipo', '$marca', '$servicio', '$descripcion', '$codigo_unico')";
        $query_ticket = mysqli_query($con, $sql_ticket);

        if ($query_ticket) {
            // Generar el PDF
            $pdf = new PDF_Code128('P', 'mm', array(80, 258));
            $pdf->SetMargins(4, 10, 4);
            $pdf->AddPage();

            # Encabezado y datos de la empresa #
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("PERUSIS S.A.C")), 0, 'C', false);
            $pdf->SetFont('Arial', '', 9);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "RUC: 20448111971"), 0, 'C', false);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Jr. Moquegua N° 190, Puno"), 0, 'C', false);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: 942112200"), 0, 'C', false);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Email: ventas@perusis.com"), 0, 'C', false);

            $pdf->Ln(1);
            $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "------------------------------------------------------"), 0, 0, 'C');
            $pdf->Ln(5);

            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Fecha: " . date("d/m/Y") . " " . date("h:i a")), 0, 'C', false);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "SERVICIO TECNICO"), 0, 'C', false);
            //$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Cajero: Carlos Alfaro"), 0, 'C', false);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("Ticket Nro: $numero_registro")), 0, 'C', false);
            $pdf->SetFont('Arial', '', 9);

            $pdf->Ln(1);
            $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "--------------------------------------------------------------------"), 0, 0, 'C');
            $pdf->Ln(3);

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("CLIENTE")), 0, 0, 'C');
            $pdf->SetFont('Arial', '', 9);
            $pdf->Ln(3);
            $pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
            $pdf->Ln(7);
            # Detalles del cliente #
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Cliente: $cliente_nombre"), 0, 'C', false);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Documento: DNI $dni"), 0, 'C', false);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: $telefono"), 0, 'C', false);

            $pdf->Ln(1);
            $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
            $pdf->Ln(3);

            # Tabla de productos #
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("EQUIPO")), 0, 0, 'C');
            $pdf->SetFont('Arial', '', 9);

            $pdf->Ln(3);
            $pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
            $pdf->Ln(7);

            # Detalles del producto/servicio #
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "EQUIPO: " .strtoupper($tipo)), 0, 'C', false);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "MARCA: " . strtoupper($marca)), 0, 'C', false);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "SERVICIO: " . strtoupper($servicio)), 0, 'C', false);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "DESCRIPCIÓN: " . strtoupper($descripcion)), 0, 'C', false);

            $pdf->Ln(1);
            $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
            $pdf->Ln(3);

            # Tabla de productos #
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("DATOS PARA LA CONSULTA")), 0, 0, 'C');
            $pdf->SetFont('Arial', '', 9);

            $pdf->Ln(3);
            $pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
            $pdf->Ln(7);

            # Detalles del producto/servicio #
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "N° REGISTRO: " .strtoupper($numero_registro)), 0, 'C', false);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "CODIGO: " . strtoupper($codigo_unico)), 0, 'C', false);

            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "*** Para poder realizar el recojo de su equipo debe de presentar este ticket ***"), 0, 'C', false);

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(0, 7, iconv("UTF-8", "ISO-8859-1", "Gracias por su confianza"), '', 0, 'C');

            $pdf->Ln(9);

            # Código de barras #
            $pdf->Code128(5, $pdf->GetY(), $codigo_unico, 70, 20);
            $pdf->SetXY(0, $pdf->GetY() + 21);
            $pdf->SetFont('Arial', '', 14);
            $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", $codigo_unico), 0, 'C', false);

            $pdf->Ln(3);
            $pdf->SetY(225);
            $pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
            $pdf->Ln(7);

            # Detalles del producto/servicio #
            $pdf->SetY(230);
            $pdf->MultiCell(0, 6, iconv("UTF-8", "ISO-8859-1", "N° REGISTRO: " .strtoupper($numero_registro)), 0, 'C', false);

            # Nombre del archivo PDF #
            $pdf->Output("I", "Ticket_Nro_$numero_registro.pdf", true);
        } else {
            echo "Error al guardar el ticket en la base de datos.";
        }
    } else {
        echo "No se encontró el cliente con el número de registro proporcionado.";
    }
} else {
    echo "No se proporcionó ningún número de registro.";
}
?>
