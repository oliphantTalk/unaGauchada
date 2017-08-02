<?php 
session_start();
Include("funciones/funciones.php");
$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
$idPublicacion = $_POST['idPublicacion'];
$idGaucho= $_POST['idUsuario'];
$calificacion= $_POST['calificacion'];
$comentario=$_POST['comentario'];
if ($calificacion=='1'){
	$consulta= "UPDATE usuario SET puntaje=(puntaje+1), credito=(credito+1)  WHERE idUsuario = '$idGaucho'";

}elseif ($calificacion=='3') {
	$consulta= "UPDATE usuario SET puntaje=(puntaje-2) WHERE idUsuario = '$idGaucho'";
}
$consultaCalificacion= "UPDATE publicacion SET idCalificacion= '$calificacion', ComentarioCalif='$comentario'  WHERE idPublicacion= '$idPublicacion'";
consultar_db($conexion,$consulta);
consultar_db($conexion,$consultaCalificacion);
?>