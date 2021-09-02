 <?php

$dni = $_POST["dni"];
//global $link;
require_once("../conexion.php");



$sql="SELECT *  FROM op_tmp WHERE id_socio='$dni'";
//die($sql);
$res=mysqli_query($link,$sql);
//$row = mysqli_fetch_array($res)

$totalFilas = mysqli_num_rows($res); 


if ($totalFilas>0 ){
$total=0;


?>
        
          <div class="card">
            <div class="card-body">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Concepto</th>
                    <th scope="col">Mes</th>
                    <!-- <th scope="col">Descuento</th> -->
                    <th scope="col">Importe</th> 
                    <th scope="col">Acción</th>   
                  </tr>
                </thead>
                <tbody>

                  <?php while ($row=mysqli_fetch_array($res)) {
                    ?>
                      <tr idcodigo="<?php echo $row["id_tmp"];?>" >
                        <!-- <th scope="row" class="idcodigo"><?php echo $row["tmp_codigo"];?></th> -->
                        <td><?php echo $row["tmp_codigo"];?></td>
                        <td><?php echo $row["tmp_concepto"];?></td>
                        <td><?php echo $row["tmp_periodo"];?></td>
                        <!-- <td><?php echo $row["tmp_descuento"]." %";?></td> -->
                        <td><?php echo $row["tmp_importe"];?></td>
                        <td><button type="button" class="btn btn-outline-danger borro-item"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>    
                      </tr>
                  
                  <?php
                  $total=$total+$row["tmp_importe"]; 
                  
                  }
                  ?>
                  <tr>
                    
                  </tr>
                    <tr>
                        <td colspan="5" style="text-align: right;"><h4>Total  $<?php echo number_format($total, 2, ',', '.');?></h4></td>
                        
                    </tr>
                    
                </tbody>

              </table>
            </div><!--  fin de card body-->
            <input type="hidden" id="totalop" name="totalop" value="<?php echo $total; ?>">
            <button type="button" class="btn btn-outline-primary" id="genero-op"><i class="fa fa-print" aria-hidden="true"> </i> Imprimir Recibo</button> 


          </div> <!--  fin de card -->          
        


              





<script type="text/javascript">
$('#genero-op').on('click', function(){

    var dni=$("#dni").val();
    var totalop=$("#totalop").val();
    var hoy=$("#hoy").val();

         $.ajax({
          type:"POST",
          url:"ajax/nuevo_op.php",
          data: {dni,totalop,hoy},
          success: function(respuesta){

            //console.log(respuesta);
 
            detalle();

            window.open("./reportes/orden_de_pago.php?op="+ respuesta, '_blank');
          }

         

       });

 

});



</script>

<?php
}  /* Cierra la conexión. */
mysqli_close($link);

?>
