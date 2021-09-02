<?php 
    if (!empty($_POST['d'])){
        $dni=$_POST['d'];
        $name =$dni .".jpg";
    
            
        
        
    
        if(is_array($_FILES) && count($_FILES)>0){

            if(move_uploaded_file($_FILES["f"]["tmp_name"],"fotos/".$name)){
                require_once("conexion.php");
                $sql="UPDATE socios SET foto='".$name."' WHERE dni='".$dni."'";
                $query_new_insert = mysqli_query($link,$sql);
                echo 1;
                
            }else{
                echo 0;
            }

        }else{
            echo 0;
        }

    }//final del if !empty    
    

    mysqli_close($link);

?>