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
    
    <div class="container ">
        <div class="row justify-content-center">
          
          <div class="card" style="background-color: #ebebe0;"  >
            <div class="card-header  bg-secondary text-white">
              <h5 class="text-white">Ficha de Alta de Socio <strong class="text-success"> Foto Paso 2/2 </strong></h5>
            </div>
            <div class="card-body">
                <div id="uploadForm">
                <!-- <img src="uploads/vacio.jpg" class="card-img-top" alt="..." > -->
                </div>
                <h4 class="card-title mb-0">Socio: <?php echo $_GET['dni']; ?></h4>
                <h5><p class="card-text "><?php echo $_GET['nombre']." ".$_GET['apellido'];  ?></p></h5>
                
              <form method="post" action="#" enctype="multipart/form-data" id="frm_foto_socio" >
                <input type="file" name="file" id="file" class="form-control btn btn-primary" accept=".jpg" required />
                <input type="hidden" id="dni" name="dni" value="<?php echo $_GET['dni']; ?>" >
                <!-- <input type="submit" name="submit" value="Upload"  class="btn btn-primary"/> -->
            </div>
            <div class="card-footer">
                <input type="submit" name="submit" value="Guardar Foto"  class="btn btn-success"/>
                <!-- <input type="file" name="file" id="file" class="form-control btn btn-primary" required /> -->
            </div>
              </form>
          </div>
        
        </div> 
    </div> 
    
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
      <script src="js/upload.js"></script>  
  </div><!-- /.content-wrapper-->
      </body>

</html>
