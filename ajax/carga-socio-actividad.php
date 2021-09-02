<?php
require_once("../conexion.php");
require_once("../include/funciones.php");
$dni=$_POST['dni'];
$ano=$_POST['ano'];


// $sql = "SELECT * FROM socio_actividad WHERE id_socio='".$dni."' and YEAR(fecha_alta)='".$ano."' ";



$sql="SELECT so.fecha_alta, act.id_actividad, act.ac_nombre
        FROM socio_actividad so
        INNER JOIN actividades act  ON act.id_actividad = so.id_actividad
        WHERE  so.id_socio='".$dni."' AND  YEAR(so.fecha_alta) = '".$ano."'";



//die($sql);
$res = mysqli_query($link,$sql);



$filas = mysqli_num_rows($res);

if ($filas>0){


?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Código</th>
      <th>Actividad</th>
      <th>Fecha de Inscripción</th>
      <th>Estado</th>
  
    </tr>
  </thead>
  <tbody>
  	<?php                      


    while ($reg = mysqli_fetch_array($res))
                                {

		?>

    <tr>
     
      <td><?php echo $reg["id_actividad"]; ?></td>
      <td><?php echo $reg["ac_nombre"]; ?></td>
      <td><?php echo formato_fecha_dd_mm_Y($reg["fecha_alta"]); ?></td>
      <td><?php echo $dni; ?></td>
    </tr>
	
	<?php } ?>
  </tbody>
</table>

<?php
}
else { 
	?>
	
	<div class="alert alert-danger" role="alert">
 	 No se encontraron inscripciones de actividad
	</div>

<?php 
}
  ?>
