<?php

		if (empty($_POST['nombre'])||empty($_POST['domi'])) {
           $errors[] = "Nombre o Domicilio vacío  ";
        } else if (!empty($_POST['nombre'])){
		/* Connect To Database*/


		require_once("../conexion.php");
	
		$nombre=$_POST["nombre"];
		$cuit1=$_POST["cuit1"];
		$te=$_POST["te"];
		$domi=$_POST["domi"];
		$loca=$_POST["localidad"];
		$ctacte=$_POST["ctacte"];

	
		$sql="INSERT INTO clientes (cli_nombres, cli_cuit_cuil, cli_telefono, cli_direccion,cli_localidad,cli_ctacte) VALUES ('$nombre','$cuit1','$te','$domi',$loca,'$ctacte')";
		//die($sql);

		$query_new_insert = mysqli_query($link,$sql);
	
		$id=mysqli_insert_id($link);
			
			
		


			if ($query_new_insert){
					if($ctacte=="SI"){
						$sqlcta="INSERT INTO cta_cte_clientes (id_cta_cte,cta_cte_id_cliente) VALUES ('NULL',$id) ";
						$ejecuto=mysqli_query($link,$sqlcta);	
							
				}							
		
				$messages[] = "Cliente ha sido ingresado satisfactoriamente.";
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