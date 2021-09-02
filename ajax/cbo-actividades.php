 <?php



require_once("../conexion.php");


$sql="SELECT *  FROM actividades";
$res=mysqli_query($link,$sql);
//$row = mysqli_fetch_array($res)

?>

<select class="custom-select col-6"  id="cbo-actividad" name="cbo-actividad">
  <option selected>Elija una actividad </option>

 				<?php

                  while ($row=mysqli_fetch_array($res))

                                {
                ?>

                     <option value="<?php echo $row["id_actividad"];?>"> <?php echo $row["ac_nombre"];?></option>

                <?php
                                }
                ?>

  </select>

<?php
  /* Cierra la conexión. */
mysqli_close($link);

?>


