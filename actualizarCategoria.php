<!DOCTYPE html>
<html>
<?php
session_start();
Include("funciones/funciones.php");
$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
$nombre = $_POST['nombre'];
$existeCategoria=existeCategoria($nombre);
$idCategoria = (int)$_POST['idCategoria'];
if (empty ($existeCategoria)){

$consulta = "UPDATE categoria SET nombre = '$nombre' WHERE idCategoria = '$idCategoria'";

consultar_db($conexion, $consulta);
header("Location: listarCategorias.php");

}else{?>
	<div style="text-align: center;">

	<p> La categoría que intenta agregar ya existe <p>
	  <form action= "modificarCategoria.php" method="post">
            <input type="hidden" name="idCategoria" id="idCategoria" value="<?php echo $idCategoria ?>">
            <input type="submit" name="submit" id="submit" tabindex="4" class=" btn-xs " style="" value="Volver"></td>
           </form>
		
	</div>
	
	
<?php }




?>
