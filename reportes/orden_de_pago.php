<?php require_once ("../validar_session.php"); ?>
<?php include('../fpdf/fpdf.php');

include('../conexion.php');

function formato_fecha_dd_mm_Y($date)
{   
    $fecha = str_replace('/', '-', $date);
    return date('d/m/Y', strtotime($date));
}

function formato_fecha_Y_mm_dd($date)
{   
    $fecha = str_replace('/', '-', $date);
    return date('Y-m-d', strtotime($fecha));
}   

$op=$_GET['op'];

$sqlcabecera="SELECT alumnos.dni,alumnos.apellidos,alumnos.nombres,o_pagos.op_fecha,o_pagos.op_importe FROM alumnos,o_pagos Where o_pagos.socio=alumnos.dni and o_pagos.id_op=".$op;


//die($sqlcabecera);

$res = mysqli_query($link, $sqlcabecera);
 while($row=mysqli_fetch_array($res)){

        $dni=$row['dni'];
        $nombre=$row['nombres'];
        $apellido=$row['apellidos'];
        $fecha=$row['op_fecha'];
        $usuario=$_SESSION ['nombre'];
 }


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/recibo.png',10,5,100);
    $this->SetFont('Times','I',15);
    $this->Ln(15);
}


}

// Creación del objeto dea la clase heredada
$pdf = new PDF('P','mm','A4');
//$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->Cell(195,10, utf8_decode('Recibo: '.$op),0,1,'R');
$pdf->SetFont('Helvetica','B',15);
$pdf->Cell(195,10, utf8_decode(formato_fecha_dd_mm_Y($fecha)),0,1,'R');


//$pdf->SetFont('Times','',12);
//$pdf->Cell(0);
//$pdf->Cell(15,7, utf8_decode('D.N.I:'),1,0,'L');
$pdf->SetFont('Times','B',12);
//$pdf->Cell(30,7, utf8_decode($dni),1,0,'L'); 
$pdf->Cell(70,12, utf8_decode("Señor/es : ".$apellido." ".$nombre." DNI ".$dni),0,1,'L');




$pdf->SetFont('Times','B',15);
//$pdf->Cell(5);
$pdf->Cell(195,8, utf8_decode('Detalle de Pagos'),1,1,'C');
$pdf->SetFont('Arial','I',13);
//$pdf->Cell(30,5, utf8_decode('DNI'),1,0,'C');
$pdf->Cell(25,8, utf8_decode('Código'),1,0,'C');
$pdf->Cell(90,8, utf8_decode('Concepto'),1,0,'C');
//$pdf->Cell(30,5, utf8_decode('Categoría'),1,0,'C');
$pdf->Cell(25,8, utf8_decode('Período'),1,0,'C');
$pdf->Cell(20,8, utf8_decode('Desc.'),1,0,'C');
$pdf->Cell(35,8, utf8_decode('Importe'),1,1,'C');


///// estos son los ejemplos//////////////

$sqldetalle="SELECT * FROM op_detalles WHERE id_op=".$op;
$res=mysqli_query($link,$sqldetalle);
$total=0;
while($fila=mysqli_fetch_array($res)){
    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(25,7, utf8_decode($fila['id_codigo']),1,0,'C');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(90,7, utf8_decode($fila['detalle_codigo']),1,0,'L');
    $pdf->Cell(25,7, utf8_decode($fila['periodo']),1,0,'C');
    $pdf->Cell(20,7, utf8_decode($fila['descuento']),1,0,'C');
    $pdf->Cell(35,7, utf8_decode("$ ".$fila['importe']),1,1,'C');
    $total=$total+$fila['importe'];
}


//////////total//////////////////////////////////////
$pdf->SetFont('Arial','B',14);
$pdf->Cell(160,7, utf8_decode('TOTAL'),1,0,'R');
$pdf->Cell(35,7, utf8_decode("$ ".number_format($total,2,',','.')),1,1,'R');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(160,3,  "-----------------" ,0,1,'R');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(160,7,  $usuario ,0,0,'R');



// $pdf->Cell(40,8, utf8_decode('esto es y  '.$y_aqui),1,1,'C');
// $pdf->Cell(40,8, utf8_decode('esto es x  '.$x_aqui),1,1,'C');


////////////////////////////////constancia para control ///////////////////////////
$pdf->Output();










?>
