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

  $ganancias = ganancias();

    	

?>


<div class="container-fluid">
<div class="row">
	<div class="col-md-12 center-block form_wrapper">
    <br>
		<p>POSTULANTES<br>
    </p>
	</div>
  
</div>

      <br>
      <br>

 <?php
 	foreach ($publicaciones as $elem){ ?>
 	<div class="table-responsive">
	<table class="table table-hover">
    <tr>
        <td style="text-align: left;"><b><?php echo $elem->titulo ?></b></td>
        <td></td>
        <td></td>
    </tr>
    <?php
    $estado= $elem->estado;

    if ($estado == 1){
      $gaucho = datosUsuario($elem->idGaucho);
  ?>
      <tr>
        <td style="text-align: left;">Se eligió como gaucho a <?php echo $gaucho['nombre']?></td>
        <td></td>
      </tr>
   <?php } else {
  

 		  $idP=$elem->idPublicacion;

  		$postulantes = postulantes($idP);
  		if(empty($postulantes)){ ?>
    			<tr> <td style="text-align: center;">No existen postulantes para esta publicación</td>
    			<td></td>  </tr>

    	<?php	} else {
  	
    	foreach ($postulantes as $elem2){
    		$usuario= datosUsuario ($elem2->idUsuario);
        $comentPostulante = $elem2->comentario;
    		
  ?>


    <tr>
    	<td style="text-align: center;"><a href="verHistorialDelGaucho.php?idUsuario=<?php echo $usuario['idUsuario']?>"> <?php echo $usuario['nombre']. ' ' . $usuario['apellido'] ?> </a></td> 
    	<td style="width: 50px;">
      <form action= elegirPostulante.php method="post">
      <input type="hidden" name="idGaucho" id="idGaucho" value="<?php echo $usuario['idUsuario']?>">
      <input type="hidden" name="idPublicacion" id="idPublicacion" value="<?php echo $elem->idPublicacion?>">

      <input type="submit" name="submit" id="submit" tabindex="4" class="form-control btn btn-responder btn-xs " style="" value="Aceptar"></td>
      </form>
     <td style="text-align: center;"><?php echo $comentPostulante ?> </td> 
	</tr>


		 	
	

	<br>
	<br>
<?php 
} ?>
  </table>
<?php
}
}
}	?>
	</div>
