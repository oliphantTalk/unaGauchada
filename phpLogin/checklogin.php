<?php
session_start();
$host_db = "localhost";
$user_db = "root";
$pass_db = "pepa";
$db_name = "unagauchada";
$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$mail = $_POST['mail'];
$password = $_POST['password'];
 
$sql = "SELECT * FROM $tbl_name WHERE mail = '$mail'";


$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 if (password_verify($password, $row['password']) || $password == $row['password'] ) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['idUsuario'] = $row['idUsuario'];
    $_SESSION['codPostal'] = $row['codPostal'];
    $_SESSION['username'] = $row['nombre'];
    $_SESSION['cumpleanios'] = $row['fecha_nac'];
    $_SESSION['telefono'] = $row['telefono'];
    $_SESSION['email'] = $row['mail'];
    $_SESSION['admin'] = $row['esAdmin'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
    $_SESSION['puedeComprar'] = false;
   
   /*header('Location: ../infoSesion.php');*/
  header('Location: ../index.php');

 } else { 
   echo "Usuario o Contraseña incorrectos.";
   echo "<br><a href='../login.php'>Volver a Intentarlo</a>";
 }
 mysqli_close($conexion); 

 ?>

 