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
        $this->Cell(30, 10, 'ID Cliente', 1,0,'C',0);
        $this->Cell(30, 10, 'Equipo', 1,0,'C',0);
        $this->Cell(80, 10,'Descripcion', 1,0,'C',0);
        $this->Cell(30, 10,'Marca', 1,0,'C',0);
        $this->Cell(40, 10, 'Modelo', 1,0,'C',0);
        $this->Cell(60, 10,'Estado', 1,1,'C');
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
require'db.php';
$consulta = "SELECT * FROM repairs";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf ->  AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial','',16);


while($row = $resultado->fetch_assoc()){
    $pdf->Cell(10, 10, $row['Rep_ID'], 1,0,'L',0);
    $pdf->Cell(30, 10, $row['Cust_ID'], 1,0,'L',0);
    $pdf->Cell(30, 10, $row['DeviceType'], 1,0,'L',0);
    $pdf->Cell(80, 10,utf8_decode($row['Description']), 1,0,'L',0);
    $pdf->Cell(30, 10, $row['Brand'], 1,0,'L',0);
    $pdf->Cell(40, 10, $row['Model'], 1,0,'L',0);
    $pdf->Cell(60, 10, $row['Status'], 1,1,'L',0);

    
}




$pdf->Output();
?>