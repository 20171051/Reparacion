<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(40,10,'Reporte de ...',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(30, 10, 'id', 1,0,'c',0);
    $this->Cell(30, 10, 'precio', 1,0,'c',0);
    $this->Cell(90, 10, 'descrp', 1,0,'c',0);
    $this->Cell(40, 10, 'cantidad', 1,1,'c',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
require 'db.php';
$consulta = "SELECT * FROM stock";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf ->  AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(30, 10, $row['stock_id'], 1,0,'c',0);
    $pdf->Cell(30, 10, $row['price'], 1,0,'c',0);
    $pdf->Cell(90, 10, $row['description'], 1,0,'c',0);
    $pdf->Cell(40, 10, $row['quantity'], 1,1,'c',0);
    
    
}




$pdf->Output();
?>