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
  $postulaciones = postulaciones($_GET['idUsuario']);
?>


<div class="container-fluid">
<div class="row">
	<div class="col-md-12 center-block form_wrapper">
    <br>
		<p>Historial de Postulaciones<br>
    </p>
	</div>
  
</div>

      <br>
      <br>

 	<div class="table-responsive">
	<table class="table table-hover">
    <thead>
      <td><b>Favor</b></td>
      <td><b>Estado</b></td>
    </thead>
    <?php foreach ($postulaciones as $elem){ 
          $idEstado=$elem->idEstado;
          $estado = estado($idEstado);

          $idPublicacion = $elem->idPublicacion;
          $publicacion = datosFavor($idPublicacion);
    ?>
    <tbody>
        <tr>
          <td><?php echo $publicacion['titulo']; ?></td>
          <td><?php echo $estado['nombre']; ?></td>
        </tr>
        
    </tbody>
   
<?php }?>
		 	
		</table>

	<br>
	<br>

	</div>
