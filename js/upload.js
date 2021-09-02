$(document).ready(function () {

    $("#file").change(function () { 
        filePreview(this);
     });

    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadForm + embed').remove();
                $('#uploadForm + img').remove();
                $('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#uploadForm + embed').remove();
//    $('#uploadForm').after('<embed src="'+e.target.result+'" width="450" height="300">');
    //$('#uploadForm').after('<embed src="uploads/vacio.jpg" >');
    $('#uploadForm').after('<embed src="fotos/vacio.jpg" width="450" height="300"/>');

     $('#frm_foto_socio').submit(function (e){ 
        e.preventDefault();
        var dni=$('#dni').val();
        var formData= new FormData();
        var foto = $("#file")[0].files[0];
        formData.append('f',foto);
        formData.append('d',dni);
        $.ajax({
            url:'upload.php',
            type:'POST',
            data:formData,
            contentType:false,
            processData:false,
            success: function(respuesta){
                if(respuesta !=0){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Se subió la foto con Exito !!!',
                        showConfirmButton: true,
                        timer: 2000
                    });
                    //Swal.fire('Mensaje De Confirmacion',"Se subio el archivo con exito","success");
                    //$(location).attr('href','./panel_socios.php');
                    setTimeout("location.href='./panel_socios.php'", 2000);
                }

            }
        });
        
    })


});

