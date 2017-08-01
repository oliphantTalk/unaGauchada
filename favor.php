<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title>unaGauchada</title>
    
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset = "utf-8">
   
    <script src="js/jquery-3.2.1.min.js"></script> <!-- Importante llamar antes a jQuery para que funcione bootstrap.min.js-->
   <script src="js/bootstrap.min.js"></script>
	 <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

	 <link href="main.css?nocache=" rel="stylesheet" media="screen">
	 <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <script type="text/javascript">
        // this is the id of the form
        $(function () {
        $("#form_comentar").on('submit', function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var url = "actualizarComentario.php?idPublicacion=<?php echo $_GET['idPublicacion']?>"; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#form_comentar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    location.reload(); // show response from the php script.
                }
            });
        });


        });
     </script>
    <script>
        $(function () {
            $("#form_respuesta").on('submit', function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url ="actualizarRespuesta.php"; // the script where you handle the form input.
//"actualizarRespuesta.php?idComentario=
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_respuesta").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                         location.reload(); // show response from the php script.
                    }
                });


            });
        });

        </script>
    <script>
        $(document).ready(function(){
            $("#comentarioPostu").on('click', function(e) {
                e.preventDefault();


                var respuesta = ($('#respuesta').val());
                var idP = ($('#idP').val());
                var idU = ($('#idU').val());
                
                var data = {'respuesta': respuesta, 'idP': idP, 'idU': idU};
                $.ajax({
                    url: 'actualizarPostulacion.php',
                    type: 'POST',

                    data: data,
                    cache: false,
                    dataType: 'html',
                    success: function(data){
                    
                    },
                    error: function(){
                        alert("malllll");
                    }
                });
            });
        });



    </script>


</head>
<body>

<?php
  Include("funciones/funciones.php"); 
	
  $idPublicacion = $_GET['idPublicacion'];
  $conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
  $publicacion = consultar_db_columnas($conexion, "SELECT * FROM publicacion WHERE idPublicacion = '$idPublicacion'");
  $date = date_create($publicacion['fechaFin']);
  $dateFin = date_format($date, 'Y-m-d');
  $idCiudad= $publicacion['idCiudad'];
  $localidad = consultar_db_columnas($conexion, "SELECT * FROM localidad WHERE idCiudad = '$idCiudad'"); 
  $comentarios= comentarios($idPublicacion);
  $datosPublicante = datosUsuario($publicacion['idUsuario']);
  $postulante=postulanteEncontrado($publicacion['idPublicacion'], $_SESSION['idUsuario']);

  Include("header_connected_user.php");
?>


