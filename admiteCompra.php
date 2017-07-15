<?php 
session_start();
if(isset($_SESSION['email'])){
	$_SESSION['puedeComprar'] = true;
}
$_SESSION['cantidadCreditoComprada'] = $_POST['cant'];
header('Location: confirmaCompra.php');
?>