<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
    function Header()
    {

        $this->Image('images/logo01.png',10,6);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Reporte de Clientes',0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','',12);
        $this->Cell(276,10,'Informacion del cliente',0,0,'C');
        $this->ln(20);
        $this->Ln();
        $this->SetFont('Arial','B',16);
        $this->Cell(20, 10, 'ID', 1,0,'C',0);
        $this->Cell(40, 10, 'Nombre', 1,0,'C',0);
        $this->Cell(40, 10,'Apellido', 1,0,'C',0);
        $this->Cell(90, 10,'Direccion', 1,0,'C',0);
        $this->Cell(50, 10, 'Telefono', 1,0,'C',0);
        $this->Ln();
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
require'db.php';
$consulta = "SELECT * FROM customers";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf ->  AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial','',16);


while($row = $resultado->fetch_assoc()){
    $pdf->Cell(20, 10, $row['cust_id'], 1,0,'c',0);
    $pdf->Cell(40, 10, $row['surname'], 1,0,'c',0);
    $pdf->Cell(40, 10, $row['forename'], 1,0,'c',0);
    $pdf->Cell(90, 10, $row['town'], 1,0,'c',0);
    $pdf->Cell(50, 10, $row['tel'], 1,1,'C');
    
    
}




$pdf->Output();
?>