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
<script type="text/javascript">
  $(document).ready(function(){
 
    $('#editarFavor').on('click',function(e){
        //información del formulario
        e.preventDefault();
        var nombre = ($("#titulo")).val();
        var idCategoria = ($("#idCategoria")).val();
        idCategoria = parseInt(idCategoria);
        var data = {'nombre': nombre, 'idCategoria': idCategoria};
        $.ajax({
            url: 'actualizarCategoria.php',  
            type: 'POST',
            // Form data
            //datos del formulario
            data: data,
            //necesario para subir archivos via ajax
            cache: false,
            dataType: 'html',
            success: function(data){
              location.href = "misFavores.php";           }
            //si ha ocurrido un error
            
        });//hacemos la petición ajax  
        
    });
});

</script>

</head>
<body>

<?php 
session_start();
$idFavor=$_GET['idPublicacion'];
Include("funciones/funciones.php");
Include("header_connected_user.php");
$postulantes=postulantes($idFavor);
$datosFavor=datosFavor($idFavor);
$datos_localidad=datos_localidad();
$datosCategoria=datosCategoria();

?>
<div class="container-fluid">
<div class="row">
	<div class="col-md-12 center-block form_wrapper">
    <?php if (!empty($postulantes)){?>
      <br>
    <p> El favor posee postulantes, no puede ser modificado! <br>
   </p>
    <?php } else { ?>
    <br>
		<p> Modificar favor <br>
   </p> 

	</div>
  
</div>

      <br>
      <br>

        <div  class="row">
        <div class="col-md-8 col-md-offset-2">
        <form enctype="multipart/form-data" class="modificarFavor" action="" method="post" name="upload_form" >
        <div class=" col-md-10 col-md-offset-1">
                  <input type="hidden" id="idPublicacion" value="<?php echo $idFavor?>">
                  <div class="form-group ">
                    <label for="exampleInputEmail1">Título</label>
                    <input type="text" class="form-control" id= 'titulo' name="titulo" maxlength="32" value="<?php echo $datosFavor['titulo']?>" placeholder='<?php echo $datosFavor['titulo']?>' 
                    >
                  </div>
                  

                  <div class="form-group">
                    <label for="exampleInputPassword1">Descripcion</label>
  
                    <textarea class="form-control" id="descripcion" name="descripcion" value="<?php echo $datosFavor['descripcion']?>" placeholder='' 
                    ><?php echo $datosFavor['descripcion']?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="fechaVencimiento"> Fecha de caducación:</label><br>
                     <input type="date" class="form-control" id="vencimiento" min=<?php echo date('Y-m-d'); ?> name="vencimiento" step="1" value="<?php echo $datosFavor['fechaFin']?>" placeholder='<?php echo $datosFavor['fechaFin']?>' 
                    >
                  </div>

                  <div class="form-group">
                    <label for="categoria"> Categoria</label><br>
                     <select class="form-control" name="cat" id="cat" 
                    >>
                        <?php 
                            foreach ($datosCategoria as $elem){ 
                        ?>     
                          <option> <?php echo $elem->nombre; ?> </option>
                        <?php } ?>
                    </select>
            
    
                     
                  </div>
                  <div class="form-group">
                    <label for="localidad"> Localidad </label><br>
                    <select class="form-control" name="loc" id="loc" 
                    >>
                        <?php 
                            foreach ($datos_localidad as $elem){ 
                        ?>     
                          <option> <?php echo $elem->nombre; ?> </option>
                        <?php } ?>
                    </select>
                 
                     
                  </div>

                  <div class="form-group">
                    <label>Subir imagen que acompañara la publicación (opcional)</label><br />
                    <input name="archivo" class="file" type="file" id="imagen" /><br /><br />
                   <!--<label for="exampleInputFile">Imagen</label>
                    <input type="file" id="exampleInputFile">-->
                  </div>


        <br>
        <br>          
        </div>


        <div class="form-group">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
               <button type="button" id="editarFavor" value="Subir imagen" class="form-control btn btn-login"/>Editar favor</button><br />
                    
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
<?php }?>
  <div class="messages"></div>
  </div>
  </div>
  </div>
</body>
</html>
