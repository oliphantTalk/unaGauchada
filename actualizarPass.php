<?php
session_start();
if(isset($_SESSION['loggedin'])){
    Include('funciones/funciones.php');

    $passNuevo = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $idUsuario = $_SESSION['idUsuario'];
    $conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
    $query = "UPDATE usuario SET password = '$passNuevo' WHERE idUsuario = '$idUsuario'";
    consultar_db($conexion, $query);

}

?>