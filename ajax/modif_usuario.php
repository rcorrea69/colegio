<?php

		

		if (empty($_POST['usuario-modif'])) {
           	$errors[] = "Falta ingresar el id del usuario  ";           
         } 
         else if (empty($_POST['nombre-modif'])){
         	$errors[] = "Debe Ingregar El importe nombre del ususario ";   
         }
         else if (empty($_POST['usu-modif'])){
         	$errors[] = "Debe Ingregar El  ususario ";   
         }
         else if (empty($_POST['clave-modif'])){
         	$errors[] = "Debe Ingregar la clave del usuario";   
         }


        else if (!empty($_POST['usuario-modif'])){
		



		require_once("../conexion.php");
	
		$usuario=$_POST["usuario-modif"];
		$ano='2019';
		$nombre=$_POST["nombre-modif"];
		$usu=$_POST["usu-modif"];	
		$clave=$_POST["clave-modif"];
		$nivel=$_POST["nivel-modif"];


		


		$sql="UPDATE `usuarios` SET `usu_usuario`='".$usu."' ,`usu_clave`='".$clave."',`usu_nombre`='".$nombre."',`usu_nivel`='".$nivel."' WHERE id_usuario=$usuario";


		
		//print_r($_POST);
		
		//die($sql);

		$query_new_insert = mysqli_query($link,$sql);
	
		// $id=mysqli_insert_id($link);
			
			
		


			if($query_new_insert){
				// 	if($ctacte=="SI"){
				// 		$sqlcta="INSERT INTO cta_cte_clientes (id_cta_cte,cta_cte_id_cliente) VALUES ('NULL',$id) ";
				// 		$ejecuto=mysqli_query($link,$sqlcta);	
							
				// }							
		
				$messages[] = "Código ha actualizado el Usuario satisfactoriamente.";
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