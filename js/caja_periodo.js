$(document).ready(function () {
    

});

$('#consultar').click(function (e) { 
    e.preventDefault();
    var desde=$('#desde').val();
    var hasta=$('#hasta').val();
    console.log('desde '+desde);
    console.log('hasta '+hasta);
    $.ajax({
        type: "POST",
        url: "ajax/caja_periodo.php",
        data: {desde:desde,hasta:hasta},
        success: function (response) {
            $("#ajax-consulta").html(response);
        }
    });
    
});

