   <?php
        if (!isset($_GET['pagina'])){ $pag=1;}
        else { $pag = $_GET['pagina'];}
        $aux_pag=$pag;
        $empiezo= (($aux_pag-1) * 10);
        $link=conectar();
        $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
        $date=date("Y-m-d");
        $sel="SELECT * FROM publicacion WHERE fechaHora >= '$date'";

        if (isset($_GET['buscar'])) {
          $favor=$_GET['publicacion'];
          $cat=$_GET['cat'];
          if ($cat=='Todas las categorias'){
          $sel.=" AND nombre LIKE '%$favor%'"; //concatena
          }
          else {
          $sel.= " AND nombre LIKE '%$favor%' AND idCategoriaProducto=$cat"; //selecciona los que tienen ese nombre y esa categoria
            
          }

        $result= mysqli_query($link,$sel);
        $resultado = mysqli_query($link,$sel." LIMIT $empiezo, 10");
        $total_registros = mysqli_num_rows($result);
        $total_paginas = ceil($total_registros / 10);
		    if($total_registros==0){ 
          $_SESSION['no_resultados']='mal';?> <!-- para que no haga el head de la tabla y tmp el numde pag-->
          <br>
          <br>
          <br>
          <?php if($favor=="" ||  $favor == null){ ?>
                <?php if($cat != 'Todas las categorias'){ 
                    $result = mysqli_query($link, "SELECT * FROM  categorias_productos WHERE idCategoriaProducto=$cat");
                    $fila = mysqli_fetch_array($result);
                    ?>
                    <div class="alert alert-danger alert-dismissable negative">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong class="nota">Nota:</strong><span class="inside_nota"> La categoria "<?php echo $fila['nombre']?>" no posee productos publicados.</span>
                    </span>
                    </div>
                <?php } ?>
          <?php }else{ ?> <!-- product tiene un valor -->
              <div class="alert alert-danger alert-dismissable negative">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong class="nota">Nota:</strong><span class="inside_nota"> No se encontraron productos acordes a "<?php echo $product?>".</span>
              </span>
              </div>
          <?php } ?>
          <br>
          <br>
          <br>
          <a class="col-md-6 col-md-offset-3 link" href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i>  BACK</a>
          <br>
          <br>
          <br>
          <br>
      <?php } ?>

  <div  <?php if(isset($_SESSION['email'])) { ?>class="row col-md-10 col-md-offset-1"<?php }else{?>class="row col-md-8 col-md-offset-2" <?php } ?>>
  <table class="table table-hover table-responsive">
    <?php if(!isset($_SESSION['no_resultados'])) { ?>
    <tbody>
      <?php    //MUESTRA LAS PUBLICACIONES DE LOS FAVORES DESDE LA BD
        Include("hacerTr.php");    
    	  while ($fila = mysqli_fetch_array($resultado)){
    		  mostrarDatos($fila);
    	  }
        mysqli_free_result($resultado);
	      mysqli_close($link);
          ?> 
    </tbody>
  </table>









<!-- ESTO IRIA EN EL BUSCADOR PARA QUE LAS CATEGORIAS SE MUESTREN DESDE LA BASE DE DATOS -->

<?php
  Include("conexion.php");
  $link=conectar();
  $categorias=mysqli_query($link, "SELECT * FROM categorias_productos");
  Include ("hacerOption.php");
  if(isset($_GET['cat']))
     $idC=$_GET['cat'];
  else 
    $idC=null;
     
  while ($filaCat = mysqli_fetch_array($categorias)){
  mostrarCat($filaCat, $idC);
  }
  mysqli_close($link);
  ?>