<?php

		if (empty($_POST['nombres'])) {
           	$errors[] = "Falta ingresar el Nombre del usuario  ";           
         } 
         else if (empty($_POST['usuario'])){
         	$errors[] = "Debe Ingregar El Usuario  ";   
         }
         else if (empty($_POST['clave'])){
         	$errors[] = "Debe Ingregar El Usuario  ";   
         }

        else if (!empty($_POST['usuario'])){
		/* Connect To Database*/



		require_once("../conexion.php");
		require_once("../include/funciones.php");	
		
		$nombres=$_POST["nombres"];
		$usuario=$_POST["usuario"];
		$clave=$_POST["clave"];
		$tipo=$_POST["tipo"];		


		$sqlhoy="SELECT DATE_FORMAT(NOW(),'%d/%m/%Y') as hoy";
		$resul=mysqli_query($link, $sqlhoy);
		$hoyfila=mysqli_fetch_array($resul);
		$hoy=$hoyfila['hoy'];

		$hoyok=formato_fecha_Y_mm_dd($hoy);
	

		$sql="INSERT INTO `usuarios`(`id_usuario`, `usu_usuario`, `usu_clave`, `usu_nombre`, `usu_nivel`, `usu_fecha_alta`) VALUES ('NULL','".$usuario."','".$clave."','".$nombres."',$tipo,'".$hoyok."')";

		
		//print_r($_POST);
		
		//die($sql);

		$query_new_insert = mysqli_query($link,$sql);
	


			if($query_new_insert){
				// 	if($ctacte=="SI"){
				// 		$sqlcta="INSERT INTO cta_cte_clientes (id_cta_cte,cta_cte_id_cliente) VALUES ('NULL',$id) ";
				// 		$ejecuto=mysqli_query($link,$sqlcta);	
							
				// }							
		
				$messages[] = "Usuario ha sido ingresado satisfactoriamente.";
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
