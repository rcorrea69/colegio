 <?php



require_once("../conexion.php");


// $sql="SELECT *  FROM anos";
// $res=mysqli_query($link,$sql);
//$row = mysqli_fetch_array($res)

$sqlhoy="SELECT DATE_FORMAT(NOW(),'%d/%m/%Y') as hoy";
$resul=mysqli_query($link, $sqlhoy);
$hoyfila=mysqli_fetch_array($resul);

$hoy=$hoyfila['hoy'];


$ano=intval(substr($hoy, 6,4));


?>




<?php 
$sql="SELECT *  FROM anos";
$res=mysqli_query($link,$sql);
?>



<select class="custom-select" name="ano" id="ano" onchange="consulta();">


 <?php

 while ($row=mysqli_fetch_array($res))

 {
  ?>

         <option  <?php if ($ano==$row["ano"]){echo "selected ";} ?>value="<?php echo $row["ano"];?>"> <?php echo $row["ano"];?></option>




  <?php
}
?>

</select> 

<?php
  /* Cierra la conexión. */
mysqli_close($link);

?>


