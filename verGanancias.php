<!DOCTYPE html>
<html>
<head>
	<title>unaGauchada</title>

  
  
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset = "utf-8">
     <script src="js/jquery-3.2.1.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js-->
   <script src="js/box_Login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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
  $fechaInicio=$_POST['fechaInicio'];
  $fechaFin=$_POST['fechaFin'];
  $ganancias = ganancias($fechaInicio, $fechaFin);
  if (empty($ganancias)){?>
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 center-block form_wrapper">
            <br>
            <p> No existen ganancias en el rango de fecha ingresado </p>
            <br>
            <a href="ganancias.php" class="link"> Volver </a>
        </div>

    </div>

</div>

 <?php }else{ ?>


<div class="container-fluid">
<div class="row">
	<div class="col-md-12 center-block form_wrapper">
    <br>
		<p>GANANCIAS OBTENIDAS ENTRE <?php echo $fechaInicio ?> Y <?php echo $fechaFin ?> <br>
    </p>
	</div>
  
</div>

      <br>
      <br>

    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <td style=""><b>Usuario</b></td>
                <td><b>Cantidad</b></td>
                <td><b>Precio</b></td>
                <td><b>Fecha de compra</b></td>
            </tr>

 <?php
 	foreach ($ganancias as $elem){
    $usuario= datosUsuario($elem->idUsuario);?>


    <tr>
        <td> <?php echo $usuario['nombre']  ?></td>
    	<td> <?php echo $elem->cantidad  ?> </td>
        <td> $<?php echo $elem->valorActual  ?> </td>
        <td> <?php echo $elem->fecha  ?> </td>
	</tr>

<?php 
} ?>
  </table>




<?php

$gananciasTotales= gananciasTotalesEntre($fechaInicio,$fechaFin); ?>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 center-block form_wrapper">
                    <br>
                    <p>GANANCIAS TOTALES: $<?php echo $gananciasTotales[0]->Total; ?>
                    </p>
                </div>

            </div>






	</div>
<?php }?>