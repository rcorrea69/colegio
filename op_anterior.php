<?php require 'include\validar_session.php'; ?>

<!DOCTYPE html>
<html lang="es">


<head>

 <?php include('include\header.php') ?>



</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php include('include\menu.php') ?>
<?php 

    $dni=$_GET["dni"];
   include('include\hoy.php');

?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Principal</a>
        </li>
        <li class="breadcrumb-item active">Generar Oden de Pago</li>
      </ol>
      <div class="row">
        <div class="col-12">


        <div class="card">
          
          <div class="card-body">
            <div class="alert alert-info" role="alert">
                <strong>Socio:</strong> 
                <div align="text-center">
                <?php echo $hoy ?>
                </div>
            </div>
                
          <form id="frm-op" name="frm-op">

                <input type="hidden" id="dni" name="dni" value="<?php echo $dni; ?>">
          <div class="form-row">
            
            <div class="form-group col-md-4">
                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código de Pago">
            </div>

            <div class="form-group col-md-2">
             
                  <select class="custom-select form-control" id="periodo" name="periodo">
                    <?php 
                      $mes=10;
                    
                    for ($i = 1; $i <= 12; $i++) 
                      {
                    ?>
                        <option <?php if($i==$mes){echo "selected "; }  ?>value="<?php echo $i ;  ?>"><?php echo $i ;  ?> </option> 
                    <?php    
                      }  
                     ?>  

                  </select>          
              </div>

              <div class="form-group col-md-2">
                <input type="text" class="form-control" id="descuento" name="descuento" placeholder="Descuento">
              </div>
      
              <div class="form-group col-md-3">
               <button type="submit" class="btn btn-primary" id="carga_codigo" name="carga_codigo">Cargar Código</button> 
              </div>



          </div><!--  fin de form-row-->
           
          </form>            
                
         <div  id="detalle_ajax"></div>  
        </div><!--  fin de card body-->

      




          </div> <!--  fin de card -->           
                 <!--  <div  class="row" id="resultados_ajax"></div> -->
         


        </div>


        <div  id="resultados_ajax"></div>
        


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
    
    <!-- Logout Modal-->
      <?php include('modal\cerrar_sesion.php') ?>
    <!-- Bootstrap core JavaScript-->
    <!-- Core plugin JavaScript-->
    <!-- Custom scripts for all pages-->
      <?php include('include\librerias_js.php') ?>  
  </div>
   <script type="text/javascript" src="js/op.js"></script> 
     

</body>



</html>
