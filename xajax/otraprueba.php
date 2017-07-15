<?php

function procesaForm($form_values)
{
$respuestaXajax = new xajaxResponse();

$nombre = $form_values['nombre'];
$apellidos = $form_values['apellidos'];
$direccion = $form_values['direccion'];

$cadena = "Hola $nombre $apellidos <br/> tu direccion es $direccion";

$respuestaXajax->assign("formDiv","innerHTML", $cadena);
return $respuestaXajax;
}

require_once ("xajax_core/xajax.inc.php");

$xajax = new xajax();
$xajax->register(XAJAX_FUNCTION, "procesaForm");

$xajax->processRequest();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<title>Sin título 2</title>
<?php $xajax->printJavascript("xajax/"); ?>
</head>

<body>

<div id="formDiv">
<form method="post" action="javascript:void(null)" id="formUsuario">
<div>Nombre:</div><div><input type="text" name="nombre" /></div>
<div>Apellidos:</div><div><input type="text" name="apellidos" /></div>
<div>Direccion:</div><div><input type="text" name="direccion" /></div>
<div><input id="enviar" type="submit" value="Enviar" onclick = "xajax_procesaForm(xajax.getFormValues('formUsuario'));"/>
</div>
</form>
</div>

</body>
</html>