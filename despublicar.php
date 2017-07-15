<?php
session_start();
if(isset($_SESSION['loggedin'])){
    Include("funciones/funciones.php");
    $idFavor = $_GET['idPublicacion'];
    $idUsuario = $_SESSION['idUsuario'];
    $datosFavor= datosFavor($idFavor);
    $valor_despublicado= 3;
    $conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
    $consulta = "UPDATE publicacion SET estado='$valor_despublicado' WHERE idPublicacion = '$idFavor'";
    $postulantes = postulantes($idFavor);
    if(empty($postulantes)){
        $consulta2= "UPDATE usuario SET cantCredito=(cantCredito + 1) WHERE idUsuario = '$idUsuario'";
        consultar_db($conexion,$consulta2);
    }elseif($datosFavor['idGaucho']=null){
            $consulta3= "UPDATE postulacion SET estado = 4 WHERE idPublicacion='$idPublicacion'  ";
            consultar_db($conexion,$consulta3);
    }else{
        $consulta4= "UPDATE postulacion SET estado = 4  WHERE idPublicacion=$idPublicacion AND idUsuario='$idGaucho'";
        consultar_db($conexion,$consulta4);
    }
    consultar_db($conexion, $consulta);

}
else{
    header('Location: main.php');
}
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
            <?php
            if(empty($postulantes)){ ?>
                <p> Se te ha devuelto el crédito que habias utilizado </p>
            <?php }
            ?>
            <br>
            <a href="main.php" class="link"> Inicio </a>
            <br>

        </div>

    </div>

</div>




</body>
</html>


