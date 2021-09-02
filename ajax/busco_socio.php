<?php

$dni = $_POST["dni"];


require_once "../conexion.php";



if(!empty($dni)){
        
        
        //$sql = "SELECT apellidos, nombres,id_categoria,dni  FROM socios WHERE dni='$dni'";
        //die($sql);
$sql="SELECT `dni`, `curso`, `apellidos`, `nombres`, `telefono`, `domicilio`, `recidente` FROM `alumnos` WHERE dni='$dni'";

        $res = mysqli_query($link, $sql);

        if(!$res){

            die('Error de consulta'. mysqli_error($link));
        } 

        $json=array();

        while($row=mysqli_fetch_array($res)){

            $json[]=array(
                'nombre'=> $row['nombres'],
                'apellido'=> $row['apellidos'],
                'dni'=> $row['dni'],
                'recidente'=> $row['recidente']    
            );
        }; 

        $jsoncadena=json_encode($json);
        echo $jsoncadena;    

}

mysqli_close($link);

?>