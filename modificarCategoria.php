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
session_start();
$idCategoria=$_POST['idCategoria'];
Include("funciones/funciones.php");
Include("header_connected_admin.php");
$categoria = categoria($idCategoria);

?>
<div class="container-fluid">
<div class="row">
	<div class="col-md-12 center-block form_wrapper">
    <br>
		<p> Modificar categoria <br>
   </p> 

	</div>
  
</div>

  


        <br>
        <br>          
        </div>


        <div class="form-group">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
               <td style="width: 50px;">
                <form action= "actualizarCategoria.php" method="post">
                 <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" maxlength="32" value="<?php echo $categoria['nombre']?>" placeholder="<?php echo $categoria['nombre']?>">
                <br>
                <br>
                <input type="hidden" id="idCategoria" name="idCategoria" value="<?php echo $idCategoria?>">
                
                 <input type="submit" name="submit" id="submit" tabindex="4" class="form-control btn btn-responder btn-xs " style="" value="Modificar"></td> <!-- el boton habia quedado más lindo, no sé qué pasó-->
                </form>
                    
              <!--<input type="submit" name="submit" id="submit" tabindex="4" class="form-control btn btn-login" value="Publicar">-->
            </div>
          </div>
        </div>
        
     

        </div>
    </div>
    
  </div>
	<br>
	<br>

  </form>
  <div class="messages"></div>
  </div>
  </div>
  </div>
</body>
</html>
