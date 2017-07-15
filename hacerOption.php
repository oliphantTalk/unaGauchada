<?php 
	function mostrarCat ($resultados, $id) {
		if ($id == $resultados['idCategoria']) {
			$sel="selected";
		}else{
			$sel="";
		}
		    ?>
		    <option name="cat" value="<?php echo $resultados['idCategoria'] ?>" <?php echo $sel ?> > <?php echo $resultados['nombre'] ?> </option>
				
		<?php 
	  
	}
 ?>