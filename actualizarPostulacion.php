<?php
session_start();
    Include('funciones/funciones.php');

    $respuesta = $_POST['respuesta'];
    $idPublicacion = $_POST['idP'];
    $idUsuario = $_POST['idU'];
    $conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
    $query = "INSERT INTO postulacion (idPostulacion, idUsuario, idPublicacion, estado, fecha, hora, comentario) VALUES (NULL, '$idUsuario', '$idPublicacion', '0', CURRENT_TIMESTAMP , CURRENT_TIMESTAMP , '$respuesta')";

    consultar_db($conexion, $query);

    echo ($respuesta . $idUsuario . $idPublicacion);

?>