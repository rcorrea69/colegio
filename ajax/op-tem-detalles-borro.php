 <?php



require_once("../conexion.php");
$valor=$_POST["valor"];


$sql="DELETE FROM op_tmp WHERE id_tmp=$valor";
die($sql);
$res=mysqli_query($link,$sql);
//$row = mysqli_fetch_array($res)






?>
