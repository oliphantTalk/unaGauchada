<!DOCTYPE html>
<html>
<head>
	<title>unaGauchada</title>
    <script src="../js/jquery-3.2.1.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js-->
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset = "utf-8">
   <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	 <link href="../css/box_Login.css" rel="stylesheet" media="screen">
	 <link href="../main.css" rel="stylesheet" media="screen">
	 <link href="../fonts/fuenteUbuntu.woff2" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

</head>
<body>

<?php
  
  Include("../header.php");

?>


<?php

if (session_status() == 1) 
{

echo "<div class='container-fluid'><div class='row'><div class='col-md-12 center-block form_wrapper'><br><p>Usuario creado exitosamente. Bienvenido/a</p><p><a href='../login.php'><span style='color:blue'>Iniciar sesion</span></a></p></div></div></div>";
}
elseif (session_status() == 2)
  {
    echo "<div class='container-fluid'><div class='row'><div class='col-md-12 center-block form_wrapper'><br><p>Ya has iniciado sesion. </div></div></div>";   
  } 

?>

  
</body>
</html>