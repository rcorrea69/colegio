<?php 
//require("conexion.php");
$sqlhoy="SELECT DATE_FORMAT(NOW(),'%d/%m/%Y') as hoy";

$resul=mysqli_query($link, $sqlhoy);
$hoyfila=mysqli_fetch_array($resul);

$hoy=$hoyfila['hoy'];


$mes=intval(substr($hoy, 3,2));
//$mes=substr($hoy, 3,2)
//$prueba='01';
//$si=intval($prueba);                   // 42
//mysqli_close($link);

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


		//$date = str_replace('/', '-', $_POST['fecha']);
		//$fecha=date('Y-m-d', strtotime($date));


///$fecha1 = '18/11/2016';
//$fecha1 = str_replace('/', '-', $fecha1); // Cambia los '/' a '-'

//$fecha2 = '2016-11-18';

//echo format_date_Y_mm_dd($fecha1); // 18/11/2016 => 2016-11-18
//echo format_date_dd_mm_Y($fecha2); // 2016-11-18 => 18/11/2016

mysqli_close($link);

?> 