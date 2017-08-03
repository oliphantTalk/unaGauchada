<!DOCTYPE html>
<html>
<head>
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

</head>
<body>

<?php
  session_start();
  Include("funciones/funciones.php");
  Include("header_connected_user.php");
  $idU=$_GET['idUsuario']; 
  $publicaciones = historial($idU);
  $datosUsuario = datosUsuario($_SESSION['idUsuario']);
  $reputacion=reputacionUsuario($datosUsuario['puntaje']);

?>


<div class="container-fluid">
<div class="row">
	<div class="col-md-12 center-block form_wrapper">
    <br>
		<p>Historial del Gaucho<br>   </p>
	</div>

    <div style="text-align: center; font-family:'Ubuntu', sans-serif; ">

    <div class="col-md-6">
    <br>
      <p><b>REPUTACION: <?php $reputacion['nombre'] ?> </b></p>
    </div>
    <div class="col-md-6">
      <br>
      <p><b>PUNTAJE: <?php $datosUsuario['puntaje'] ?> </b></p>
    </div>  
      
    </div>
  
</div>

   <br>  

 	<div class="table-responsive">
	<table class="table table-hover">
    <thead>
      <td><b>Favor</b></td>
      <td><b>Calificación</b></td>
      <td><b>Comentario</b></td>
    </thead>
    <?php foreach ($publicaciones as $elem){ 
          $idCalificacion=$elem->idCalificacion;
          $calificacion = calificacion($idCalificacion);?>
    <tbody>
        <tr>
          <td><?php echo $elem->titulo ?></td>
          <td><?php echo $calificacion['nombre'] ?></td>
          <td><?php echo $elem->ComentarioCalif ?></td>
        </tr>
        
    </tbody>
   
<?php }?>
		 	
		</table>

	<br>
	<br>

	</div>