<div class="container-fluid">
	<BR>
	<BR>
	<div class="col-md-5">	
  	<img style="width: 100%; border-radius: 5px;" src="<?php echo $publicacion['imagen']?>" onerror="this.onerror=null;this.src='img/icon_gauchada.png'; this.style='width:30%'">
  	</div>
  	<div class="col-md-7 ">
        <div class="lead info"><p><?php echo $datosPublicante['nombre']?> ha publicado:</p></div>
  		<div class="form_wrapper">

  			<p><?php echo $publicacion['titulo']?></p>
  		</div>
  		<br>
  		<br>
  		<div class="desc_favor">
      <p> Categoría <br> <?php echo nombreCategoria($publicacion['idCategoria'])?> </p>
      <br>
      <br>
   		<p> Descripción del favor <br><?php echo $publicacion['descripcion']?> </p>
   		<br>
   		<br>
      <p>Localidad<br><?php echo $localidad['nombre'] ?></p>
      <br>
      <br>
   		<p>Fecha de Caducación <br><?php echo $dateFin?></p>
   		<br>
   		<br>
   		<div class="form-group">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <?php if ($publicacion['idUsuario'] == $_SESSION['idUsuario']){
                        if ($publicacion['idCalificacion'] = 0) {
                          # code...
                ?>
                         

                              <form action="calificarFavor.php" method="POST"> 
                                <input type="text" id="comentario" name="comentario" placeholder="Explica el porque de tu calificacion... ">
                                <input type="hidden" name="idPublicacion" value="<?php echo $idPublicacion ?>">
                                <input type="hidden" name="idUsuario" value="<?php echo $publicacion['idGaucho'] ?>">
                                <select name="calificacion" id="calificacion"> 
                                    <option value="1">Bien</option> 
                                    <option value="2">Neutro</option>
                                    <option value="3">Mal</option> </select>
                                <button type="submit" name="calificarFavor" id="calificarFavor" tabindex="4" class="form-control btn btn-responder btn-xs "  value="Calificar">Calificar</button>
                              </form>
                              <?php } ?>
              <br>
                                <a href="misFavores.php"><input type="submit" name="submit" id="submit" tabindex="4" class="form-control btn btn-responder" value="Ver mis favores"></a>
                <?php } 
                    elseif($publicacion['idGaucho'] == 0 && empty($postulante)) { ?>
                  <form id="form_postularme" name="form_postularme">

                      <div class="form-group ">
              
                          <input type="hidden" id="idP" name="idP" value="<?php echo $idPublicacion;?>">
                          <input type="hidden" id="idU" name="idU" value="<?php echo $_SESSION['idUsuario'];?>">
                          <input type="text"  class="form-control" id="respuesta" name="respuesta" rows="2" placeholder="Escribe por qué quieres postularte en este favor..." required></textarea>
                          <p>    </p>
                          <button type="button" name="comentarioPostu" id="comentarioPostu" tabindex="4" class="form-control btn btn-responder btn-sm "  value="Postularse">Postularse</button>
                      </div>
                  </form>
              <?php }  ?>
            </div>
          </div>
        </div>
     	</div>
    </div>
     <div class="col-md-12">
     	<br>
     	 <div class="form_wrapper" style="text-align: left; border-top: 1px solid #101010; border-bottom: 1px solid #101010;">
  			<p>Deja tu comentario!</p>
  		</div>
  		<div class="table-responsive">
		<table class="table table-hover">
      <tr>
        <td><b>Comentario</b></td>
        <td><b>Respuesta</b></td>
      </tr>
      <?php 
      foreach($comentarios as $elem){

      ?>     
			<tr>
		    <td><?php echo nombreUsuario($elem->idUsuario).' ha comentado: ' . $elem->texto ?> </td>
                <?php if($publicacion['idUsuario'] == $_SESSION['idUsuario'] && empty(respuesta($elem->idComentario)['texto'])){?>
                <td>  <div class="row">
                        <form id="form_respuesta" name="form_respuesta">

                        <div class="form-group col-sm-4">
                            <input type="hidden" id="idComent" name="idComent" value=<?php echo $elem->idComentario;?>>

                        <textarea  class="form-control" id="respuesta" name="respuesta" rows="3" placeholder="Escribe  tu respuesta..." required></textarea>
                        <p>    </p>
                            <input type="submit" name="submit" id="submit" tabindex="4" class="form-control btn btn-responder btn-xs "  value="Responder">
                        </div>
                        </form>
                      </div>
                </td>
                <?php

                }
                elseif(!empty(respuesta($elem->idComentario)['texto'])) {
                ?>
		    <td><?php 

        
        echo $datosPublicante['nombre'] . ' ha respondido: ' . respuesta($elem->idComentario)['texto']; ?></td>
                <?php } else{ ?>
                    <td></td>
		 	</tr>
		 	<?php };
      } ?>
		</table>
	</div>
         <?php if ($_SESSION['idUsuario'] != $publicacion['idUsuario']){
     ?>
		<form id="form_comentar" name="form_comentar">

			<div class="form-group">
                <textarea  class="form-control" id="comentario" name="comentario" rows="3" placeholder="Escribe tu comentario..." required></textarea>
                <!--<input type="text" class="form-control" id="comentario" name="comentario" rows="3" placeholder="Escribe tu comentario...">-->
                <br>
                <div class="row">
                <div class="col-sm-2 col-sm-offset-5">
              
                <input type="submit" name="submit" id="submit" tabindex="4" class="form-control btn btn-responder" value="Comentar">


            </div>

          </div>
        </div>
		</form>
    <? } ?>
     </div>
  	</div>