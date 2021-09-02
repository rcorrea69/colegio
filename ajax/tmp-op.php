<?php

require_once("../conexion.php");

if (!empty($_POST['codigo'])){
	
	$dni=$_POST["dni"];
	$codigo=$_POST["codigo"];
	$descripcion=$_POST["descripcion"];
	$periodo=$_POST["periodo"];
	$importe=$_POST["importe"];
	$descuento=0;
	

		$sql="INSERT INTO `op_tmp`(`id_tmp`, `id_socio`, `tmp_codigo`, `tmp_concepto`, `tmp_periodo`, `tmp_descuento`, `tmp_importe`) VALUES ('NULL','$dni',$codigo,'$descripcion',$periodo,$descuento,$importe)";


		$query_new_insert = mysqli_query($link,$sql);


};
		//mysqli_close($link);

?>