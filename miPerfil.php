<?php session_start();?>


<!DOCTYPE html>
<html>
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


</head>
<body>

<?php
Include("funciones/funciones.php");
Include("header_connected_user.php");
$datosUsuario = datosUsuario($_SESSION['idUsuario']);
$reputacion=reputacionUsuario($datosUsuario['puntaje']);


?>

<div class="container-fluid">
<div class="row">
	<div class="col-md-12 center-block form_wrapper">
    <br>
		<p>MI PERFIL<br>
    </p>
	</div>
  
</div>

      <br>
      <br>

        <div  class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="thumbnail " style="text-align: center; font-family: 'Ubuntu', sans-serif;">
              <h1>TU INFORMACIÓN</h1>
              <br>
              <img style="width: 10%; border-radius: 5px;"src="<?php echo $datosUsuario['fotoPerfil'] ?>" onerror="this.onerror=null;this.src='img/icon_gauchada.png'; this.style='width:10%'">
              <br>
              <div class="caption " style="font-size: 18px;">
                <p><b>Nombre:</b> <?php echo $datosUsuario['nombre'] ?> </p>
                <p><b>Apellido:</b> <?php echo $datosUsuario['apellido'] ?></p>
                <p><b>Fecha de nacimiento:</b> <?php echo $datosUsuario['fecha_nac'] ?></p>
                <p><b>Teléfono:</b> <?php echo $datosUsuario['telefono'] ?></p>
                <p><b>Código Postal:</b> <?php echo $datosUsuario['codPostal'] ?></p>
                <p><b>Mail:</b> <?php echo $datosUsuario['mail'] ?></p>
                <p><b>Créditos:</b> <?php echo $datosUsuario['cantCredito'] .' '; if($datosUsuario['cantCredito']==0){echo ('--> ' . "<a class='btn-link' href='comprarCredito.php' target='_blank'>Comprar Creditos</a>");}?></p>
                <p><b>Puntaje:</b> <?php echo $datosUsuario['puntaje'] ?></p>
                <p><b>Reputacion:</b> <?php echo $reputacion['nombre'] ?></p>
                  <p><a class="btn-link" href="verPostulantes.php">Ver mis Postulantes</a></p>
                  <p><a class="btn-link" href="verHistorialPostulaciones.php?idUsuario=<?php echo $datosUsuario['idUsuario']?>">Ver mi historial de Postulaciones</a></p>
                  <p><a class="btn-link" href="#">Ver mi Reputacion</a></p>
                  <p><a class="btn-link" href="#">Ver comentarios de mis favores</a></p>
                  <p><a class="btn-link" href="#">Ver comentarios de mis gauchadas</a></p>
                <br>
                <p><a class="btn btn-responder" href="editarPerfil.php">Editar perfil</a></p>
              </div>
            </div>
          </div>
        </div>
       

	<br>
	<br>

  
</body>
</html>