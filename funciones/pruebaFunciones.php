<?php

include "funciones.php";

$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
$columnas = consultar_db_columnas($conexion, "SELECT * FROM usuario");
echo $columnas['password'];


?>