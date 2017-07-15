

<?php /*SOLO ADMIN*/

	session_start();
	if(!($_SESSION['admin'] = 1)){
		echo("Para ingresar a esta pagina debes ser administrador");
	}
	session_destroy();
?>

<?php /*SOLO Iniciada Sesion*/

	session_start();
	if(!isset($_SESSION)){
		echo("Para ingresar a esta pagina debes iniciar sesion");
	}
	session_destroy();
?>