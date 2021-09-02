		$(document).ready(function(){

	
			
		});





		function refrescar_tabla(){

		//setTimeout('location.reload()',1000);	
		//location.reload();
			
		}

$('#Modal-alta-actividad').on('show.bs.modal', function (e) {
  $('#nombreact').focus();
})	
		
	
$( "#guardar_actividad" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_actividad.php",
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




