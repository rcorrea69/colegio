<?php require 'include/validar_session.php'; ?>


<!DOCTYPE html>
<html lang="es">

<head>


   <?php include('include/header.php');
    $dni = $_GET['dni'];
    ?>

  <link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php include('include/menu.php'); ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="panel_socios.php">Principal</a>
        </li>
        <li class="breadcrumb-item active">Socios Actividad</li>
          


      </ol>
      <div class="row">
        <div class="col-12">


      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <div class="btn-group pull-right">
            <div>
              <button type="button" class="btn btn-info " data-toggle="modal" data-target="#Modal-alta-socio-actividad" > 
                <i class="fa fa-plus" aria-hidden="true"></i> Agregar nueva Actividad al Socio
              </button>    
            </div>
              <?php include('modal/Modal-alta-socio-actividad.php'); ?>

          </div>
          <?php 
            require_once("conexion.php");
            $sqlso="SELECT dni,apellidos,nombres FROM socios WHERE dni=$dni";
            $res = mysqli_query($link,$sqlso);
            $fila = mysqli_fetch_assoc($res);
          ?>

          <i class="fa fa-table"></i> <?php echo 'Socio : <strong> '.$fila['dni']. ' </strong>'.$fila['apellidos']. ' '.$fila['nombres'] ; ?>
        </div>

        
        <div class="card-body">
          <div class="row">  
            <div class="input-group col-6" >
              <label class="col-3" for="ano">AÑO: </label>
              <?php 
              $ano=date("Y");
           
              $sql="SELECT *  FROM anos";
              $res=mysqli_query($link,$sql);
              ?>
              <select class="custom-select" name="ano" id="ano">
               <?php
               while ($row=mysqli_fetch_array($res))

               {
                ?>

                <option  <?php if ($ano==$row["ano"]){echo "selected ";} ?>value="<?php echo $row["ano"];?>"> <?php echo $row["ano"];?></option>




                <?php
              }
              ?>

            </select> 


            </div>
          </div>  
          <input type="hidden" name="dni" id="dni" value="<?php echo $_GET['dni'];  ?>">
          <br>

          <div id="resultados_socio_act"></div>
        </div><!-- card body -->
       <!--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
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
      <script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
      <script src="js/bootstrap-datepicker.min.js"></script>
      <script src="js/bootstrap-datepicker.es.min.js"></script>
      <script type="text/javascript" src="js/socio_actividad.js"></script> 
     


</body>

</html>
