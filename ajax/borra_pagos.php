<?php require_once("../validar_session.php"); ?>
<?php
require_once("../conexion.php");
$op = $_GET['op'];
$repuesta=1;

$sqlborroop="DELETE FROM o_pagos WHERE id_op=".$op;
$sqldetalle="DELETE FROM op_detalles WHERE id_op=".$op;

///////////borro op////////////////////////
$res=mysqli_query($link,$sqlborroop);
if(!$res){$repuesta=0;}
///////////borro detalle op////////////////
$resultado=mysqli_query($link,$sqldetalle);
if(!$resultado){$repuesta=0;}
echo $repuesta;
?>