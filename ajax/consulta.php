<?php 
require_once("../conexion.php");

$fecha=($_POST['fecha']);

$sql="SELECT o.id_op, o.socio, o.op_fecha, o.op_importe, o.op_estado, o.id_usuario,a.apellidos, a.nombres, u.usu_nombre 
FROM o_pagos as o,alumnos as a,usuarios as u 
WHERE o.socio=a.dni AND o.id_usuario=u.id_usuario AND o.op_fecha='$fecha'";

$res = mysqli_query($link, $sql);

function formato_fecha_dd_mm_Y($date)
{   
    $fecha = str_replace('/', '-', $date);
    return date('d/m/Y', strtotime($date));
}

//die($sql);

$total=0;

?>
<br>
<div class="card">
<table class="table">
    <thead>
    <tr>
        <th scope="col">Recibo</th>
        <th scope="col">DNI</th>
        <th scope="col">Alumno</th>
        <th scope="col">Fecha</th>
        <th scope="col">Importe</th>
        <th scope="col">Cobrado Por</th>
    </tr>
    </thead>
    <tbody>
    
    <?php while ($reg=mysqli_fetch_array($res))
                                { ?>
    <tr>
        <td><?php echo $reg["id_op"];?></td>
        <td><?php echo $reg["socio"];?></td>
        <td><?php echo $reg["apellidos"]." ".$reg["nombres"];?></td>
        <td><?php echo(formato_fecha_dd_mm_Y($reg["op_fecha"]));?></td>
        <td style="text-align: right "><?php echo "$ ".number_format($reg["op_importe"],2,',','.');?></td>
        <td><?php echo $reg["usu_nombre"];?></td>
        <?php $total=$total + $reg["op_importe"]; ?>
    </tr>
<?php }?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>                            
        <td style="text-align: right ">
            <?php echo "TOTAL...$ ".number_format($total,2,',','.');?>
        </td>                                
    </tr>                            
    </tbody>
</table>
</div>
