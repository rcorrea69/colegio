<?php 
require_once("../conexion.php");

$desde=($_POST['desde']);
$hasta=($_POST['hasta']);

$sql="SELECT id_codigo,descripcion, sum(Importe) AS suma
FROM vista_pagos
WHERE op_fecha>='".$desde."' and op_fecha<='".$hasta."'
Group by id_codigo";

//die($sql);

// $sql="SELECT o.id_op, o.socio, o.op_fecha, o.op_importe, o.op_estado, o.id_usuario,a.apellidos, a.nombres, u.usu_nombre 
// FROM o_pagos as o,alumnos as a,usuarios as u 
// WHERE o.socio=a.dni AND o.id_usuario=u.id_usuario AND o.op_fecha='$fecha'";

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
<h5 class="card-title mt-2 " style="text-align: center;"> Detalles de Cobranzas desde <?php echo formato_fecha_dd_mm_Y($desde) ?> hasta <?php echo formato_fecha_dd_mm_Y($hasta) ?>
</h5>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Código</th>
        <th scope="col">Descripción</th>
        <th scope="col" style="text-align: right ">Importe</th>

    </tr>
    </thead>
    <tbody>
    
    <?php while ($reg=mysqli_fetch_array($res))
                                { ?>
    <tr>
        <td><?php echo $reg["id_codigo"];?></td>
        <td><?php echo $reg["descripcion"];?></td>
 
        <td style="text-align: right "><?php echo "$ ".number_format($reg["suma"],2,',','.');?></td>
            <?php $total=$total + $reg["suma"]; ?>
    </tr>
<?php }?>
    <tr>
        <td></td>    
        <td></td>                            
        <td style="text-align: right ">
            <?php echo "TOTAL...$ ".number_format($total,2,',','.');?>
        </td>                                
    </tr>                            
    </tbody>
</table>
</div>
<br>
<input type="button" class="btn btn-primary" id='imprimir_reporte' value="Imprimir">

<!-- <script>
$('#imprimir_reporte').click(function (e) { 
    e.preventDefault();

    var desde=$('#desde').val();
    var hasta=$('#hasta').val();
    console.log('desde '+desde);
    console.log('hasta '+hasta);
    $.ajax({
        type: "POST",
        url: "./blank.php",
        data: {desde:desde,hasta:hasta},
        success: function (response) {
            $("#ajax-consulta").html(response);
        }
    });
    
});

</script> -->