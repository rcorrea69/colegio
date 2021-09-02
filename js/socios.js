$(document).ready(function(){

    $('#dni').focus();

});

		
  $('#naci').blur(function (e) { 
  e.preventDefault();
    
  dni=$('#dni').val();
    if( dni == null || dni.length == 0 || /^\s+$/.test(dni) ) {
    //alert('El dni esta vacio desde aca');
    $('#dni').focus();
    Swal.fire({
      icon: 'warning',
      title: 'Atención...',
      text: 'El Nro de DNI esta vacio #naci',
      //footer: '<a href>Why do I have this issue?</a>'
    });
    return false;
  }
  else{ 
    $.ajax({
      type: "POST",
      url: "ajax/existe_socio.php",
      data: {dni:dni},
      //dataType: "dataType",
      success: function (repuesta) {
        var res=repuesta.trim();      
        if(res!='oK'){
          var mensaje='';
          mensaje=`
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>El numero de Socio ya esta ingresado! `+dni+` </strong>
                    </div>`;
          $("#resultados_ajax").html(mensaje);
          $('#dni').focus();
          
        }

      
      }
    });

  }

  
});

	
$( "#socios" ).submit(function( event ) {
  alert('entre a alta de alumnos');
  var parametros = $(this).serialize();
  var dni=$('#dni').val();
  var apellido=$('#apellido').val();
  var nombres=$('#nombres').val();
  var domicilio=$('#domicilio').val();
  var telefono=$('#telefono').val();

alert('entre a alta de alumnos');
 
  if( dni == null || dni.length == 0 || /^\s+$/.test(dni) ) {
    $('#dni').focus();
    Swal.fire({
      icon: 'warning',
      title: 'Atención...',
      text: 'El Nro de DNI esta vacio alta frm socios'
    });
    return false;
  }

  
  if (nombres==null || nombres.length == 0 || /^\s+$/.test(nombres)){
    $('#nombres').focus();
    Swal.fire({
      icon: 'warning',
      title: 'Atención...',
      text: 'Debe ingresar un Nombre'
    });
    return false;
  }
  if (apellido==null || apellido.length == 0 || /^\s+$/.test(apellido)){
      $('#apellido').focus();
      Swal.fire({
        icon: 'warning',
        title: 'Atención...',
        text: 'Debe ingresar un Apellido'
      });
    return false;
  } 
  if (domicilio==null || domicilio.length == 0 || /^\s+$/.test(domicilio)){
    $('#domicilio').focus();
    Swal.fire({
      icon: 'warning',
      title: 'Atención...',
      text: 'Debe ingresar un Domicilio'
    });
    return false;
  } 
  if (curso==null || curso.length == 0 || /^\s+$/.test(curso)){
    $('#curso').focus();
    Swal.fire({
      icon: 'warning',
      title: 'Atención...',
      text: 'Debe ingresar Año que cursa'
    });
    return false;
  } 

  
    $.ajax({
      type: "POST",
      url: "ajax/nuevo_socio.php",
      data: parametros,
        beforeSend: function(objeto){
        $("#resultados_ajax").html("Mensaje: Cargando...");

        },
        success: function(datos){
          var res=datos.trim();      
          if(res!='eRRor'){
                var template='';
                template= `<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Bien hecho!</strong>
                Socio ha sido ingresado satisfactoriamente.
                </div>`;

                $("#resultados_ajax").html(template);

                function redireccion() {
                window.location.href='foto_socio.php?dni='+dni+'&apellido='+apellido+'&nombre='+nombres;
                }
                setTimeout(redireccion,2000);   
              }
              else{
                var template='';
                template=`
                <div class="alert alert-danger" role="alert">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error!</strong> 
                    Lo siento algo ha salido mal intenta nuevamente.
                </div>`;
                $("#resultados_ajax").html(template);

                function redireccion() {
                window.location.href='socios.php';
                }
                setTimeout(redireccion,2000);                
              } 
          } //success   
  });
  event.preventDefault();

})


$( "#modif_socios" ).submit(function( event ) {
  
 
  var parametros = $(this).serialize();
  var dni=$('#dni').val();
  var apellido=$('#apellido').val();
  var nombres=$('#nombres').val();
  var domicilio=$('#domicilio').val();
  var telefono=$('#telefono').val();
 
  if( dni == null || dni.length == 0 || /^\s+$/.test(dni) ) {
    //alert('Debe ingresar un número de DNI Valido');
    Swal.fire({
      icon: 'warning',
      title: 'Atención...',
      text: 'El Nro de DNI esta vacio'
      //footer: '<a href>Why do I have this issue?</a>'
    });
    $('#dni').focus();   
    return false;
  }

  
  if (nombres==""){
    Swal.fire({
      icon: 'warning',
      title: 'Atención...',
      text: 'Debe ingresar un Nombre'
      //footer: '<a href>Why do I have this issue?</a>'
    });
    $('#nombres').focus();
    return false;
  }
    if (apellido==""){
      Swal.fire({
        icon: 'warning',
        title: 'Atención...',
        text: 'Debe ingresar un Apellido'
      });
    $('#apellido').focus();
    return false;
  } 

  if (domicilio==""){
    Swal.fire({
      icon: 'warning',
      title: 'Atención...',
      text: 'Debe ingresar un Domicilio'
    });
    $('#domicilio').focus();
    return false;
  } 

  
  $.ajax({
      type: "POST",
      url: "ajax/modif_socio.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados_ajax").html("Mensaje: Cargando...");


        },
      success: function(datos){
      $("#resultados_ajax").html(datos);
      
      //$(location).attr('href','panel_socios.php');
      // $('#guardar_datos').hide;
      $("#modif_socios")[0].reset();
      //var url = "panel_socios.php";      
      setTimeout("location.href='panel_socios.php'", 2000);
      
       }
  });
  event.preventDefault();

})
        $('#fecha').datepicker({
            todayHighlight: true,
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true
            
        });

        $('#naci').datepicker({
            todayHighlight: true,
            format: "dd/mm/yyyy",
            language: "es",
            orientation: 'auto bottom',
            autoclose: true
            
        });
    
		


  $('#apellido').on('keyup', function (e) {
    var txt = $(this).val();
    $(this).val(txt.replace(/^(.)|\s(.)/g, function ($1) {
      return $1.toUpperCase( );
    }));
  });

    $('#nombres').on('keyup', function (e) {
    var txt = $(this).val();
    $(this).val(txt.replace(/^(.)|\s(.)/g, function ($1) {
      return $1.toUpperCase( );
    }));
  });

    $('#cobertura').on('keyup', function (e) {
    var txt = $(this).val();
    $(this).val(txt.replace(/^(.)|\s(.)/g, function ($1) {
      return $1.toUpperCase( );
    }));
  });

    $('#domicilio').on('keyup', function (e) {
    var txt = $(this).val();
    $(this).val(txt.replace(/^(.)|\s(.)/g, function ($1) {
      return $1.toUpperCase( );
    }));
  });