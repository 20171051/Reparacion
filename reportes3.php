<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
    function Header()
    {

        $this->Image('images/logo01.png',10,6);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Reportes Reparaciones',0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','',12);
        $this->Cell(276,10,'Informacion de todos las reparaciones',0,0,'C');
        $this->ln(20);
        $this->Ln();
        $this->SetFont('Arial','B',16);
        $this->Cell(10, 10, 'ID', 1,0,'C',0);
        $this->Cell(120, 10, 'Descripcion', 1,0,'C',0);
        $this->Cell(60, 10, 'Precio', 1,0,'C');
        $this->Cell(60, 10, 'Cantidad', 1,0,'C');
        $this->Cell(30, 10, 'Total', 1,1,'C',0);
    }
    // Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require 'includes/config.php';

if (!isset($_GET["id"])) {
    die("Error, no se ha especificado el ID de la orden");
}
$consulta = "SELECT i.*, s.price, s.description FROM orderitems i JOIN stock s WHERE i.stock_id = s.stock_id AND i.ord_id = " . $_GET["id"] . ";";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf ->  AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial','',16);


$totalfinal = 0;

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(10, 10, $row['ordItems_id'], 1,0,'L',0);
    $pdf->Cell(120, 10,utf8_decode($row['description']), 1,0,'L',0);
    $pdf->Cell(60, 10, number_format($row['price'], 2), 1,0,'L',0);
    $pdf->Cell(60, 10, number_format($row['quantity']), 1,0,'L',0);
    $pdf->Cell(30, 10, number_format($row['total'], 2), 1,1,'L',0);

    $totalfinal = $totalfinal + $row['total'];
}

$pdf->SetFont('Arial','B',16);
$pdf->Cell(250, 10, 'Total Final', 1,0,'L',0);
$pdf->Cell(30, 10, number_format($totalfinal, 2), 1,1,'L',0);


if (isset($_GET["download"])) {
    $pdf->Output('D', 'reporte.pdf');
} else {
    $pdf->Output();
}

?>
