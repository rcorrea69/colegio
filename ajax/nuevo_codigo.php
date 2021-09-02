<?php

		if (empty($_POST['codigo'])) {
           	$errors[] = "Falta ingresar el Código  ";           
         } 
         else if (empty($_POST['importe'])){
         	$errors[] = "Debe Ingregar El importe del Código  ";   
         }
        else if (!empty($_POST['importe'])){
		/* Connect To Database*/



		require_once("../conexion.php");
	
		$codigo=$_POST["codigo"];
		$descripcion=$_POST["descripcion"];
		$importe=$_POST["importe"];
		



		
		$sql="INSERT INTO `codigos`(`id_codigo`, `descripcion`, `cod_precio`) VALUES ($codigo,'$descripcion',$importe)";	

		//print_r($_POST);
		
		//die($sql);

		$query_new_insert = mysqli_query($link,$sql);
	
		// $id=mysqli_insert_id($link);
			
			
		


			if($query_new_insert){
				// 	if($ctacte=="SI"){
				// 		$sqlcta="INSERT INTO cta_cte_clientes (id_cta_cte,cta_cte_id_cliente) VALUES ('NULL',$id) ";
				// 		$ejecuto=mysqli_query($link,$sqlcta);	
							
				// }							
		
				$messages[] = "Código ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($link);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>