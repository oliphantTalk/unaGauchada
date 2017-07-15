<?php
session_start();
Include("funciones/funciones.php");
$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
$nombre = $_POST['nombre'];
$idCategoria = $_POST['idCategoria'];
$consulta = "UPDATE categoria SET nombre = '$nombre' WHERE idCategoria = '$idCategoria'";

consultar_db($conexion, $consulta);


?>
