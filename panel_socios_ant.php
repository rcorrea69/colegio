<?php require 'include\validar_session.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>


   <?php include('include\header.php') ?>

  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php include('include\menu.php') ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="socios.php">Principal</a>
        </li>
        <li class="breadcrumb-item active">Panel de Socios</li>
      </ol>
      <div class="row">
        <div class="col-12">


      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <div class="btn-group pull-right">
            <div>
              
              <a href="socios.php" class="btn btn-primary" title="Cargar nuevo socio"> Agregar socio </a>  
  
            </div>
              <?php include('modal/Modal-alta-actividad.php'); ?>

          </div>
          <i class="fa fa-table"></i> Socios
        </div>


        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-sm" id="dataTable" name="dataTable" width="100%" cellpadding="0" >
           <!--  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> -->  
              <thead>
                <tr>
                  <th>DNI</th>
                  <th>Apellido</th>
                  <th>Nonbres</th>
                  <th>Categoria</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  require_once("conexion.php");
                  $sql_cli="select dni,apellidos,nombres,id_categoria from socios";
                  $res_cli=mysqli_query($link,$sql_cli);

                  while ($reg_cli=mysqli_fetch_array($res_cli))
                                {
                ?>

                  <tr class="odd gradeX">
                      <td><?php echo $reg_cli["dni"];?></td>
                      <td><?php echo $reg_cli["apellidos"];?></td>
                      <td><?php echo $reg_cli["nombres"];?></td>
                      <td><?php echo $reg_cli["id_categoria"];?></td>
                      <td style="text-align: center;">  
                      <a href="op.php?dni=<?php echo $reg_cli["dni"]; ?>" class="btn btn-outline-dark btn-sm" title="Generar Orden de Pago"><i class="fa fa-money" aria-hidden="true"></i> </a>
                      <a href="modif_socios.php?dni=<?php echo $reg_cli["dni"]; ?>" class="btn btn-outline-dark btn-sm" title="Modificar datos del Socio"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>  
                      
                      </td>

                  </tr>

                <?php
                                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
      <?php include('modal\cerrar_sesion.php') ?>
    <!-- Bootstrap core JavaScript-->
    <!-- Core plugin JavaScript-->
    <!-- Custom scripts for all pages-->

      <?php include('include\librerias_js.php') ?> 
     <!--  <script type="text/javascript" src="js/actividad.js"></script>  -->

</body>

</html>
