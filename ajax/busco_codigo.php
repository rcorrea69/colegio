<?php

$codigo = $_POST["codigo"];


require_once "../conexion.php";


$sql="SELECT id_codigo,descripcion,cod_precio
            FROM codigos 
            WHERE id_codigo=$codigo";

$res = mysqli_query($link, $sql);

if(!$res){
    $row_cnt = mysqli_num_rows($result);

    echo ('no se que hacer '+$row_cnt);
}
else {

    $json=array();

    while ($row=mysqli_fetch_array($res)) {

                $json[]=array(
                    'importe'=> $row['cod_precio'],
                    'descripcion'=> $row['descripcion']
                    
                    
                );    
        # code...
    };

     $jsoncadena=json_encode($json);
            echo $jsoncadena;    

}

//if(!empty($dni)){
        
        
// $sql= "SELECT socios.dni,socios.apellidos,socios.nombres,categorias.ca_nombre FROM socios,categorias WHERE socios.id_categoria =categorias.id_categoria and socios.dni='$dni'";
//         //$sql = "SELECT apellidos, nombres,id_categoria,dni  FROM socios WHERE dni='$dni'";
//         //die($sql);

//         $res = mysqli_query($link, $sql);

//         if(!$res){

//             die('Error de consulta'. msqli_error($link));
//         } 

//         $json=array();

//         while($row=mysqli_fetch_array($res)){

//             $json[]=array(
//                 'nombre'=> $row['nombres'],
//                 'apellido'=> $row['apellidos'],
//                 'categoria'=> $row['ca_nombre'],
//                 'dni'=> $row['dni']    
//             );
//         }; 

//         $jsoncadena=json_encode($json);
//         echo $jsoncadena;    

// }

mysqli_close($link);

?>