

<?php

	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "pepa";
	$db_name = "unagauchada";
	
	function conectar_db($host_db, $user_db, $pass_db, $db_name)
	{
		$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
		if ($conexion->connect_error) {
 			die("La conexion falló: " . $conexion->connect_error);
		}
		return $conexion;
	}

	function consultar_db($conexion, $sql)
	{
		$consulta = $conexion->query($sql);
		return $consulta;
	}

	function consultar_db_columnas($conexion, $sql)//primer resultado de la consulta, todos los datos en un array
	{		$consulta = consultar_db($conexion, $sql);
		return ($consulta->fetch_array(MYSQLI_ASSOC));
	
	}


	function consultar_db_todas_columnas($conexion, $sql)
	//te devuelve toda la consulta,array de objetos
	{	$consulta = consultar_db($conexion, $sql);
		$array = [];
		while ($row = mysqli_fetch_object($consulta)) {
    		array_push($array, $row);
		}
		return ($array);
	
	}	

	function datosPublicacion ($idUsuario)
	{	
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		if($idUsuario == 0){
			$res = consultar_db_todas_columnas($conexion, "SELECT * FROM publicacion ORDER BY fechaInicio DESC" );	
		}
		else{
		$res = consultar_db_todas_columnas($conexion, "SELECT * FROM publicacion WHERE idUsuario = '$idUsuario' ORDER BY fechaInicio DESC");
		}
		return $res;

	}

	function publicacionesValidas($idUsuario){
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		if($idUsuario == 0){
			$res = consultar_db_todas_columnas($conexion, "SELECT * FROM publicacion WHERE fechaFin >= CURRENT_TIMESTAMP AND estado <> 3 ORDER BY fechaInicio DESC" );	
		}
		else{
		$res = consultar_db_todas_columnas($conexion, "SELECT * FROM publicacion WHERE idUsuario = '$idUsuario' AND estado <> 3 ORDER BY fechaInicio DESC");
		}
		return $res;
	}


	function postulantes($idPublicacion)
	{
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_todas_columnas($conexion, "SELECT * FROM postulacion WHERE idPublicacion = '$idPublicacion' ORDER BY fecha DESC");
		return $res;
	}

	function postulacionesSoyGaucho($idUsuario)
	{
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_todas_columnas($conexion, "SELECT * FROM postulacion WHERE idUsuario = '$idUsuario' AND estado = 4");
		return $res;
	}

	function postulanteEncontrado($idPublicacion, $idUsuario)
	{
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT * FROM postulacion WHERE idPublicacion = '$idPublicacion' AND idUsuario = '$idUsuario' ORDER BY fecha DESC");
		return $res;
	}

	function historial($idUsuario)
	{
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_todas_columnas($conexion, "SELECT * FROM publicacion WHERE idGaucho = '$idUsuario' ORDER BY fechaInicio ASC");
		return $res;
	}

	function postulaciones($idUsuario)
	{
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_todas_columnas($conexion, "SELECT * FROM postulacion WHERE idUsuario = '$idUsuario'");
		return $res;
	}

	function calificacion($idCalificacion)
	{
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT * FROM calificacion WHERE idCalificacion = '$idCalificacion'");
		return $res;
	}

	function estado($idEstado)
	{
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT * FROM estadoPostulacion WHERE idEstado = '$idEstado'");
		return $res;
	}

	function datosUsuario ($idUsuario)
	{
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT * FROM usuario WHERE idUsuario = '$idUsuario'" );
		return $res;

	}

	function datosFavor ($idPublicacion)
	{
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT * FROM publicacion WHERE idPublicacion = '$idPublicacion'" );
		return $res;

	}

	function datosCategoria(){
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_todas_columnas($conexion, "SELECT * FROM categoria WHERE baja = 0" );
		return $res;		
	}

	function existeCategoria($nombre){
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT * FROM categoria WHERE baja = 0 AND nombre = '$nombre'" );
		return $res;		
	}

	function datosReputaciones(){
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_todas_columnas($conexion, "SELECT * FROM reputacion" );
		return $res;		
	}

	function categoria($idCategoria){
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT * FROM categoria WHERE idCategoria = $idCategoria" );
		return $res;		
	}


	function reputacion($idReputacion){
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT * FROM reputacion WHERE baja = 0 AND idReputacion = $idReputacion" );
		return $res;		
	}

	function datos_localidad() {
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_todas_columnas($conexion, "SELECT * FROM localidad ORDER BY nombre" );
		return $res;	
	}

	function comentarios($idPublicacion)
	{
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_todas_columnas($conexion, "SELECT * FROM comentario WHERE idPublicacion = '$idPublicacion'" );
		return $res;
	}

	function respuesta($idComentario)
	{
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT * FROM respuestacomentario WHERE idComentario = '$idComentario'" );
		return $res;
	}

	function cantCredito($idUsuario){
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT cantCredito from usuario WHERE idUsuario = '$idUsuario'");
		return $res;
	}

	function precioCredito($cant){
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT * from credito");
		return $cant*$res['valor'];
	}

	function nombreUsuario($idUsuario){
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT * from usuario WHERE idUsuario = '$idUsuario'");
		return $res['nombre'];
	}

	function nombreCategoria($idCategoria)
	{
		$conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
		$res = consultar_db_columnas($conexion, "SELECT * from categoria WHERE idCategoria = '$idCategoria'");
		return $res['nombre'];
	}
?>