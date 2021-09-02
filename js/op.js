$(document).ready(function () {
  detalle();
  buscosocio();
  foco();
  $("#dataTablecodigo").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    responsive: true,
  });
  $("#datatableConsulta").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    responsive: true,
  });
});

function focoImporte() {
  $("#importe").focus();
  $("#importe").select();
}
function foco() {
  $("#codigo").focus();
}

function detalle() {
  var dni = $("#dni").val();
  $.ajax({
    type: "POST",
    url: "ajax/op-tem-detalles.php",
    data: { dni },
    success: function (response) {
      $("#detalle_ajax").html(response);
    },
  });
}

$("#frm-op").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "ajax/tmp-op.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#resultados_ajax").html("Mensaje: Cargando...");
    },
    success: function (datos) {
      $("#resultados_ajax").html(datos);
      detalle();
      $("#frm-op").trigger("reset");
      foco();
 
      
      }
  });
  event.preventDefault();
});

function buscosocio() {
  var dni = $("#dni").val();

  $.ajax({
    type: "POST",
    url: "ajax/busco_socio.php",
    data: { dni: dni },
    success: function (respuesta) {
      var socio = JSON.parse(respuesta);
      var template = "";

      socio.forEach((socios) => {
        //console.log(socios);
        template += `
                <h4 style="display: inline;"><strong class="text-info">Alumno:</strong>  ${socios.nombre} ${socios.apellido} <strong> Dni: </strong> ${socios.dni} </h4>
                <div class="float-right">
                    <h5><strong class="text-info"> ${socios.recidente}</strong></h5>
                </div>
                
                `;
      });

      $("#socio").html(template);
    },
  });
}

$(document).on("click", ".btnElegir", function () {
  fila = $(this).closest("tr");
  id = parseInt(fila.find("td:eq(0)").text());
  $("#codigo").val(id);
  $("#modalCodigo").modal("hide");
  $("#codigo").focus();

});

$("#codigo").blur(function () {
  var codigo = $("#codigo").val();
  if (codigo == "") {
    $("#frm-op").trigger("reset");
  } else {
    $.ajax({
      type: "POST",
      url: "ajax/busco_codigo.php",
      data: { codigo: codigo },
      success: function (respuesta) {
        var cod = JSON.parse(respuesta);
        // var template = "";
        if (cod != "") {
          $("#descripcion").val(cod[0].descripcion);
          $("#importe").val(cod[0].importe);
          focoImporte();
        } else {
          Swal.fire({
            icon: "error",
            title: "Atención...",
            text: "El Código de cobranza no exixte!",
          });

          // template += `
          //             <div class="alert alert-danger" role="alert">
          //             <button type="button" class="close" data-dismiss="alert">&times;</button>
          //             <strong>Error! No Existe el codigo ingresado </strong>
          //             </div>`;
          $("#codigo").val("");
          $("#codigo").focus();
        }

        // $('#codNombre').html(template);
      }, ////fin del success
    }); /////fin de ajax
  } ////fin del else
});

// Borro solo un item del detalle de pagos
$(document).on("click", ".borro-item", function () {
  var elemento = $(this)[0].parentElement.parentElement;
  var id = $(elemento).attr("idcodigo");
  $.post("ajax/borro_item.php", { id }, function (respuesta) {
    detalle();
    //console.log(respuesta);
  });
});

$("#genero-op").on("click", function () {
  var dni = $("#dni").val();
  var totalop = $("#totalop").val();
  var hoy = $("#hoy").val();

  $.ajax({
    type: "POST",
    url: "ajax/nuevo_op.php",
    data: { dni, totalop, hoy },
    success: function (respuesta) {
      //console.log(respuesta);

      alert("Se dio de alta la orden de pagos " + respuesta);
      detalle();

      window.open("./reportes/orden_de_pago.php?op=" + respuesta, "_blank");
    },
  });
});
