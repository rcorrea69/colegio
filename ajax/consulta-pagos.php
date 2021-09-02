<?php

$dni = $_POST["dni"];
$ano = $_POST["ano"];

//echo $ano;


require_once "../conexion.php";

include "../include/header.php";
include "../include/funciones.php";

$sqlsocio="SELECT apellidos,nombres FROM alumnos WHERE dni='".$dni."'";
$cabe=mysqli_query($link,$sqlsocio);
$socio=mysqli_fetch_array($cabe);

$sql="SELECT de.periodo,de.id_codigo,de.detalle_codigo,de.descuento,de.importe,o.id_op,o.op_fecha
        FROM o_pagos o
        INNER JOIN op_detalles de ON o.id_op=de.id_op
        /* INNER JOIN o_pagos op ON de.id_op=op.id_op */
        INNER JOIN alumnos a on a.dni=o.socio 
        WHERE  a.dni='".$dni."' AND  YEAR(o.op_fecha) = $ano";

//die($sql);

$res=mysqli_query($link,$sql);

$cantfila=mysqli_num_rows($res);

if ($cantfila > 0) {

?>         
       


          <div class="card  border-primary ">
             <div class="card-header  text-white  bg-dark">
                <h5> Alumno : <?php echo $dni." ".$socio['apellidos']." ".$socio['nombres']  ?> </h5>
                   
             </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-sm" id="dataTable" name="dataTable" width="100%" cellpadding="0" >
           <!--  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> -->  
              <thead>
                <tr>
                  <th>Período</th>
                  <th>Fecha</th>
                  <th>Código</th>
                  <th>Actividad</th>
                  <th>Desc</th>
                  <th>Importe</th>
                  <th>Recibo</th>
                </tr>
              </thead>

              <tbody>
                <?php
                 
                  while ($reg=mysqli_fetch_array($res))
                               {
                ?>

                  <tr class="odd gradeX">
                      <td><?php echo $reg["periodo"];?></td>
                      <td><?php echo formato_fecha_dd_mm_Y( $reg["op_fecha"]);?></td>
                      <td><?php echo $reg["id_codigo"];?></td>
                      <td><?php echo $reg["detalle_codigo"];?></td>
                      <td><?php echo $reg["descuento"];?></td>
                      <td><?php echo $reg["importe"];?></td>
                      <td><?php echo $reg["id_op"];?></td>                    
                  </tr>

                <?php
                                }
                ?>

              </tbody>
            </table>
          </div>
          </div>
          </div> 


<?php  
}
else {

            ?>
            <br>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error! El Alumno no registra pagos durante el año : <?php echo $ano;?></strong> 
                    
            </div>
            <?php

}




include "../include/librerias_js.php";


mysqli_close($link);

?>