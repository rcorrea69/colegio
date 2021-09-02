<?php require 'include/validar_session.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>


   <?php include('include/header.php') ?>

  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php include('include/menu.php') ?>
    <?php $ano=date("Y"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="panel_socios.php">Principal</a>
        </li>
        <li class="breadcrumb-item active">Actividades</li>
          


      </ol>
      <div class="row">
        <div class="col-12">


      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <div class="btn-group pull-right">
            <div>
              <button type="button" class="btn btn-info " data-toggle="modal" data-target="#Modal-alta-actividad" > 
                <span class="glyphicon glyphicon-plus"></span> Nueva Actividad
              </button>    
            </div>
              <?php include('modal/Modal-alta-actividad.php'); ?>

          </div>
          
          <i class="fa fa-table"></i> Actividades del período <?php echo $ano; ?>
        </div>


        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-sm" id="dataTableactividad" name="dataTableactividad" width="100%" cellpadding="0" >
              <thead>
                <tr>
                  <th>Nro de Actividad</th>
                  <th>Nombre</th>
                  <th class="text-center">Inscriptos</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  require_once("conexion.php");

                  
                  // $sql_cli="select * from actividades";

                  $sql_cli="SELECT ac.id_actividad,ac.ac_nombre, COUNT(so.id_actividad) total FROM actividades ac LEFT JOIN socio_actividad so on ac.id_actividad = so.id_actividad AND so.ano='".$ano."' GROUP BY ac.id_actividad";
                  $res_cli=mysqli_query($link,$sql_cli);

                  while ($reg_cli=mysqli_fetch_array($res_cli))
                                {
                ?>

                  <tr class="odd gradeX">
                      <td><?php echo $reg_cli["id_actividad"];?></td>
                      <td><?php echo $reg_cli["ac_nombre"];?></td>
                      <td class="text-center"><a href="actividad-report.php?actividad=<?php echo $reg_cli["id_actividad"];?>&ano=<?php echo $ano;  ?>"> <span class="badge badge-pill badge-primary"><?php echo  $reg_cli["total"];?></span></a></td>



                  </tr>

                <?php
                                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>



        </div>
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
    


  </div>


    <!-- Logout Modal-->
      <?php include('modal/cerrar_sesion.php') ?>
    <!-- Bootstrap core JavaScript-->
    <!-- Core plugin JavaScript-->
    <!-- Custom scripts for all pages-->

      <?php include('include/librerias_js.php') ?> 
      <script type="text/javascript" src="js/actividad.js"></script> 

<script type="text/javascript">
          $(document).ready(function() {
        $('#dataTableactividad').DataTable({
            language:{
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                        },
            responsive: true
        });
    });

</script>
</body>

</html>
