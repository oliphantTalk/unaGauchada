
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

	Include("header.php");
	Include("funciones/funciones.php");
	$datosPublicacion = datosPublicacion(0); #si se le pasa 0 devuelve de cualquier usuario. 
  session_start();
?>

     <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-12 center-block form_wrapper">
        <br>
  			<p> Un lugar donde tus favores encontraran un alma caritativa <br> Haz favores y gana puntos, seguro que tienes una habilidad o un objeto que puedes ofrecer a los demás usuarios </p>
  		</div>
	</div>
	</div>
	<br>
	<br>
	
    <?php 
      foreach ($datosPublicacion as $elem) { 
        if(isset($_SESSION['loggedin'])){
          $urlFavor = "favor.php?idPublicacion=" . $elem->idPublicacion;
        }
        else{
          $urlFavor = "login.php";
        }?>
      
      </div>
      </div>
      <div class="container">
         <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
            <div class="row">
            <div class="col-md-10">
            <h3><strong><p class="title_favor"><?php echo $elem->titulo?></p></strong></h3><a class="links" href="verUsuario.php?idUsuario=<?php echo $_SESSION['idUsuario']?>"><strong></strong><?php echo $_SESSION['username']?></strong></a> ha pedido el siguiente favor. <b>Fecha publicacion: </b><?php echo $elem->fechaInicio;?> <b>El favor caduca el dia: </b><?php echo $elem->fechaFin;?></div>
            </div>
            </div>
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
              <div class="col-md-11"><h5><b>Categoria: </b><span class="text-info"><?php echo nombreCategoria($elem->idCategoria)?></span></div>
              <a class="" href=<?php echo $urlFavor;?>><span class="glyphicon glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Ver más</a>
            </div>

          </div>
        
        </div>
      </div>
    

  
      <?php } ?>
  

</body>
</html>
ESTOY PROBANDO
<!-- 
