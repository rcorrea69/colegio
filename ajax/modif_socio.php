<?php

		if (empty($_POST['dni'])||empty($_POST['apellido'])) {
			$errors[] = "Apellido  vacío  ";
        } else if (!empty($_POST['dni'])){
		/* Connect To Database*/


		require_once("../conexion.php");
		

	
		$dni=$_POST["dni"];
		$apellido=$_POST["apellido"];
		$nombres=$_POST["nombres"];
		$telefono=$_POST["telefono"];
		$curso=$_POST["curso"];
		$domicilio=$_POST["domicilio"];
		$recidente=$_POST["recidente"];

	
		$sql="UPDATE `alumnos` SET `dni`='$dni',`curso`='$curso',`apellidos`='$apellido',`nombres`='$nombres',`telefono`='$telefono',`domicilio`='$domicilio',`recidente`='$recidente'  WHERE dni='$dni'";

			//die($sql);



		$query_new_insert = mysqli_query($link,$sql);
	
		$id=mysqli_insert_id($link);
			
			
		


			if ($query_new_insert){
				// 	if($ctacte=="SI"){
				// 		$sqlcta="INSERT INTO cta_cte_clientes (id_cta_cte,cta_cte_id_cliente) VALUES ('NULL',$id) ";
				// 		$ejecuto=mysqli_query($link,$sqlcta);	
							
				// }							
		
				$messages[] = "Alumno se ha actualizado satisfactoriamente.";
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

mysqli_close($link);
?>