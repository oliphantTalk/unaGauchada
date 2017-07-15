<?php
    session_start();
if(isset($_SESSION['loggedin'])){
Include('funciones/funciones.php');

$comentario = $_POST['comentario'];
$idPublicacion = $_GET['idPublicacion'];
$idUsuario = $_SESSION['idUsuario'];
$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
$query = "INSERT INTO comentario (idComentario, idUsuario, fecha, texto, idPublicacion) VALUES (NULL, '$idUsuario',CURRENT_TIMESTAMP, '$comentario', '$idPublicacion')";

consultar_db($conexion, $query);

}

?>