<?php 
	include "funciones/funciones.php";
	
	
	$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
	
	
	$res = datosPublicacion(0);

	foreach ($res as $elem) {
		foreach ($elem as $key => $value) {
			# code...
		
		echo $key . " " . $value . " ";}
		echo "<br>";
		# code...
	}

	

?>