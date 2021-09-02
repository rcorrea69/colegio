<?php require_once("../validar_session.php"); ?>
<?php
require_once("../conexion.php");
$op = $_GET['op'];
$respuesta=1;



$sqlcabecera="SELECT alumnos.dni,alumnos.apellidos,alumnos.nombres,o_pagos.op_fecha,o_pagos.op_importe FROM alumnos,o_pagos Where o_pagos.socio=alumnos.dni and o_pagos.id_op=".$op;
$res = mysqli_query($link, $sqlcabecera);
$cant=mysqli_num_rows($res);
if ($cant==0){
    $respuesta=0;
}

echo $respuesta;

mysqli_close($link);
?>