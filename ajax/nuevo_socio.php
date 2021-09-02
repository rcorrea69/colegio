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
		


		$sql="INSERT INTO `alumnos`(`dni`, `curso`, `apellidos`, `nombres`, `telefono`, `domicilio`,`recidente`) VALUES ('$dni','$curso','$apellido','$nombres','$telefono','$domicilio','$recidente')";
			//die($sql);

		$query_new_insert = mysqli_query($link,$sql);
	
		//$id=mysqli_insert_id($link);
			if ($query_new_insert){
						echo'oK';
		
			//	$messages[] = "Alumno ha sido ingresado satisfactoriamente.";
			} else{
                echo'eRRor';
              //  $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($link);
			}
        }
mysqli_close($link);        
?>