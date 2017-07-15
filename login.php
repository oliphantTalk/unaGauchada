<!DOCTYPE html>
<html>
<head>
	<title>unaGauchada</title>

	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset = "utf-8">
    <script src="js/jquery-3.2.1.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js-->
   <script src="js/bootstrap.min.js"></script>
	 <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	 <link href="css/box_Login.css" rel="stylesheet" media="screen">
	 <link href="main.css" rel="stylesheet" media="screen">
	 <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">


</head>
<body>

<?php
  Include("funciones/funciones.php");
  Include("header.php");

?>


 <div class="container-fluid">
  <div class="row">
  	<div class="col-md-12 center-block form_wrapper">
      <br>
  		<p> Si ya te registraste como usuario, ingresa a continuación tu nombre de usuario y clave. <br>
      De lo contrario, regístrate! Es rápido y sencillo. </p>
  	</div>
  
	</div>

      <br>
      <br>
      <br>
      <br>

        <div  class="row">
        <div class="col-md-8 col-md-offset-2">
        <form id="login-form" action="phpLogin/checklogin.php"  method="post" role="form">
        <div class="form-group">
          <label for="exampleInputEmail1">Usuario</label>
          <input type="email" name="mail" id="mail" tabindex="1" class="form-control" placeholder="Email.." value="" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Contraseña</label>
          <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña..." required>
          </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              
              <input type="submit" name="submit" id="submit" tabindex="4" class="form-control btn btn-responder" value="Iniciar sesión">
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