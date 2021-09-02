<?php



	require_once ("../include/validar_session.php");
	require_once("../conexion.php");
	require_once("../include/funciones.php");

$recibo=$_POST['recibo'];
$fecha=formato_fecha_Y_mm_dd($_POST['fechaRecibo']);
$usuario=$_SESSION['id_usuario'];
$op=$_POST['op'];


$sqlrecibo="SELECT id_recibo FROM recibo WHERE id_recibo=$recibo";
$resrecibo= mysqli_query($link,$sqlrecibo);


if (mysqli_num_rows($resrecibo)>0)
{
		echo "Exite al menos un registro";
		exit;
} else {


		echo "No Existen registros";

////////////////////inserto en pago en recibo///////////////////////////
$sqlalta="INSERT INTO recibo (id_recibo, id_op, rec_fecha, id_usuario)VALUES($recibo,$op,'".$fecha."',$usuario)";
//die($sqlalta);
$resalta=mysqli_query($link,$sqlalta);
if($resalta){




////////////////////actualizo el estado en op///////////////////////////
$sqlactualizo="UPDATE o_pagos SET op_estado='C' WHERE id_op=$op";
//die($sqlactualizo);
$resactualizo=mysqli_query($link,$sqlactualizo);
}

}



?>



				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
						
							echo 'Se registro el pago '
						?>
				</div>
<?php 





  mysqli_close($link);   			 

 //header('Location:../reportes/orden_de_pago.php');
//return $sql;

?>