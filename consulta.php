<?php require 'include/validar_session.php';?>

<!DOCTYPE html>
<html lang="es">

<head>


   <?php include 'include/header.php'?>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php include 'include/menu.php'?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="alumnos.php">Principal</a>
        </li>
        <li class="breadcrumb-item active">Caja</li>
      </ol>
      <div class="row">
        <div class="col-12">
            
                <div class="form-row">
                    <div class="col-4">
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>
                    <div class="col-4">
                        <input type="button" class="btn btn-primary" id="consultar" name="consultar" value="Consultar"> 
                    </div>
                </div>
          

        </div><!-- /.col-12-->
      </div><!-- /.row-->
      <div id="ajax-consulta"></div>
    </div> <!-- /.container-fluid-->
    
    
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
      <?php include 'modal/cerrar_sesion.php'?>
    <!-- Bootstrap core JavaScript-->
    <!-- Core plugin JavaScript-->
    <!-- Custom scripts for all pages-->
      <?php include 'include/librerias_js.php'?>
      <script type="text/javascript" src="js/consulta.js"></script> 

  </div><!-- /.content-wrapper-->
      </body>

</html>
