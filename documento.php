<?php
require('conexion.php');
require('fpdf/fpdf.php');

class PDF extends FPDF{
// Cargar los datos
function LoadData(){
  $con=conex();
  $sql="SELECT * FROM user";
  $res=$con->query($sql);
  while($list=$res->fetch_assoc()) {
    $datos[]=$list;
  }
  return $datos;
}

// Tabla simple
function DibTable($header, $datos){
    // Cabecera
    foreach($header as $col)
        $this->Cell(30,8,$col,1);
    $this->Ln();
    // Datos
    foreach($datos as $row)
    {
        foreach($row as $col)
            $this->Cell(30,6,$col,1);
        $this->Ln();
    }
  }
}

$pdf = new PDF('P','mm','A5');
// Títulos de las columnas
$header = array('Id', 'Nombre', 'Apellio', 'Edad');
// Carga de datos
$datos = $pdf->LoadData();
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->DibTable($header,$datos);
$pdf->Output();
?>
