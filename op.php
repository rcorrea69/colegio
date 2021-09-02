<?php require 'include/validar_session.php'; ?>
<!DOCTYPE html>
<html lang="es">


<head>

  <?php include('include/header.php'); ?>


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include('include/menu.php') ?>
  <?php

  $dni = $_GET["dni"];
  //include('include/hoy.php');
  require_once('conexion.php');
  $sqlhoy = "SELECT DATE_FORMAT(NOW(),'%d/%m/%Y') as hoy";
  $resul = mysqli_query($link, $sqlhoy);
  $hoyfila = mysqli_fetch_array($resul);

  $hoy = $hoyfila['hoy'];
  $mes = intval(substr($hoy, 3, 2));
  $ano = intval(substr($hoy, 6, 4));

  function formato_fecha_dd_mm_Y($date)
  {
    $fecha = str_replace('/', '-', $date);
    return date('d/m/Y', strtotime($date));
  }

  function formato_fecha_Y_mm_dd($date)
  {
    $fecha = str_replace('/', '-', $date);
    return date('Y-m-d', strtotime($fecha));
  }



  ?>

  <div class="content-wrapper">
    <div class="container">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="alumnos.php">Principal</a>
        </li>
        <li class="breadcrumb-item active">Registrar Pagos</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <!-- <div class="card"> -->
          <div class="card-body">
            <div id="socio">

            </div>
            <input type="hidden" id="hoy" name="hoy" value="<?php echo $hoy; ?>">
          </div>
          <!-- </div>  -->
        </div>
      </div>

      <div class="row"> <!--mostrar historial-->
      
        <div class="col-12">
          <!-- Consulta de actividades y pagos anteriores -->
          <div class="card">
            <div class="card-body">
              <p class="mb-0" class="justify-content-center align-items-center">
                <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapsePagos" aria-expanded="false" aria-controls="collapsePagos">
                  Historial de Pagos Año : <?php echo $ano ;?>
                </button>
              </p>
              <div class="collapse" id="collapsePagos">
                <div class="card border-primary card-body">
                  <!-- aca empieza los pagos -->
                  <?php
                  //global $link;
                  // global $link;
                  $sql = "SELECT de.id_op,de.id_codigo,de.detalle_codigo,de.periodo,de.importe,op.id_op,op.socio,op.op_fecha
                        FROM o_pagos op
                        INNER JOIN op_detalles de ON op.id_op=de.id_op
                        WHERE  op.socio='" . $dni . "' AND  YEAR(op.op_fecha) = $ano";

                  $res = mysqli_query($link, $sql);

                  $cantfila = mysqli_num_rows($res);
                
                  if ($cantfila > 0) {
                  ?>

                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-sm" id="datatableConsulta" name="datatableConsulta" width="100%" cellpadding="0">
                          <!--  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
                          <thead class="table-primary">
                            <tr>
                              <th align="center">Fecha</th>
                              <th align="center">Recibo</th>
                              <th align="center">Código</th>
                              <th align="center">Descripción</th>
                              <th align="center">Mes</th>
                              <th align="center">Importe</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php

                            while ($reg = mysqli_fetch_array($res)) {
                            ?>

                              <tr class="odd gradeX">
                                <td align="center"><?php echo (formato_fecha_dd_mm_Y($reg["op_fecha"])); ?></td>
                                <td align="center"><?php echo $reg["id_op"]; ?></td>
                                <td align="center"><?php echo $reg["id_codigo"]; ?></td>
                                <td><?php echo $reg["detalle_codigo"]; ?></td>
                                <td align="right"><?php echo $reg["periodo"]; ?></td>
                                <td align="right"><?php echo  number_format($reg["importe"], 2, ',', '.'); ?></td>
                              </tr>

                            <?php
                            }
                            ?>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <strong>El Alumno : <?php echo $dni; ?></strong> No Registra Pagos durante este año.
                    </div>
                  <?php
                  }
                  ?>
                  <!-- </div> -->
                  <!-- fin de los pagos -->
                </div>
              </div>
            </div><!--  fin de card body-->
          </div> <!--  fin de card -->
          <!--  <div  class="row" id="resultados_ajax"></div> -->
        </div>
      </div> <!--fin mostrar historial-->

      <div class="row">
        <div class="col-12">
          <!-- <div class="col-12"> -->
          <div class="card">

            <div class="card-body">
              <div class="card-title">
                <h4 style="display: inline;">Confección de Recibo</h4>
                <div class="float-right">
                  <h4><strong><?php echo $hoy; ?></strong></h4>
                </div>
              </div>
              <br>

              <form id="frm-op" name="frm-op">
                <input type="hidden" id="dni" name="dni" value="<?php echo $dni; ?>">
                <div class="form-row">

                  <div class="form-group col-md-3">
                    <label for="codigo" class="text-info">Código De Pago</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <button class="btn btn btn-primary" data-toggle="modal" data-target="#modalCodigo" id="espacio" name="espacio" type="button" tabindex="-1"><i class="fa fa-search"></i></button>
                      </div>
                      <input type="text" class="form-control " id="codigo" name="codigo" placeholder="Código de Pago" tabindex="1">
                    </div>
                  </div>

                  <div class="form-group col-5">
                    <label for="descripcion" class="text-info">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" readonly tabindex="-1">
                  </div>
                  <div class="form-group col-2">
                    <label for="importe" class="text-info">Importe</label>
                    <input type="text" class="form-control" id="importe" name="importe" tabindex="2">
                  </div>

                  <div class="form-group col-1">
                    <label for="periodo" class="text-info">Mes</label>
                    <select class="custom-select form-control" id="periodo" name="periodo" tabindex="3">
                      <?php
                      for ($i = 1; $i <= 12; $i++) {
                      ?>
                        <option <?php if ($i == $mes) {
                                  echo "selected ";
                                }  ?>value="<?php echo $i;  ?>"><?php echo $i;  ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-1 mt-2">
                    <br>
                    <button type="submit" class="btn btn-primary" id="carga_codigo" name="carga_codigo">Cargar</button>
                  </div>

                </div>
              </form>

            </div>
          </div>
          <!-- </div> -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div id="detalle_ajax"></div>
      </div>
    </div>
    <!-- <div  id="resultados_ajax"></div> -->


  </div>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small>Ruben Correa Website 2019</small>
      </div>
    </div>
  </footer>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include('modal/cerrar_sesion.php') ?>
  <!-- Bootstrap core JavaScript-->
  <!-- Core plugin JavaScript-->
  <!-- Custom scripts for all pages-->
  <?php include('include/librerias_js.php') ?>
  </div>
  <script type="text/javascript" src="js/op.js"></script>

  <!-- Modal -->
  <div class="modal fade " id="modalCodigo" tabindex="-1" role="dialog" aria-labelledby="modalCodigo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Códigos de Cobranza</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Example DataTables Card-->
          <div class="card mb-3">

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-sm" id="dataTablecodigo" name="dataTablecodigo" width="100%" cellpadding="0">
                  <!--  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Concepto</th>
                      <th>Importe</th>
                      <th>Seleccionar</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    //require_once("conexion.php");
                    global $link;

                    $sql_cli = "SELECT `id_codigo`, `descripcion`, `cod_precio`  FROM `codigos`";

                    $res_cli = mysqli_query($link, $sql_cli);

                    while ($reg_cli = mysqli_fetch_array($res_cli)) {
                    ?>

                      <tr class="odd gradeX ">

                        <td><?php echo $reg_cli["id_codigo"]; ?></td>
                        <td><?php echo $reg_cli["descripcion"]; ?></td>
                        <!-- <td><?php echo $reg_cli["cod_precio"]; ?></td> -->
                        <td style="text-align: right;">
                          <?php echo "$ " . number_format($reg_cli["cod_precio"], 2, ',', '.'); ?>
                          <!-- <?php echo $reg_cli["cod_precio"]; ?> -->

                        </td>
                        <td style="text-align: center;">


                          <button type="button" class="btn btn-outline-dark btn-sm btnElegir " data-toggle="modal" data-target="#Modal-modif-codigo">
                            <i class="fa fa-check-square" aria-hidden="true"></i></button>


                          </a>



                        </td>

                        <input type="hidden" name="codigo" id="codigo_<?php echo $reg_cli["id_codigo"]; ?>" value="<?php echo $reg_cli["id_codigo"]; ?>">
                        <input type="hidden" name="importe" id="importe_<?php echo $reg_cli["id_codigo"]; ?>" value="<?php echo $reg_cli["cod_precio"]; ?>">
                        <input type="hidden" name="actividad" id="actividad_<?php echo $reg_cli["id_codigo"]; ?>" value="<?php echo $reg_cli["id_actividad"]; ?>">
                        <input type="hidden" name="categoria" id="categoria_<?php echo $reg_cli["id_codigo"]; ?>" value="<?php echo $reg_cli["id_categoria"]; ?>">
                      </tr>

                    <?php
                    }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
            <!-- <div class="card-footer small text-muted">
            </div> -->
          </div> <!-- card -->

        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>
</body>
<?php mysqli_close($link); ?>


</html>