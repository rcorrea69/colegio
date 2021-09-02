<?php require 'include/validar_session.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>


   <?php include('include/header.php') ?>

  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php include('include/menu.php') ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="panel_socios.php">Principal</a>
        </li>
        <li class="breadcrumb-item active">Panel de Socios</li>
      </ol>
      <div class="row">
        <div class="col-12">


      <!-- Example DataTables Card-->
    
      <div id="resultados_ajax"></div>
      <div class="d-flex justify-content-center d-flex align-items-center" style="height:  60vh">
        <div id="loader"></div>
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
  <script type="text/javascript" src="js/panel_socios.js"></script> 
     <!--  <script type="text/javascript" src="js/actividad.js"></script>  -->

</body>

</html>
