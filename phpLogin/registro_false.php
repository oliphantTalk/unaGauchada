<?php
require_once("../xajax/xajax_core/xajax.inc.php");

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
  }
  $respuestaXajax->assign("aviso","innerHTML", $cadena);
  return $respuestaXajax;

}

$xajax->register(XAJAX_FUNCTION, "procesaForm");
$xajax->processRequest();
$xajax->configure('javascript URI','../xajax/');

?>


<!DOCTYPE html>
<html>
<head>
	<title>unaGauchada</title>
  <?php $xajax->printJavascript( "../" ) ?>

	 <script src="../js/jquery-3.2.1.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js-->
	 <script src="../js/box_Login.js"></script>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset = "utf-8">
	 <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	 <link href="../css/box_Login.css" rel="stylesheet" media="screen">
	 <link href="../main.css" rel="stylesheet" media="screen">
	 <link href="../fonts/fuenteUbuntu.woff2" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

</head>
<body>

<?php

  Include("../header.php");

?>

<div class="container-fluid">
<div class="row">
	<div class="col-md-12 center-block form_wrapper">
    <br>
		<p> Únete hoy a una gauchada<br>
    Recuerda que para hacerlo debes ser mayor de 16 años </p>
	</div>
  
</div>

      <br>
      <br>

        <div  class="row">
        <div class="col-md-8 col-md-offset-2">
        <form id="registro" class="contact_form" action="registrar_usuario.php" method="post" name="contact_form" >
        <div class=" col-md-10 col-md-offset-1">

                  <div id="aviso2" class="form-group">
                  <h2> <span style="color:red"> El Usuario que ha ingresado ya existe. Debe ingresar otra dirección de correo. </span> </h2>
                  </div>

                  <div class="form-group ">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="" class="form-control" name="nombre"  maxlength="32" placeholder="Nombre.." required>
                  </div>
              

                  <div class="form-group">
                    <label for="exampleInputPassword1">Apellido</label>
                    <input type="" class="form-control " id="" name="apellido"  maxlength="32" placeholder="Apellido.." required>
                  </div>

                  <div class="form-group">
                    <label for="fechaNacimiento"> Fecha Nacimiento:</label><br>
                     <input type="date" id="cumpleanios" class="form-control" name="cumpleanios" step="1"  required>

<script type="text/javascript">
  
  $(document).ready(function() 
  {
    $("#cumpleanios").blur( function () {f()});
  })

function f() 
{
  var edadMinima = 16;
  var nacimiento = new Date($('#cumpleanios').val());
  var actual = new Date();
  var permitida = new Date((actual.getFullYear() - edadMinima)+"-"+(actual.getMonth() + 1) +"-"+actual.getDate());
  
  if ((nacimiento - permitida) > 0) {
    document.contact_form.cumpleanios.focus();
    document.contact_form.cumpleanios.value = "";
    document.getElementById("aviso").innerHTML = "Debes tener al menos 16 años";
    alert("Debes ser mayor de edad");
   
   }

} 
  
  
  
  


</script>

                  </div>
                  
                 <div class="form-group">
                     <label for="telefono">Telefono:</label><br>
                     <input type="tel" class="form-control" name="telefono" placeholder="Telefono.." required>
                  </div>



                  <div class="form-group">
                     <label for="codPostal">Codigo Postal:</label><br>
                     <input type="number" class="form-control" name="codPostal" placeholder="Codigo Postal.." required>
                  </div>

                  <div class="form-group">
                     <label for="mail">Mail:</label><br>
                     <input type="email" class="form-control" name="mail" maxlength="32" placeholder="Ejemplo... unaGauchada@hotmail.com" required>
                  </div>

                  <div class="form-group">
                     <label for="pass">Contraseña:</label><br>
                     <input type="password" class="form-control" name="password" minlength= "5" maxlength="12" placeholder="Contraseña.." required>
                  </div>

                  <div class="form-group">
                     <label for="pass">Repeti la contraseña:</label><br>
                     <input type="password" class="form-control" name="password2" minlength= "5" maxlength="12" placeholder="Repeti la contraseña.." onblur="xajax_procesaForm(xajax.getFormValues('registro'));" required>
                  </div>
                  <div id="aviso" class="form-group">
                  </div>

        </div>
      
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              
              <input type="submit" name="submit" id="submit" tabindex="4" class="form-control btn btn-login" value="Registrarme" onclick="xajax_procesaForm(xajax.getFormValues('registro'));">






            </div>
          </div>
        </div>
        
      </form>
  


        </div>
    </div>
    
  </div>
	<br>
	<br>

  
</body>
</html>