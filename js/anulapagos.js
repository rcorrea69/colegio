$(document).ready(function () {
    foco();
});

    function foco() {
        $("#op").focus();
    }

    $("#dni").blur(function () {
    var dni = $("#dni").val();

    $.ajax({
        type: "POST",
        url: "ajax/busco_socio.php",
        data: "dni=" + dni,
        success: function (datos) {
        $("#resultados_ajax").html(datos);
        },
    });
    });

    function abrirNuevoTab(dire) {
    // Abrir nuevo tab
    var win = window.open(dire, "_blank");
    // Cambiar el foco al nuevo tab (punto opcional)
    win.focus();
    }

    $("#frm-pagos").submit(function (event) {
    // $('#guardar_datos').attr("disabled", true);
    var op = $("#op").val();

    if (op == "") {
        Swal.fire({
        icon: "info",
        title: "Upss..",
        text: "Debe ingresar un nro. de recibo!",
        });
        $("#op").focus();

        //alert('No Ingreso OP');
        return false;
    }

    $.ajax({
        type: "GET",
        url: "./ajax/procesa_anulapagos.php",
        data: {op},
        success: function (response) {
            
            $('#resultados_ajax').html(response);
        
        }
    });
    //coders original
    // var dire = "./reportes/orden_de_pago.php?op=" + op;
    // abrirNuevoTab(dire);

    event.preventDefault();
    });





