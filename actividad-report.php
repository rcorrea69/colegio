<?php require 'include/validar_session.php';?>
<?php
    $actividad=$_GET["actividad"];
    $ano=$_GET["ano"];

?>

<!DOCTYPE html>
<html lang="es">

<head> 


   <?php include 'include/header.php';?>
   <?php include 'conexion.php';?>
   <?php 
   $sqlact="SELECT ac_nombre FROM actividades WHERE id_actividad=$actividad";
   $dep=mysqli_query($link,$sqlact);
   $acti=mysqli_fetch_assoc($dep);
   ?>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php include 'include/menu.php'?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="actividades.php">Actividad</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $acti["ac_nombre"];?></li>
      </ol>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header"><h5>Listado de Inscriptos Vigentes Año <?php echo $ano; ?></h5></div>
            <?php  


         require_once("include/funciones.php");

         $sql_cli_act="SELECT soa.id_socio,soa.id_actividad,soa.fecha_alta,soa.ano,a.ac_nombre,so.apellidos,so.nombres,so.celular,so.fecha_apto,soa.fecha_alta,so.mail,so.celular
         FROM socio_actividad soa 
         INNER JOIN actividades a ON soa.id_actividad = a.id_actividad 
         INNER JOIN socios so ON soa.id_socio=so.dni
         WHERE soa.ano=$ano AND soa.id_actividad=$actividad ";

            $res_cli_act=mysqli_query($link,$sql_cli_act);
           
            $cant_rows = mysqli_num_rows($res_cli_act); 

            if ($cant_rows>0){
              ?>
            

            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>DNI</th>
                  <th>NOMBRE Y APELLIDO</th>
                  <th>MAIL</th>
                  <th>CELULAR</th>
                  <th>F. APTO M</th>
                  <th>F. INSC.</th>

                </tr>
              </thead>
              <tbody>
                <?php
                  $i=1;       
                  while ($reg_cli_act=mysqli_fetch_array($res_cli_act))
                                {
                ?>

              
                <tr>
                  <th scope="row"><?php echo $i ;  ?></th>
                  
                  <td><?php echo $reg_cli_act["id_socio"]; ?></td>
                  <td><?php echo $reg_cli_act["nombres"]." ".$reg_cli_act["apellidos"]; ?></td>
                  <td><?php echo $reg_cli_act["mail"]; ?></td>
                  <td><?php echo $reg_cli_act["celular"]; ?></td>
                  <td><?php echo formato_fecha_dd_mm_Y($reg_cli_act["fecha_apto"]); ?></td>
                  <td><?php echo formato_fecha_dd_mm_Y($reg_cli_act["fecha_alta"]); ?></td>
                </tr>

              <?php $i++; }  ?>
              </tbody>
            </table>
          <?php }
          else { ?>
            <br>
            <div class="alert alert-danger" role="alert">
               
              <h5><strong>A la fecha no hay inscriptos a <?php echo $acti["ac_nombre"];?></strong></h5>
               
            </div>
          <?php     }
           ?>
          </div>
          
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
  </div><!-- /.content-wrapper-->
      </body>
<?php mysqli_close($link); ?>
</html>
