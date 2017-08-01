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
Include("header_connected_admin.php");



?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 center-block form_wrapper">
            <br>
            <p>Ganancias<br> Ingrese el rango de fechas en el cual desea ver el listado de ganancias
            </p>
        </div>

    </div>

    <br>


    <br>
    <div style="text-align: center;">

        <form class="form-inline" action="verGanancias.php" method="post">
            <div class="form-group">
                <label for="exampleInputName2">Desde</label>
                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" placeholder="Fecha de inicio..">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail2">Hasta</label>
                <input type="date" class="form-control" id="fechaFin" name="fechaFin" placeholder="Fecha de fin..">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        </form>

    </div>


</div>
