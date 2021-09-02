<?php 
require_once ("../include/validar_session.php");
require_once("../conexion.php");
require_once("../include/funciones.php");

$op=$_POST["op"];


$sql="SELECT * FROM o_pagos WHERE id_op=$op";
//die($sql);
$res=mysqli_query($link, $sql);
$row=mysqli_fetch_assoc($res);

if ($row['op_estado']=="P"){ 

	header('Location: ../registra_pagos.php?op='.$op);
	?>
	
<?php 

  }

else{

	?>		
			<br>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					El Numero de Op ya esta asignado

			</div>
	<?php

}



?>