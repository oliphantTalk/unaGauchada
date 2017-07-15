<!DOCTYPE html>
<html>
<head>
    <title>unaGauchada</title>

    <script src="js/jquery-3.2.1.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js-->
    <script src="js/box_Login.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset = "utf-8">
    <script src="js/jquery-3.2.1.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js-->
    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/box_Login.css" rel="stylesheet" media="screen">
    <link href="main.css" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">


</head>
<body>

<?php
session_start();
Include("funciones/funciones.php");
if(isset($_SESSION['admin'])){
    if ($_SESSION['admin'] == 0) {
        Include("header_connected_user.php");
    }
    else {
        Include("header_connected_admin.php");
    }
} else{
    Include("header.php");
}

$idUsuario= $_SESSION['idUsuario'];
$datosPublicacion = datosPublicacion($idUsuario); #si se le pasa 0 devuelve de cualquier usuario.


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 center-block form_wrapper">
            <br>

            <p> MIS FAVORES </p>
<?php            if(empty($datosPublicacion)){ ?>
            <p>No has publicado ningun favor aún</p>

       <?php     } else{ ?>
        </div>
    </div>
</div>
<br>
<br>

<?php
foreach ($datosPublicacion as $elem) {

if(isset($_SESSION['loggedin'])){
    $urlFavor = "favor.php?idPublicacion=" . $elem->idPublicacion;
    $urlEditar = "modificarFavor.php?idPublicacion=" . $elem->idPublicacion;
    $urlDesp= "despublicar.php?idPublicacion=" . $elem->idPublicacion;
}
else{
    $urlFavor = "login.php";
}

$dateFin = date_create($elem->fechaFin);
$dateInicio = date_create($elem->fechaInicio);
$formatFin = date_format($dateFin, 'd-m-Y');
$formatInicio = date_format($dateInicio, 'd-m-Y');

?>

</div>
</div>
<div class="container">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading"><h3><strong><p class="title_favor"><?php echo $elem->titulo?></p></strong></h3><p><?php echo nombreUsuario($elem->idUsuario);?> ha pedido el siguiente favor el <?php echo $formatInicio;?> </br><b>El favor caduca el dia: </b><?php echo $formatFin;?></p></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4 left-block">
                        <figure>
                            <img src="<?php echo $elem->imagen?>" class="figure-img img-fluid rounded" alt="Image not found"  style="width:100%" onerror="this.onerror=null;this.src='img/icon_gauchada.png'; this.style='width:30%'"" />
                        </figure>
                    </div>
                    <div class="col-md-8">
                        <div class="desc_favor"><h4><?php echo $elem->descripcion?></h4></div>

                    </div>
                </div>
                <div class="panel-footer">
                    <div class="col-md-8"><h5><b>Categoria: </b><span class="text-info"><?php echo nombreCategoria($elem->idCategoria)?></span>
                    </div>

                    <div class="" style="text-align: left;">
                       <a class="" href=<?php echo $urlFavor;?>><span class="glyphicon glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Ver más</a>
                       &nbsp;
                       <a class="" href=<?php echo $urlEditar;?>><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                       &nbsp;
                       <a class="" href=<?php echo $urlDesp;?>><span class="glyphicon glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span> Despublicar</a>
                   </div>

                 
                </div>
                
            </div>

        </div>
    </div>



    <?php } } ?>


</body>
</html>

<!--



-->