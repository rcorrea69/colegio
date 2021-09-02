
<?php require 'include\validar_session.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>


   <?php include('include\header.php') ?>
   <?php include('include\funciones.php') ?> 
  
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
        <li class="breadcrumb-item active">Usuarios</li>
      </ol>
      <div class="row">
        <div class="col-12">


      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <div class="btn-group pull-right">
            <div>
              <button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#Modal-alta-codigo" > 
                <i class="fa fa-user" aria-hidden="true"></i> Nuevo Usuario
              </button>    
            </div>
              <?php include('modal/Modal-alta-usuario.php'); ?>
              <?php include('modal/Modal-modif-usuario.php'); ?>

          </div>
          <i class="fa fa-users" aria-hidden="true"></i> Usuarios
        </div>


        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-sm" id="dataTable" name="dataTable" width="100%" cellpadding="0" >
           <!--  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> -->  
              <thead>
                <tr>
                  <th>Apellido y Nombres</th>
                  <th>Usuario</th>
                  <th>Clave</th>
                  <th>Tipo </th>
                  <th>Fecha Alta</th>
                  <th>Acción</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  require_once("conexion.php");


            $sql_cli="SELECT usu.id_usuario,usu.usu_usuario,usu.usu_clave,usu.usu_nombre,usu.usu_nivel,usu.usu_fecha_alta,tip.tipo_nombre
            FROM usuarios usu
            INNER JOIN tipo_usuario tip ON usu.usu_nivel = tip.id_usu_tipo";
            //      $sql_cli="SELECT * FROM usuarios";


                                   
                  $res_cli=mysqli_query($link,$sql_cli);

                  while ($reg_cli=mysqli_fetch_array($res_cli))
                                {
                ?>

                  <tr class="odd gradeX">
 
                      <td><?php echo $reg_cli["usu_nombre"];?></td>
                      <td><?php echo $reg_cli["usu_usuario"];?></td>
                      <td style="text-align: center;" ><?php echo "*************";?></td>
                      <td style="text-align: center;" ><?php echo $reg_cli["tipo_nombre"];?></td>
                      <td style="text-align: center;" ><?php echo formato_fecha_dd_mm_Y( $reg_cli["usu_fecha_alta"]);?></td>
                      <td style="text-align: center;">
                        
                       
                        <button type="button" class="btn btn-outline-dark btn-sm " data-toggle="modal" data-target="#Modal-modif-usuario" onclick="obtener_datos(<?php echo $reg_cli["id_usuario"];?>)"  > 
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>     

                   
                      </a>
               

                       
                      </td>

                      <input type="hidden" name="codigo" id="codigo_<?php echo $reg_cli["id_usuario"];?>" value="<?php echo $reg_cli["id_usuario"];?>">
                      <input type="hidden" name="nombre" id="nombre_<?php echo $reg_cli["id_usuario"];?>" value="<?php echo $reg_cli["usu_nombre"];?>">
                      <input type="hidden" name="usu" id="usu_<?php echo $reg_cli["id_usuario"];?>" value="<?php echo $reg_cli["usu_usuario"];?>">
                      <input type="hidden" name="clave" id="clave_<?php echo $reg_cli["id_usuario"];?>" value="<?php echo $reg_cli["usu_clave"];?>"  >
                      <input type="hidden" name="nivel" id="nivel_<?php echo $reg_cli["id_usuario"];?>" value="<?php echo $reg_cli["usu_nivel"];?>"  >


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
      <script type="text/javascript" src="js/usuarios.js"></script> 

</body>

</html>
