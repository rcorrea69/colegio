<?php require 'include/validar_session.php'; ?>

 <!DOCTYPE html>
 <html lang="es">

 <head>


   <?php include('include/header.php') ?>
   <link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">
   <?php
    require_once("conexion.php");

    if (isset($_GET['dni'])) {

      $dni = $_GET['dni'];
    }

    ?>

 </head>

 <body class="fixed-nav sticky-footer bg-dark" id="page-top">
   <!-- Navigation-->
   <?php include('include/menu.php') ?>

   <div class="content-wrapper">
     <div class="container-fluid">
       <!-- Breadcrumbs-->
       <ol class="breadcrumb">
         <li class="breadcrumb-item">
           <a href="alumnos.php">Principal</a>
         </li>
         <li class="breadcrumb-item active">Registro de Alumno</li>
       </ol>
       <div class="row">
         <div class="col-12">
           <div class="card border-primary">
             <div class="card-header  bg-secondary text-white">
               <h5 class="text-white">Ficha de Alta de Alumno </h5>
             </div>
             <div class="card-body ">
               <div class="row">
                 <div class="col-12">
                   <div id="resultados_ajax"></div>
                   <form method="post" autocomplete="off" name="socios" id="socios">
                     <div class="form-row">
                       <div class="form-group col-md-2">
                         <label for="dni" class="text-info">D.N.I</label>
                         <input type="text" class="form-control " id="dni" name="dni" placeholder="DNI" require>
                       </div>
                       <div class="form-group col-md-5">
                         <label for="nombres" class="text-info">Nombres</label>
                         <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres">
                       </div>
                       <div class="form-group col-md-5">
                         <label for="apellido" class="text-info">Apellidos</label>
                         <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos">
                       </div>
                     </div>
                     <div class="form-row">
                       <div class="form-group col-md-6">
                         <label for="domicilio" class="text-info">Domicilio</label>
                         <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio">
                       </div>

                       <div class="form-group col-md-3">
                         <label for="telefono" class="text-info">Teléfono</label>
                         <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
                       </div>
                       <div class="form-group col-md-3">
                         <label for="curso" class="text-info">Curso</label>
                         <input type="text" class="form-control" id="curso" name="curso" placeholder="Curso">
                       </div>
                     </div>

                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="recidente" id="inlineRadio1" value="Residente">
                       <label class="form-check-label" for="inlineRadio1" checked >Residente</label>
                     </div>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="recidente" id="inlineRadio2" value="No Residente">
                       <label class="form-check-label" for="inlineRadio2">No Residente</label>
                     </div>

                     <div class="row d-flex justify-content-end">
                       <button type="submit" class="btn btn-primary" id="guardar_datos">Confirmar Alta de Alumno</button>
                     </div>

                   </form>


                 </div> <!-- columna 12 -->


               </div><!--  row -->
             </div> <!-- card body -->
           </div><!--  card -->

         </div><!-- columna 12 -->
       </div><!--  row -->
     </div><!-- /.container-fluid-->

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

     <script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
     <!--       <script src="js/bootstrap-datepicker.min.js"></script>
      <script src="js/bootstrap-datepicker.es.min.js"></script> -->
     <script type="text/javascript" src="js/alumnos.js"></script>
     <!--       <script type="text/javascript" src="js/socios2.js"></script>  -->
   </div> <!-- /.content-wrapper-->
 </body>

 </html>