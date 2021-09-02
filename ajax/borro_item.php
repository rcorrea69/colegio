<?php




require_once "../conexion.php";


if(isset($_POST["id"])){

    $id = $_POST["id"];
    $sql="DELETE FROM op_tmp WHERE id_tmp=$id"; 
    $res=mysqli_query($link,$sql);

    if(!$res){
        die('No se pudo borrar el item');
    }    

    echo "Se borro el item";
    echo $sql;
}


mysqli_close($link);

?>