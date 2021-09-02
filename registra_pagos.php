<?php

$op=$_GET['op'];

//echo $op;
require_once("conexion.php");

$hoy=date('d/m/Y');



$sqlcabe="SELECT o_pagos.socio, socios.apellidos, socios.nombres FROM o_pagos,socios 
WHERE socios.dni=o_pagos.socio AND o_pagos.id_op=$op";
$cabe=mysqli_query($link,$sqlcabe);
$rescabe=mysqli_fetch_array($cabe);

$sqldeta="SELECT id_codigo,periodo,detalle_codigo,descuento,importe FROM op_detalles WHERE id_op = $op";
$resdeta=mysqli_query($link,$sqldeta);

$total=0;

?>
<?php include('include/header.php'); ?>
  <link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">


<br>
			<div class="alert alert-info" role="alert">
				<!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
					Socio: <strong><?php echo $rescabe["socio"]."     ".$rescabe["apellidos"]."    ".$rescabe["nombres"]; ?> 	</strong> 
					 

			</div>

<div class="container-fluid">
	<div class="row">	
		<div class="card col-3">

		  <div class="card-body">
			<form id="frm-registra-pago" name="frm-registra-pago" autocomplete="off">
			  <div class="form-group">
			    <label for="recibo">Nro Recibo</label>
			    <input type="text" class="form-control" id="recibo" name="recibo" aria-describedby="Nro Recibo" placeholder="Recibo" style="text-align: right;">
			    <small id="emailHelp" class="form-text text-muted">Número de recibo de Tesorería.</small>
			  </div>
			  <div class="form-group">
			    <label for="fechaRecibo" >Fecha</label>
			    <input type="text" class="form-control" id="fechaRecibo" name="fechaRecibo" placeholder="dd/mm/aaaa" value="<?php echo($hoy)?>" style="text-align: right;" >
			  </div>
			  <input type="hidden" name="op" id="op" value="<?php echo $op; ?>">
     
				


		  		<button type="submit" class="btn btn-primary">Confirmar Pago</button>
			</form>
			<div id="resultados_ajax_rec"></div>
		  </div>


		</div>

		<div class="card col-9 ">

		  <div class="card-body">

				<table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Código</th>
				      <th scope="col">Concepto</th>
				      <th scope="col">Período</th>
				      <th scope="col">Descuento</th>
				      <th scope="col">Importe</th> 
		 
				    </tr>
				  </thead>
				  <tbody>

				    <?php while ($row=mysqli_fetch_array($resdeta)) {
				      ?>
			
				       
				      
				          <td><?php echo $row["id_codigo"];?></td>
				          <td><?php echo $row["detalle_codigo"];?></td>
				          <td><?php echo $row["periodo"];?></td>
				          <td><?php echo $row["descuento"]." %";?></td>
				          <td><?php echo $row["importe"];?></td>
				            
				        </tr>
				    



				    <?php
				    $total=$total+$row["importe"]; 
				    
				    }
				     ?>
				     
				      <tr>
				          <td colspan="5" style="text-align: right;"><h4>Total  $<?php echo number_format($total, 2, ',', '.');?></h4></td>
				          
				      </tr>
				      
				  </tbody>

				</table>


		  </div>
		</div>
	</div>
</div>	
<?php include('include/librerias_js.php') ?>  
      <script src="js/bootstrap-datepicker.min.js"></script>
      <script src="js/bootstrap-datepicker.es.min.js"></script>
      <script type="text/javascript" src="js/registra-pagos.js"></script> 

