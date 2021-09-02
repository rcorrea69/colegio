<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <?php include('include/header.php') ?>
</head>

<body class="bg-dark">
    <?php require 'conexion.php'; ?>
<?php

    # Verifico si envio un usuario y pin, y si es válido.
    $error="";
    if (isset($_REQUEST["ingresar"])) {
        if ($_REQUEST["usuario"] == "") {
        $error="Debe ingresar su usuario";
        } else {
        $resalu=mysqli_query($link,"select count(*) as cant from usuarios where usu_usuario='" . $_REQUEST["usuario"] . "'");   
        //$resalu=mysql_query("select count(*) as cant from usuarios where usu_usuario='" . $_REQUEST["usuario"] . "'",$sql);
        if ($resalu) {
            $dataalu=mysqli_fetch_array($resalu);
            if ($dataalu[0]==0) {
                $error="El Usuario no existe.";
            } else {
                $res=mysqli_query($link,"select count(*) as cant from usuarios where usu_usuario='" . $_REQUEST["usuario"] . "' and usu_clave='" . $_REQUEST["pass"] . "'");
                if ($res) {
                    $data=mysqli_fetch_array($res);
                    if ($data[0]==1) {
                        //addlog("Alumno autenticado OK con dni " . $_REQUEST["usuario"]);
                        //mysql_query("update alumnos set aceptaCambios='S' where dni='" . $_REQUEST["dni"] ."'");
                        $res=mysqli_query($link,"select id_usuario,usu_usuario,usu_nivel,usu_nombre from usuarios where usu_usuario='" . $_REQUEST["usuario"] . "' and usu_clave='" . $_REQUEST["pass"] . "'");
                        $data=mysqli_fetch_array($res);
                        //session_start();
                        $_SESSION["login"]='OK';
                        $_SESSION['nombre']=$data['usu_nombre'];
                        $_SESSION['nivel']=$data['usu_nivel'];
                        $_SESSION['id_usuario']=$data['id_usuario'];
                        ?>
                        <script>
                            function redireccionar() {
                              setTimeout("location.href='alumnos.php'", 1000);
                              }
                            redireccionar();    

                          //document.location='alumnos.php';
                        </script>
                        <?php
                        mysqli_close($link);
                        exit;
                    } else {
                        $error="Password incorrecto.";
                    }
                } else {
                    $error="Error en la consulta a la base de datos: " . mysqli_error($sql);
                }
            }
        } else {
            $error="Error en la consulta a la base de datos: " . mysqli_error($sql);
        }
        }
        // if ($error != "" ) {

        // $error= $error;
        // // $error ="Se ha producido el siguiente error: \"". $error . "\" ";
        // }
    }
?>

<br/>
<br/>
<br/>


  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"style="text-align: center;">Ingreso al Sistema</div>
      <div class="card-body">

                      <?php 

                      if ($error !== "") {
        
                     ?>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Error! </strong><?php print $error?>
                        
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                      <?php } ?>  



        <form role="form" name="form1" method="post" action="login.php" autocomplete="off" >
          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input class="form-control"  placeholder="Usuario" name="usuario" id="usuario" type="text" autofocus="autofocus">

            <!-- <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email"> -->
          </div>
          <div class="form-group">
            <label for="pass">Contraseña</label>
            <!-- <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password"> -->
            <input class="form-control" placeholder="Contraseña" name="pass" id="pass" type="password" value="" >
          </div>
          <input type="submit" value="Ingresar" name="ingresar" id="ingresar" class="btn btn-lg btn-success btn-block">
          <!-- <a class="btn btn-primary btn-block" href="login.php">Ingresar</a> -->
        </form>
      </div>
    </div>
  </div>
    <!-- Bootstrap core JavaScript-->
    <!-- Core plugin JavaScript-->
    <!-- Custom scripts for all pages-->
      <?php include('include/librerias_js.php') ?>  
</body>

</html>
