<?php session_start();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<title>unaGauchada</title>


  
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset = "utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>

	 <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	 <link href="css/box_Login.css" rel="stylesheet" media="screen">
   
	 <link href="main.css" rel="stylesheet" media="screen">
	 <link href="fonts/fuenteUbuntu.woff2" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <script type="text/javascript" src="js/funciones.js?nocache="></script>

</head>
<body>

<?php
  Include("funciones/funciones.php");
  Include("header_connected_user.php");
  $datosUsuario = datosUsuario($_SESSION['idUsuario']);
?>

<div class="container-fluid">
<div class="row">
	<div class="col-md-12 center-block form_wrapper">
    <br>
		<p>Edita tu perfil<br>
    Recuerda no dejar campos en blanco</p>
	</div>
  
</div>

      <br>
      <br>

        <div  class="row">
        <div class="col-md-8 col-md-offset-2">
        <form enctype="multipart/form-data" id="editarPerfil" class="contact_form" action="modificarPerfil.php" method="post" name="contact_form" >
        <div class=" col-md-10 col-md-offset-1">
                  <div class="form-group ">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="" class="form-control" id="nombre" name="nombre"  maxlength="32" value="<?php echo $datosUsuario['nombre']?>" placeholder=<?php echo $datosUsuario['nombre']?> >
                  </div>
              

                  <div class="form-group">
                    <label for="exampleInputPassword1">Apellido</label>
                    <input type="" class="form-control " id="apellido" name="apellido"  maxlength="32" value="<?php echo $datosUsuario['apellido']?>" placeholder=<?php echo $datosUsuario['apellido']?> >
                  </div>

                  <div class="form-group">
                    <label for="fechaNacimiento"> Fecha Nacimiento:</label><br>
                     <input type="date" id="cumpleanios" class="form-control" name="cumpleanios" step="1" value="<?php echo $datosUsuario['fecha_nac']?>" placeholder="<?php echo $datosUsuario['fecha_nac']?>" >

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
    alert("Debes tener 16 años o mas");
   
   }

} 
  
  
  
  


</script>

                  </div>
                  
                 <div class="form-group">
                     <label for="telefono">Telefono:</label><br>
                     <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $datosUsuario['telefono']?>" placeholder=<?php echo $datosUsuario['telefono']?> >
                  </div>



                  <div class="form-group">
                     <label for="codPostal">Codigo Postal:</label><br>
                     <input type="number" class="form-control" id="codPostal" name="codPostal" value="<?php echo $datosUsuario['codPostal']?>" placeholder=<?php echo $datosUsuario['codPostal']?> >
                  </div>


             <div class="form-group">
                <label>Cambiar imagen de perfil</label><br />
                <input id="imagen" name="archivo" class="file" type="file"/><br /><br />


             </div>


            <div class="form-group">
                <input type="hidden" id="imgPerfil" name="imgPerfil" value="<?php echo $datosUsuario['fotoPerfil']?>">
                <img class='perfil' style='width:40%' src="<?php echo $datosUsuario['fotoPerfil']?>"  onerror="this.onerror=null;this.src='img/icon_gauchada.png'; this.style='width:30%'">

            </div>


            <br>





                 
                  <div id="aviso" class="form-group">
                  </div>
            <div class="messages" class="form-group">
            </div>

        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div style="text-align: center;">
                    <a href="cambiarPass.php" target="_blank" class="" style="font-family: 'Ubuntu', sans-serif; " >CAMBIAR CONTRASEÑA</a>
                </div>
                <br>
                <button id="botonSubeImagen2" value="Subir imagen" class="form-control btn btn-responder">Modificar datos</button><br />
              <!--<input type="submit" name="botonSubeImagen2" id="botonSubeImagen2" tabindex="4" class="form-control btn btn-login" value="Cambiar datos"">-->






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