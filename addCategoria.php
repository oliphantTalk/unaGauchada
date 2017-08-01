<?php
session_start();
Include("funciones/funciones.php");
$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
$nombre = $_POST['nombre'];
$existeCategoria=existeCategoria($nombre);
if (empty ($existeCategoria)){
$consulta = "INSERT INTO categoria (nombre) VALUES ('$nombre')";

consultar_db($conexion, $consulta);
header("Location: listarCategorias.php");
}
else{?>
	<div style="text-align: center;">

	<p> La categoría que intenta agregar ya existe <p>
	  <form action= "agregarCategoria.php" method="post">
            <input type="submit" name="submit" id="submit" tabindex="4" class=" btn-xs " style="" value="Volver"></td>
           </form>
		
	</div>
	
	
<?php }




?>
