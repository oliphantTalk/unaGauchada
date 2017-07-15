<?php

include "../funciones/funciones.php";
$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
$tbl_name = "usuario";
 
$form_pass = $_POST['password'];
$form_pass2 = $_POST['password2'];
 if ($form_pass != $form_pass2) {
 	echo "<br />". "Los password no coinciden" . "<br />";
 	echo "<a href='../registrarse.php'>Volver</a>";
 }
 else {

 $hash = password_hash($form_pass, PASSWORD_BCRYPT); 

 $buscarUsuario = "SELECT * FROM $tbl_name WHERE mail = '$_POST[mail]' ";

 $result = consultar_db($conexion, $buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "Usuario Existente" . "<br />";
 header('Location: registro_false.php');
 }
 else{

 $query = "INSERT INTO $tbl_name (nombre, apellido, fecha_nac, telefono, mail, password, codPostal)
           VALUES ('$_POST[nombre]', '$_POST[apellido]', '$_POST[cumpleanios]', '$_POST[telefono]', '$_POST[mail]', '$hash', '$_POST[codPostal]')";

 if ($conexion->query($query) === TRUE) {
 
  header('Location: registro_true.php');
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 
}
 mysqli_close($conexion);
}
?>