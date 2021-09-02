<?php 

$ruta_carpeta="../fotos/";
$nombre_archivo="foto".date("dHis").".". pathinfo($_FILES["foto"]["name"],PATHINFO_EXTENSION);
$ruta_guardar_archivo=$ruta_carpeta.$nombre_archivo ;

if(move_uploaded_file($_FILES["foto"]["tmp_name"] , $ruta_guardar_archivo)){
	echo "archivo guardado";
}else {
	echo "ERRROR";
}
?>