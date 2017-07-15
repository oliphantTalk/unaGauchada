<?php  
  session_start();
  
  if(isset($_SESSION['loggedin'])){
   ?>

<!DOCTYPE html>
<html>
<head>
	<title>Compra de créditos</title>
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta charset = "utf-8">
    <script src="js/jquery-3.2.1.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js-->
   <script src="js/bootstrap.min.js"></script>
   <script src="js/bootstrap.js"></script>
	
   <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	 <link href="css/box_Login.css" rel="stylesheet" media="screen">
	 <link href="main.css" rel="stylesheet" media="screen">
	 <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">


</head>
<body>

<?php
Include "funciones/funciones.php";
  Include("header_connected_user.php");
  
  $mail = $_SESSION['email'];
  $cantCreditoCompradas = $_SESSION['cantidadCreditoComprada'];
  $conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
  if ($_SESSION['puedeComprar']) {
    $columnas = consultar_db($conexion, "UPDATE usuario SET cantCredito = (cantCredito + '$cantCreditoCompradas') WHERE mail = '$mail'");
    $_SESSION['puedeComprar'] = false;
  }
$res = consultar_db_columnas($conexion, "SELECT cantCredito FROM usuario WHERE mail = '$mail'");

?>

<div class="container-fluid">
  	<div class="row">
  		<div class="col-md-12 center-block form_wrapper">
        <br>
  			<p> Compra Exitosa <br> Ahora tienes <?php echo($res['cantCredito']); ?> creditos </p>
  		</div>
	</div>
</div>
<br>
<br>




</body>
</html>
<?php } 
else{
  header("Location: index.php");
}?>