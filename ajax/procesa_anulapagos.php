<?php require_once("../validar_session.php"); ?>
<?php
require_once("../conexion.php");
$op = $_GET['op'];
function formato_fecha_dd_mm_Y($date)
{
    $fecha = str_replace('/', '-', $date);
    return date('d/m/Y', strtotime($date));
}

function formato_fecha_Y_mm_dd($date)
{
    $fecha = str_replace('/', '-', $date);
    return date('Y-m-d', strtotime($fecha));
}

$op = $_GET['op'];

$sqlcabecera = "SELECT alumnos.dni,alumnos.apellidos,alumnos.nombres,o_pagos.op_fecha,o_pagos.op_importe FROM alumnos,o_pagos Where o_pagos.socio=alumnos.dni and o_pagos.id_op=" . $op;


//die($sqlcabecera);

$res = mysqli_query($link, $sqlcabecera);



if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_array($res)) {

        $dni = $row['dni'];
        $nombre = $row['nombres'];
        $apellido = $row['apellidos'];
        $fecha = $row['op_fecha'];
        $usuario = $_SESSION['nombre'];
    }

?>
    <div class="card mt-2">
        <div class="card-body">
        <div class="float-right">
        <h5>Recibo <?php echo $op; ?>
            <br>
            <?php echo formato_fecha_dd_mm_Y($fecha); ?>
        </h5>

    </div>
    <br>
    <br>

    <p>Señor/es : <?php echo $apellido . " " . $nombre . " DNI: " . $dni; ?></p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Concepto</th>
                <th>Mes</th>
                <th>Desc</th>
                <th>Importe</th>
            </tr>
        </thead>
        <?php

        $sqldetalle = "SELECT * FROM op_detalles WHERE id_op=" . $op;
        $res = mysqli_query($link, $sqldetalle);
        $total = 0;
        ?>
        <tbody>
            <?php
            while ($fila = mysqli_fetch_array($res)) {
            ?>
                <tr>
                    <td><?php echo $fila['id_codigo']; ?></td>
                    <td><?php echo $fila['detalle_codigo']; ?></td>
                    <td><?php echo $fila['periodo']; ?></td>
                    <td><?php echo $fila['descuento']; ?></td>
                    <td><?php echo $fila['importe'] ?></td>
                    <?php $total = $total + $fila['importe']; ?>
                </tr>


            <?php } ?>

        </tbody>
    </table>

    <div class="float-right">
        <?php echo "TOTAL...$ " . number_format($total, 2, ',', '.'); ?>
    </div>
    <div>
        <button type="button" class="btn btn-primary" id="btnBorrar" name="btnBorrar">Borrar</button>
    </div>

        </div>
    </div>
<?php
} else {
?>
    <br>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> El recibo No existe.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php
}

?>

<?php
mysqli_close($link);
?>
<script>
    $("#btnBorrar").click(function(e) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Esta seguro que desea Anular Recibo?',
            text: "Se Borraran todos los datos del recibo de manera permanente. ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, Anular!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var op = parseInt(<?php echo $op; ?>);

                $.ajax({
                    type: "GET",
                    url: "ajax/borra_pagos.php",
                    data: {
                        op
                    },

                    success: function(response) {
                        var res = parseInt(response);
                        if (res == 1) {
                            swalWithBootstrapButtons.fire(
                                'Borrado!',
                                'El recibo ha sido borrado con exito.',
                                'success'
                            )
                        } else {
                            swalWithBootstrapButtons.fire(
                                'Error!',
                                'Hubo un error al intentar anular el Pago.',
                                'error'
                            )
                        }
                        setTimeout("document.location.reload()", 1500);
                    }
                });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Tu recibo esta a salvo :)',
                    'error'
                )
            }
        })
        e.preventDefault();

    });
</script>