<?php
	require_once ("../include/validar_session.php");
	require_once("../conexion.php");
	require_once("../include/funciones.php");

$dni=$_POST['dni'];
$totalop=$_POST['totalop'];
$hoy=$_POST['hoy'];
$fecha=formato_fecha_Y_mm_dd($hoy);
$usuario=$_SESSION['id_usuario'];



$sql="INSERT INTO o_pagos (id_op,socio,op_fecha,op_importe,op_estado,id_usuario) VALUES ('NULL','".$dni."','".$fecha."',$totalop,'P',$usuario)";
$res = mysqli_query($link, $sql);


$nro_op=mysqli_insert_id($link);//obtengo el id de pedidos



$sqltmp="SELECT * FROM op_tmp WHERE id_socio='".$dni."'";
$tmp=mysqli_query($link, $sqltmp);//ejecuto la consulta	
//die($sqltmp);
	while ($row=mysqli_fetch_array($tmp)) {
		
			$codigo=$row['tmp_codigo'];
			$concepto=$row['tmp_concepto'];
			$periodo=$row['tmp_periodo'];
			$descuento=$row['tmp_descuento'];
			$importe=$row['tmp_importe'];
		

		$sqldp="INSERT INTO op_detalles (id_opdetalle, id_op, id_codigo, periodo, detalle_codigo, descuento ,importe) VALUES ('NULL',$nro_op,$codigo,$periodo,'".$concepto."',$descuento,$importe)";

		//echo die($sqldp);
		
		$ejectuto=mysqli_query($link, $sqldp);
				
		};


//////////////////////////////////borro archivo op_temp /////////////////////////////
$sqlborrotmp="DELETE FROM op_tmp WHERE id_socio=".$dni;
$ejectuto=mysqli_query($link, $sqlborrotmp);

 echo $nro_op;
  

  mysqli_close($link);   			 

 //header('Location:../reportes/orden_de_pago.php');
//return $sql;

?>