$(document).ready(function(){


    foco();




		 });

  
  $('#fechaRecibo').datepicker({
      todayHighlight: true,
      format: "dd/mm/yyyy",
      language: "es",
      autoclose: true
            
  });

/*
    var recibo=$('#recibo').val();
    //console.log(recibo);
    
    if (!$.isNumeric(recibo)){
      alert('El Numero de recibo no es valido');
      foco();
      $('#recibo').select();
      return false;
    };*/




  $('#frm-registra-pago').submit(function(event){
    
   var parametros = $(this).serialize();
     console.log(parametros);
     console.log(parametros[op]);
    var recibo=$('#recibo').val();
    //console.log(recibo);
    
    if (!$.isNumeric(recibo)){
      alert('El Numero de recibo no es valido');
      foco();
      $('#recibo').select();
      return false;
    };

       $.ajax({
            type: "POST",
            url: "ajax/nuevo_pago.php",
            data: parametros,
             beforeSend: function(objeto){
              $("#resultados_ajax_rec").html("Mensaje: Cargando...");
                 },
            success: function(datos){
            $("#resultados_ajax_rec").html(datos);
              //alert('Me esta funcionando el submit');      
            }
        });


  
    event.preventDefault();
  });





/*       $.ajax({
            type: "POST",
            url: "ajax/nuevo_pago.php",
            data: parametros,
             beforeSend: function(objeto){
              $("#resultados_ajax_rec").html("Mensaje: Cargando...");
                 },
            success: function(datos){
            $("#resultados_ajax_rec").html(datos);
              //alert('Me esta funcionando el submit');      
            }
        });*/




   function foco(){
      $('#recibo').focus();
    } 
  
    function detalle(){
        var dni=$("#dni").val();  
          $.ajax({
                type: "POST",
                url: "ajax/op-tem-detalles.php",
                data:{dni},
                success: function(response)
                  {
                    $('#detalle_ajax').html(response);
                  }


          });

     };



$( "#frm-op" ).submit(function( event ) {

  var parametros = $(this).serialize();
  console.log(parametros);

   $.ajax({
      type: "POST",
      url: "ajax/tmp-op.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados_ajax").html("Mensaje: Cargando...");
           },
      success: function(datos){
      $("#resultados_ajax").html(datos);
      detalle();
      $('#frm-op').trigger('reset');
      $('#codigo').focus();
      $('#codNombre').html('<p></p>');


      //$('#guardar_datos').hide;
      //detalle();
      
      }
  });
  event.preventDefault();
});





    function buscosocio(){
  
      var dni=$("#dni").val();
      
         $.ajax({
          type:"POST",
          url:"ajax/busco_socio.php",
          data: {dni:dni},
          success: function(respuesta){
            var socio = JSON.parse(respuesta);
            var template="";

              socio.forEach(socios=>{
                console.log(socios);
                template+=`
                 <p>Socio: <strong>${socios.dni}</strong></p>
                 <p>${socios.nombre} ${socios.apellido} </p>
                 <p>Categoría:<strong> ${socios.categoria}</strong></p>
                `
                })

              $('#socio').html(template);

          }

         

       });

    };    


    $('#codigo').blur(function(){
      var codigo =$('#codigo').val();
        if (codigo==""){
        
          
          $('#frm-op').trigger('reset');
          

        }

        else {
         $.ajax({
          type:"POST",
          url:"ajax/busco_codigo.php",
          data: {codigo:codigo},
          success: function(respuesta){
/*            alert(''+respuesta);
            console.log(respuesta);
*/            var cod = JSON.parse(respuesta);
            console.log(cod);
            var template="";

                cod.forEach(codigos=>{
                console.log(codigos);
                template+=`
                 <p> <strong>${codigos.actividad} ${codigos.categoria} ${codigos.importe} </strong></p>                         
                `
                })

              $('#codNombre').html(template);

          }

         

       });/////fin de ajax

        }////fin del else 
    });

// Delete un item
  // $(document).on('click', '.borro-item', (e) => {
  //   if(confirm('Are you sure you want to delete it?')) {
  //     const element = $(this)[0].activeElement.parentElement.parentElement;
  //     const id = $(element).attr('taskId');
  //     $.post('task-delete.php', {id}, (response) => {
  //       fetchTasks();
  //     });
  //   }
  // });


// Borro solo un item del detalle de pagos
$(document).on('click','.borro-item',function(){
  
  var elemento=$(this)[0].parentElement.parentElement;
  var id = $(elemento).attr('idcodigo');
    $.post('ajax/borro_item.php',{id},function(respuesta){
        detalle();
        //console.log(respuesta);

    })

});





$('#genero-op').on('click', function(){

    var dni=$("#dni").val();
    var totalop=$("#totalop").val();
    var hoy=$("#hoy").val();

         $.ajax({
          type:"POST",
          url:"ajax/nuevo_op.php",
          data: {dni,totalop,hoy},
          success: function(respuesta){

            //console.log(respuesta);
 
            alert('Se dio de alta la orden de pagos '+ respuesta); 
            detalle();

            window.open("./reportes/orden_de_pago.php?op="+ respuesta, '_blank');
          }

         

       });

 

});

 

