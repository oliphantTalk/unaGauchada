<?php 
	function mostrarDatos ($resultados) {
		$link=conectar(); 
		if ($resultados !=NULL) {
		    ?>
		      <tr>  
				<td><img class="img-thumbnail img_table"src="mostrarImagen.php?idPublicacion=<?php echo $resultados['idPublicacion']?>"></td> <!-- MUESTRA LA IMAGEN SEGUN EL ID QUE SE LE MANDE -->

		        <td> <?php echo $resultados['titulo'] ?> </td>

		        <td><?php echo $resultados['descripcion'];  ?></td> 

		       	<td><a class="" href="producto.php?idPublicacion=<?php echo $resultados['idPublicacion']?>"><span class="glyphicon glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Ver más</a></td> <!-- MUESTRA EL FAVOR COMPLETO SEGUN EL ID QUE SE LE MANDE -->
		        
<?php
	}
 ?>




	 
