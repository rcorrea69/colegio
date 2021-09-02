$(document).ready(function () {
    $('#dni').blur(function (e) { 
        e.preventDefault();
        var parametro='ok';
        var dni=$('#dni').val();
        $.ajax({
            type: "POST",
            url: "ajax/existe_socio.php",
           // dataType: 'html',
            data: {dni:dni},
            success: function (response) {
                alert(response+'=='+'oK');
                //var op='oK';
                //var res=response;
                var res=response.trim();

                if(res!='oK'){
                    alert('esta es la repuesta verdadero'+res);
                }else{
                    alert('esta es la respuesta por falso'+res);
                }
                console.log('esta es la repuesta de existe_socio.php '+response );
                
            }
        });


        
        
        
    });

});