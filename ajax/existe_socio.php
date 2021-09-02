<?php

$dni = $_POST["dni"];


require_once "../conexion.php";



if(!empty($dni)){
        
        
$sql= "SELECT socios.dni FROM socios WHERE dni ='$dni'";


        $res = mysqli_query($link, $sql);
        //$row_cnt = mysqli_num_rows($res);
        if(mysqli_num_rows($res) > 0){
            echo'eXiste';
        }else{
            echo'oK';
        }
        exit;

}

mysqli_close($link);

?>