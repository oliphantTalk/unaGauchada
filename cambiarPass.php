<?php session_start();?>
<?php
require_once("xajax/xajax_core/xajax.inc.php");

$xajax = new xajax();

function procesaForm($form_values)
{
    global $xajax;
    $respuestaXajax = new xajaxResponse();

    $pass1 = $form_values['password'];
    $pass2 = $form_values['password2'];
    $cadena = "";
    if ($pass1 !== $pass2) {
        $cadena = "Las contraseñas deben ser iguales!";
        $respuestaXajax->assign("password","value", "");
        $respuestaXajax->assign("password2","value", "");
    }
    $respuestaXajax->assign("aviso","innerHTML", $cadena);

    return $respuestaXajax;
}

$xajax->register(XAJAX_FUNCTION, "procesaForm");
$xajax->processRequest();
$xajax->configure('javascript URI','xajax/');





?>





<!DOCTYPE html>
<html>
<head>
    <?php $xajax->printJavascript( "../" ) ?>
    <title>unaGauchada</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset = "utf-8">
    <script src="js/jquery-3.2.1.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js-->
    <script src="js/box_Login.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/box_Login.css" rel="stylesheet" media="screen">
    <link href="main.css" rel="stylesheet" media="screen">
    <link href="fonts/fuenteUbuntu.woff2" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">


    <?php
    /* <?php echo $datosUsuario['password']?>, <?php echo password_verify() ?>*/
    Include("funciones/funciones.php");
    Include("header_connected_user.php");
    $datosUsuario = datosUsuario($_SESSION['idUsuario']);
    //echo $datosUsuario['password'];
    //echo password_hash($datosUsuario['password'], PASSWORD_BCRYPT);
    ?>

    <script>
        $(function () {
            $("#passwordAntiguo").on('blur', function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url ="chequearPassAntiguo.php"; // the script where you handle the form input.
//"actualizarRespuesta.php?idComentario=
                var ingresado = $("#passwordAntiguo").val();
                var real = "<?php echo $datosUsuario['password']?>";
                var data = {ing: ingresado, r: real};

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data, // serializes the form's elements.
                    success: function(response)
                    {
                        if(response!=""){
                        alert(response);
                        }
                    },
                    error: function()
                    {
                        alert("Error inesperado");
                    }
            });





            });
        });



    </script>


</head>
<body>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 center-block form_wrapper">
            <br>
            <p>Cambiar contraseña</p>
        </div>

    </div>

    <br>
    <br>

    <div  class="row">
        <div class="col-md-8 col-md-offset-2">
            <form id="cambiarPass" class="contact_form" action="actualizarPass.php" method="post" name="" >
                <div class=" col-md-10 col-md-offset-1">
                    <input type="hidden" id="passReal" name="passReal" value="<?php echo $datosUsuario['password']?>">
                    <div class="form-group">
                        <label for="pass">Contraseña anterior:</label><br>
                        <input type="password" class="form-control" id= 'passwordAntiguo' name="passwordAntiguo" minlength= "5" maxlength="12" placeholder="Contraseña.." required>
                    </div>

                    <div class="form-group">
                        <label for="pass">Contraseña nueva:</label><br>
                        <input type="password" class="form-control" id="password" name="password" minlength= "5" maxlength="12" placeholder="Contraseña.." required>
                    </div>

                    <div class="form-group">
                        <label for="pass">Repeti la contraseña nueva:</label><br>
                        <input type="password" class="form-control" id="password2" name="password2" minlength= "5" maxlength="12" placeholder="Repeti la contraseña.." onblur="xajax_procesaForm(xajax.getFormValues('cambiarPass'));" required>
                    </div>
                    <div id="aviso" class="form-group"></div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-responder" name="submit"  value="Confirmar">
                    </div>

                </div>

            </form>



        </div>
    </div>
$
</div>
<br>
<br>


</body>
</html>