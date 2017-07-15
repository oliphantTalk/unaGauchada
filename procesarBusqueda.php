<?php
    session_start();
    Include("funciones/funciones.php");
    $conexion = conectar_db("localhost", "root", "pepa", "unagauchada");
    $consulta = "SELECT * FROM publicacion WHERE idPublicacion <> 0  ";
if (isset($_POST['selectCategoria']) && $_POST['selectCategoria'] <> 'todasCategorias') {
    $selectCategoria = $_POST['selectCategoria'];
    $_SESSION['busquedaCategoria'] = nombreCategoria($selectCategoria);

    $consulta.=" AND idCategoria = '$selectCategoria'";
}
if (isset($_POST['selectCiudad']) && $_POST['selectCiudad'] <> 'todasCiudades' ) {
    $selectCiudad = $_POST['selectCiudad'];
    $_SESSION['busquedaCiudad'] = nombreCiudad($selectCiudad);
    $consulta.=" AND idCiudad = '$selectCiudad' '";
}
if (isset($_POST['datoCampo']) && $_POST['datoCampo'] <> "" ) {
    $cadenaBusqueda = $_POST['datoCampo'];
    $_SESSION['busquedaTitulo'] = $cadenaBusqueda;
    $consulta.=" AND titulo LIKE '%$cadenaBusqueda%'";
}
    #$consulta = "SELECT * FROM publicacion WHERE $datoSelect LIKE '%$cadenaBusqueda%'";

    $res = consultar_db_todas_columnas($conexion, $consulta);
    $_SESSION['busqueda']=$res;
    print_r($_SESSION['busqueda']);
    #echo json_encode($res);

?>