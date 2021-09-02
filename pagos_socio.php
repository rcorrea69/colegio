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
        <a href="panel_socios.php">Principal</a>
        </li>
        <li class="breadcrumb-item active">Consulta de Pagos por Socio</li>
      </ol>
      <div class="row">
        <div class="col-12">
        <div class="card  border-primary">   
          <div class="card-body border border-primary"> 
          
          <form class="form-inline" id="frm-pagos-socio" name="frm-pagos-socio" autocomplete="off">
            <div class="form-group mb-2">
              <label for="dni" class="sr-only">Nro de Socio D.N.I.</label>
              <input type="text" readonly class="form-control-plaintext mr-2" value="Socio Nro DNI :" style="text-align: right;">
            </div>


            <div class="input-group" >
              <input type="text"  class="form-control"  id="dni" name="dni" placeholder="D.N.I." value="<?php echo $_GET['dni'];  ?>" style="text-align: center;" >
              <span class="input-group-btn">
                <button class="btn btn-default mr-2" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
              </span>
            </div><!-- /input-group -->

            <div class="form-group mr-2">
              <label for="dni" class="sr-only">AÑO</label>
              <input type="text" readonly class="form-control-plaintext" style="text-align: right;">
            </div>
            
            <div class="input-group">

              
              <div id="cbo_ano">               
              </div>


            </div>
          </form>
          </div>
        </div>


        <div class="row">

           <div  id="resultados_ajax" class="col-12">
             
           </div> 
        </div>
           <div  id="loader"></div>  

        </div><!-- /.col-12-->
      </div><!-- /.row-->
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
      <script type="text/javascript" src="js/pagos_socio.js"></script> 
  </div><!-- /.content-wrapper-->
      </body>

</html>
