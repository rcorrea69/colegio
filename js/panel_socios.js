$(document).ready(function(){

		cargasocios();
    //cargacombo();
    
		

		});

function cargasocios(){

var template='<div class="spinner-grow text-dark" style="width: 5rem; height: 5rem;" role="status">  <span class="sr-only">Cargando...</span></div>';
      $.ajax({
                            type: "POST",
                            url: "ajax/carga-panel-socios.php",
                             beforeSend: function(objeto){
                              $("#resultados_ajax").html("Mensaje: Cargando...");

                              $('#loader').html(template);
                              },

                              success: function(datos){
                               
                              $("#resultados_ajax").html(datos);
                              $('#loader').html('');
                            }

          });

     }







	$("#dni").blur(function(){

  var dni = $("#dni").val();


 		$.ajax({
 			type:"POST",
 			url:"ajax/busco_socio.php",
 			data:"dni="+dni,
 				success: function(datos){
 					$("#resultados_ajax").html(datos);

 				}
 			})

		});


$( "#frmsocio_actividad" ).submit(function( event ) {
  // $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
   $.ajax({
      type: "POST",
      url: "ajax/socio_actividad.php",
      data: parametros,
      beforeSend: function(objeto){
        $("#resultados_ajax").html("Mensaje: Cargando...");
        
        },
      success: function(datos){
      $("#resultados_ajax").html(datos);
      $('#guardar_datos').hide;
      refrescar_tabla();
      
      }
  });
  event.preventDefault();
})




     function cargacombo(){

     		 $.ajax({
                            type: "POST",
                            url: "ajax/cbo-actividades.php",
                             success: function(response)
                             {
                                 $('#cbo').html(response);
                             }


      		});

     };



