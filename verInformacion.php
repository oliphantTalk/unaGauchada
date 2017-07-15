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
  $paginas = ["header_connected_user.php", 
  "header_connected_admin.php", 
  "index.php"]; 
  
  if(isset($_SESSION['loggedin'])) {
    if ($_SESSION['admin'] == 0) {
      Include($paginas[0]);
    }
    elseif ($_SESSION['admin'] == 1) {
      Include($paginas[1]);
    }
  }
  else{
    
    header("Location: " . $paginas[2]);
  }
?>


<div class="container-fluid">
<div class="row">
	<div class="col-md-12 center-block form_wrapper">
    <br>
		<p>Sobre Nosotros<br>
    </p>
    </div>
      <br>
      <br>
      <div>
      <br>
      <br>
    <p style="text-align: center;"> Somos Nancy y Ulises y venimos a hacer el bien para la humanidad </p>
    </div>
    <?php if( $_SESSION['admin'] == 1){ ?>
    <br>
      <br><br>
      <br><br>
      <br>
   <p style="text-align: center;"><a href="modificarInfo.php"> Modificar Información</a></p> 
<?php }?>
  </div>