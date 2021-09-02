$(document).ready(function () {
    

});

$('#consultar').click(function (e) { 
    e.preventDefault();
    var fecha=$('#fecha').val();
    $.ajax({
        type: "POST",
        url: "ajax/consulta.php",
        data: {fecha:fecha},
        success: function (response) {
            $("#ajax-consulta").html(response);
        }
    });
    
});