<?php
  session_start();
  if(isset($_SESSION['loggedin'])){
   if($_SESSION['formularioNuevo']){ 
    #quitamos un credito
    Include "funciones/funciones.php";
  $conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
  $idUsuario = $_SESSION['idUsuario'];

  $mail = $_SESSION['email'];

  $imagen_subida = NULL;
  if(!empty($_FILES['archivo']['name'])){
    $dir_destino = 'img/img_publicacion/';
    $imagen_subida = $dir_destino . basename($_FILES['archivo']['name']);
  }
  $nom_loc= $_POST['loc'];
  $idCiudad = consultar_db_columnas($conexion, "SELECT * FROM localidad WHERE nombre = '$nom_loc' LIMIT 1");
  $idCiudad = $idCiudad['idCiudad'];
  $descripcion = $_POST['descripcion'];  
  $titulo = $_POST['titulo'];
  $vencimiento = $_POST['vencimiento'];

  $consulta1 = "UPDATE usuario SET cantCredito = (cantCredito - 1) WHERE mail = '$mail'";
  $consulta2 = "INSERT INTO publicacion (idPublicacion, idUsuario, descripcion, fechaInicio, fechaFin, estado, titulo, imagen, idCategoria, idCiudad) VALUES (NULL, '$idUsuario', '$descripcion', CURRENT_TIMESTAMP, '$vencimiento', '0', '$titulo', '$imagen_subida', '1', '$idCiudad')";
  consultar_db($conexion, $consulta1);
  consultar_db($conexion, $consulta2);
  $_SESSION['formularioNuevo'] = false;
  }
  else{
    header('Location: index.php');
  }
?>


<?php
  
  $datosPublicacion = datosPublicacion($idUsuario);

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
            <a href="index.php" class="link"> Volver </a>
        </div>

    </div>

</div>




</body>
      </html>


  <?php }
  else {
      header('Location: index.php');
  }
?>
