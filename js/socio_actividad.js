		$(document).ready(function(){
			

			trae_socio_act();


		});





		$('#ano').change(function(){

			trae_socio_act();
			//alert('Cambie de año: '+ano+'DNI: '+dni);
		});



		function refrescar_tabla(){

		setTimeout('location.reload()',1500);	
		//location.reload();
			
		}

	

	function trae_socio_act(){
		
		var dni = $('#dni').val();
		var ano = $('#ano').val();

	 $.ajax({
			type: "POST",
			url: "ajax/carga-socio-actividad.php",
			data: {dni:dni, ano:ano},
			 beforeSend: function(objeto){
				$("#resultados_socio_act").html("Mensaje: Cargando...");
				
			  },
			success: function(datos){
			$("#resultados_socio_act").html(datos);
			// $('#guardar_datos').hide;
			// refrescar_tabla();
			
		  }
	});		


	}		


		
   $("#cierre").click(function(event) {
   		
	   	$("#guardar_actividad")[0].reset();
   });		

	
$( "#guardar_socio_actividad" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);

  var dni = $('#dni').val();
  var fecha =$('#falta').val();
  var actividad =$('#actividad').val();

 	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_socio_actividad.php",
			data: {dni:dni,fecha:fecha,actividad:actividad },
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


$( "#modif_codigo" ).submit(function( event ) {
 // $('#guardar_datos').attr("disabled", true);
 
 var parametros = $(this).serialize();
 //console.log(parametros);
	 $.ajax({
			type: "POST",
			url: "ajax/modif_codigo.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax_modif").html("Mensaje: Cargando...");
				
			  },
			success: function(datos){
			$("#resultados_ajax_modif").html(datos);
			$('#guardar_datos').hide;
			refrescar_tabla();
			
		  }
	});
  event.preventDefault();
})






			function obtener_datos(id){
			var codigo=id;
			var importe=$("#importe_"+id).val();
			var actividad=$("#actividad_"+id).val();
			var categoria=$("#categoria_"+id).val();

			$("#codigo-modif").val(codigo);
			$("#importe-modif").val(importe);
			$('#actividad-modif').val(actividad);
			$('#categoria-modif').val(categoria);

		}


        $('#dataTablecodigo').DataTable({
            language:{
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                        },
            responsive: true
        }); 
		
		

        $('#falta').datepicker({
            todayHighlight: true,
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true
            
        });