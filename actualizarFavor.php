<?php
session_start();
Include("funciones/funciones.php");
$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fechaFin = $_POST['vencimiento'];
$categoria = $_POST['cat'];
$localidad = $_POST['loc'];
$idPublicacion = $_POST['idPublicacion'];

/*$consulta = "UPDATE publicacion SET (descripcion = '$descripcion', fechaFin = '$fechaFin', titulo = '$titulo', idCategoria = '$categoria', idCiudad = '$localidad') WHERE idPublicacion = $idPublicacion";
consultar_db($conexion, $consulta);
*/
$consulta = "UPDATE publicacion SET descripcion = '$descripcion', titulo = '$titulo' WHERE idPublicacion = '$idPublicacion'";

consultar_db($conexion, $consulta);


?>

