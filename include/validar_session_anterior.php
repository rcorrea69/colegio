<?php
session_start();
if ( !isset($_SESSION['login']) ){
	session_unset();
	session_destroy();
	$_SESSION = array();
	
	header("location:login.php");
	
	}
?>