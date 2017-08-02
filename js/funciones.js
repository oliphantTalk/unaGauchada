$(document).ready(function(){

    $(".messages").hide();
    //queremos que esta variable sea global
    var fileExtension = "";
    //función que observa los cambios del campo file y obtiene información
    $('.file').change(function()
    {
        //obtenemos un array con los datos del archivo
        var file = $("#imagen")[0].files[0];
        //obtenemos el nombre del archivo
        var fileName = file.name;
       //obtenemos la extensión del archivo
        document.getElementById("imgFavor").value="img/img_publicacion/"+fileName;
        alert(($("#imgFavor")).val());

        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        var fileSize = file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo


    });

    //al enviar el formulario
    $('#botonSubeImagen').click(function(){
    //información del formulario
    var formData = new FormData($(".upload_form")[0]);
    var message = "";

    //hacemos la petición ajax
    $.ajax({
        url: 'upload.php',
        type: 'POST',
        // Form data
        //datos del formulario
        data: formData,
        //necesario para subir archivos via ajax
        cache: false,
        contentType: false,
        processData: false,
        //mientras enviamos el archivo
        beforeSend: function(){
            message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
            showMessage(message)
        },
        //una vez finalizado correctamente
        success: function(data){
            message = $("<span class='success'>La imagen ha subido correctamente.</span>");
            showMessage(message);
            if(isImage(fileExtension))
            {
                $(".showImage").html("<img src='img/img_publicacion"+data+"' />");
            }
        },
        //si ha ocurrido un error
        error: function(){
            message = $("<span class='error'>Ha ocurrido un error.</span>");
            showMessage(message);
        }
    });
});


$('#botonSubeImagen2').click(function(){
    //información del formulario
    var formData = new FormData($(".contact_form")[0]);
    var message = "";


    //hacemos la petición ajax
    $.ajax({
        url: 'uploadImgPerfil.php',
        type: 'POST',
        // Form data
        //datos del formulario
        data: formData,
        //necesario para subir archivos via ajax
        cache: false,
    contentType: false,
    processData: false,
    success: function(data){
},
error: function(){
    message = $("<span class='error'>Ha ocurrido un error.</span>");
    showMessage(message);

}

});
});
});

//como la utilizamos demasiadas veces, creamos una función para
//evitar repetición de código
function showMessage(message){
    $(".messages").html("").show();
    $(".messages").html(message);
}

//comprobamos si el archivo a subir es una imagen
//para visualizarla una vez haya subido
function isImage(extension)
{
    switch(extension.toLowerCase())
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg':
        return true;
        break;
        default:
            return false;
            break;
    }
}