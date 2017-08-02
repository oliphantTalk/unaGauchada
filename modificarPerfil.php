<?php
session_start();
if(isset($_SESSION['loggedin'])){
    Include("funciones/funciones.php");
    $idUsuario = $_SESSION['idUsuario'];
    $nombreNuevo = $_POST['nombre'];
    $_SESSION['username'] = $nombreNuevo;
    $apellidoNuevo = $_POST['apellido'];
    $cumpleaniosNuevo = $_POST['cumpleanios'];
    $telNuevo = $_POST['telefono'];
    $codPostalNuevo = $_POST['codPostal'];
    if(!empty($_FILES['archivo']['name'])){
        $dir_destino = 'img/perfil_usuarios/';
        $imagen_subida = $dir_destino . basename($_FILES['archivo']['name']);
    }


    $conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
    $consulta = "UPDATE usuario SET nombre='$nombreNuevo',apellido='$apellidoNuevo',fecha_nac='$cumpleaniosNuevo',telefono='$telNuevo',fotoPerfil='$imagen_subida',codPostal='$codPostalNuevo' WHERE idUsuario = '$idUsuario'";
    consultar_db($conexion, $consulta);

    }
    else{
        header('Location: main.php');
    }
    ?>


    <?php

    $datosUsuario = datosUsuario($idUsuario);

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
                <a href="miPerfil.php" class="link"> Ver Perfil </a>
            </div>

        </div>

    </div>




    </body>
    </html>


