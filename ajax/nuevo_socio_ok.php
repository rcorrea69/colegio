<?php

		if (empty($_POST['dni'])||empty($_POST['apellido'])) {
           $errors[] = "Apellido  vacío  ";
        } else if (!empty($_POST['dni'])){
		/* Connect To Database*/

        require_once("../conexion.php");
	
		$dni=$_POST["dni"];
		$apellido=$_POST["apellido"];
		$nombres=$_POST["nombres"];
		$te1=$_POST["te1"];
		$tel2=$_POST["tel2"];
		$nacionalidad=$_POST["nacionalidad"];
		$mail=$_POST["mail"];
		$naci=$_POST["naci"];
		$fecha=$_POST["fecha"];
		$catego=$_POST["catego"];
		$condicion=$_POST["condicion"];
		$domicilio=$_POST["domicilio"];
		$cobertura=$_POST["cobertura"];

		$date = str_replace('/', '-', $_POST['fecha']);
		$fecha=date('Y-m-d', strtotime($date));
		$date = str_replace('/', '-', $_POST['naci']);
		$naci=date('Y-m-d', strtotime($date));
		
		$hoy = date("Y-m-d");

		$sql="INSERT INTO `socios`(`dni`, `apellidos`, `nombres`, `fecha_nacimiento`, `nacionalidad`, `telefono`, `celular`, `domicilio`, `id_categoria`, `id_condicion`, `mail`, `fecha_apto`, `cobertura`, `fecha_alta` ) 
			VALUES ('$dni','$apellido','$nombres','$naci','$nacionalidad','$te1','$tel2','$domicilio',$catego,$condicion,'$mail','$fecha','$cobertura','$hoy')";

			//die($sql);

		$query_new_insert = mysqli_query($link,$sql);
	
		//$id=mysqli_insert_id($link);
			if ($query_new_insert){
						echo'oK';
		
			//	$messages[] = "Socio ha sido ingresado satisfactoriamente.";
			} else{
                echo'eRRor';
              //  $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($link);
			}
        }
mysqli_close($link);        
?>