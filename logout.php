<?php
	$titulo = "Ha salido del sistema ";
session_start();
session_unset();
session_destroy();
$_SESSION = array();
//redireccion con demora de 3 segundos

header ("refresh:1; url=login.php");


exit;
?>
