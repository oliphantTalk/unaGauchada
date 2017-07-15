<?php
session_start();
Include("funciones/funciones.php");
$conexion = conectar_db ("localhost", "root", "pepa", "unagauchada");
$idGaucho= $_POST['idGaucho'];
$idPublicacion= $_POST['idPublicacion'];
$consulta1=" UPDATE postulacion SET estado = '4' WHERE idPublicacion = '$idPublicacion' AND idUsuario='$idGaucho'";
$consulta=" UPDATE publicacion SET idGaucho = '$idGaucho', estado = '1' WHERE idPublicacion = '$idPublicacion'";
consultar_db($conexion, $consulta); 
consultar_db($conexion,$consulta1);
$datosUsuario = datosUsuario($idGaucho);

?>



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
  
  Include("header_connected_user.php");
 
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 center-block form_wrapper">
            <br>
            <p> Operacion Exitosa </p>
            <br>
            <a href="main.php" class="link"> Volver </a>
            <br>
            <br> 
            <p> Datos para la comunicación</p>
            <br>
            <p>Mail gaucho: <?php echo $datosUsuario['mail']?> </p>
            <br>
            <p>	Teléfono Gaucho: <?php echo $datosUsuario['telefono']?></p>
        </div>

    </div>

</div>




</body>
      </html>