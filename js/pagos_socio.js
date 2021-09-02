$(document).ready(function(){

  cargacboano();
  foco();
  //consulta();


		});

function foco(){
  $('#dni').focus();



    } 

    function cargacboano(){

     $.ajax({
      type: "POST",
      url: "ajax/cbo-ano.php",
      success: function(response)
      {
       $('#cbo_ano').html(response);
       consulta();
     }


   });

   }


   function consulta(){
    var dni=$('#dni').val();
    var ano=$('#ano').val();

    $.ajax({
      type: "POST",
      url: "ajax/consulta-pagos.php",
      data: {dni:dni,ano:ano},
      beforeSend: function(objeto){
        $("#resultados_ajax").html("Mensaje: Cargando...");
        $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
        
      },
      success: function(datos){
        $("#resultados_ajax").html(datos);
        $('#loader').html('');
      //$('#guardar_datos').hide;
      
      
    }
  });

  }



/*$( "#frm-pagos-socio" ).submit(function( event ) {
  // $('#guardar_datos').attr("disabled", true);
  var dni=$('#dni').val();
  var ano=$('#ano').val();

    if($("#dni").val().length < 5) {  
        alert("El Número de Dni debe como mínimo 5 caracteres");  
        return false;  
    }  

   //console.log(op);
   $.ajax({
      type: "POST",
      url: "ajax/consulta-pagos.php",
      data: {dni:dni,ano:ano},
       beforeSend: function(objeto){
        $("#resultados_ajax").html("Mensaje: Cargando...");
        $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
        
        },
      success: function(datos){
      $("#resultados_ajax").html(datos);
      $('#loader').html('');
      //$('#guardar_datos').hide;
      
      
      }
  });
  event.preventDefault();
})
*/


function cargacombo(){

  $.ajax({
    type: "POST",
    url: "ajax/cbo-actividades.php",
    success: function(response)
    {
     $('#cbo').html(response);

   }


 });

}


