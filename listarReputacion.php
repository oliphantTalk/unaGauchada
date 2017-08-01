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
  Include("header_connected_admin.php");

  $reputaciones = datosReputaciones();

?>


<div class="container-fluid">
<div class="row">
	<div class="col-md-12 center-block form_wrapper">
    <br>
		<p>Reputaciones<br>
    </p>
	</div>
  
</div>

 	<div class="table-responsive">
	<table class="table table-hover">
  <?php foreach ($reputaciones as $elem){
            $nombre=$elem->nombre;
            $min=$elem->valormin;
            if (empty($min)){
              $min="<";
            }

            $max=$elem->valormax;
    ?>
    <tbody>
        <tr>
          <td><?php echo $nombre ?></td>
          <br>
          <br>
          <td>[<?php echo $min ?>;<?php echo $max?>]</td>
          <td style="width: 80px;">
           <form action= modificarReputaciones.php method="post">
            <input type="hidden" name="idReputacion" id="idReputacion" value="<?php echo $elem->idReputacion ?>">
            <input type="submit" name="submit" id="submit" tabindex="4" class="form-control btn btn-responder btn-xs " style="" value="Modificar"></td>
           </form>
          <td style="width: 80px;">
           <form action= eliminarReputaciones.php method="post">
            <input type="hidden" name="idReputacion" id="idReputacion" value="<?php echo $elem->idReputacion ?>">
            <input type="submit" name="submit" id="submit" tabindex="4" class="form-control btn btn-responder btn-xs " style="" value="Eliminar"></td>
           </form>
        </tr>
        
    </tbody>
   
<?php }?>
		 	
		</table>

	<br>
	<br>

	</div>

 <div>

   <p style="text-align: center;  font-family: 'Ubuntu', sans-serif;"><a href="agregarReputacion.php">  <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> AGREGAR REPUTACION</a> 

  </div>
  
</div>
