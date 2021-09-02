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
    url: "ajax/existe_recibo.php",
    data: { op },

    success: function (response) {
      var res = parseInt(response);

      if (res == 1) {
        var dire = "./reportes/orden_de_pago.php?op=" + op;
        //window.location="./reportes/orden_de_pago.php?op=18";
        abrirNuevoTab(dire);
      } else {
        $("#op").focus();
        Swal.fire({
          icon: "error",
          title: "Upss..",
          text: "El recibo no existe!",
        });
      }
    },
  });

  event.preventDefault();
});

function cargacombo() {
  $.ajax({
    type: "POST",
    url: "ajax/cbo-actividades.php",
    success: function (response) {
      $("#cbo").html(response);
    },
  });
}

// function cargacombo(){
// 	alert("Hello! I am an alert box!!");
// 		                 $.ajax({
//                        type: "POST",
//                        url: "getPaises.php",
//                        success: function(response)
//                        {
//                            $('.selector-pais select').html(response).fadeIn();
//                        }

// 		});
