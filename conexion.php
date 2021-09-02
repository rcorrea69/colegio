<?php
//////////conexion a la base de datos//////////////////////
$server="localhost";
$usuario_db="root";
$clave_db="";
$base="colegio";
$link=mysqli_connect($server,$usuario_db,$clave_db,$base);
mysqli_set_charset($link, "utf8");
//////////fin de la conexion////////////////////////////////////////////////
?>