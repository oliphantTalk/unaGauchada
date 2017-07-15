<?php
  session_start();
  if(isset($_SESSION['loggedin'])){ ?>
  
<!DOCTYPE html>
<html>
<head>
	<title>unaGauchada</title>

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta charset = "utf-8">
  <script src="js/jquery-3.2.1.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js-->
   <script src="js/bootstrap.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script type="text/javascript" src="js/funciones.js"></script>
   
  
  
   <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	 <link href="css/box_Login.css" rel="stylesheet" media="screen">
	 <link href="main.css" rel="stylesheet" media="screen">
	 <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">


</head>
<body>

<?php
  Include "funciones/funciones.php";
  Include("header_connected_user.php");
 
?>



<div class="container-fluid">
<div class="row">
	<div class="col-md-12 center-block form_wrapper">
    <br>
		<p> Para publicar un favor debes tener crédito disponible, y no adeudar calificaciones de tus favores caducados </p>
    <br>
    <a href="comprarCredito.php"> Compra un crédito aquí </a>
    <br>
    <a href="misFavores.php"> Ver mis favores </a>
	</div>
  
</div>

</div
  
</body>
</html>
<?php } else {
  header('Location: index.php');
}
?>