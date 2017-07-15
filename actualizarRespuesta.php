<?php
session_start();
if(isset($_SESSION['loggedin'])){
    Include('funciones/funciones.php');

    $respuesta = $_POST['respuesta'];
    $idComentario = $_POST['idComent'];
    $idUsuario = $_SESSION['idUsuario'];
    $conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
    $query = "INSERT INTO respuestacomentario (idRespuesta, idComentario, texto, fecha) VALUES (NULL, '$idComentario', '$respuesta', CURRENT_TIMESTAMP)";

    consultar_db($conexion, $query);

}

?>