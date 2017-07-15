<?php
require_once("xajax_core/xajax.inc.php");

$xajax = new xajax();

function alertaRoja($aString) {
	global $xajax;
	
	return $xajax->getGlobalResponse()->alert($aString);
}

function numerito($form){
	global $xajax;
	return $xajax->getGlobalResponse()->assign($form['numerito'], "innerHTML", 3);
}

function procesaForm($form_values)
{
$respuestaXajax = new xajaxResponse();

$pass1 = $form_values['password'];
$pass2 = $form_values['password2'];

if ($pass1 !== $pass2) {
    $cadena = "Las contraseñas deben ser iguales!";    
    $respuestaXajax->assign("formDiv","innerHTML", $cadena);
    
   
}

return $respuestaXajax;
}

$xajax->register(XAJAX_FUNCTION, "alertaRoja");
$xajax->register(XAJAX_FUNCTION, "numerito");
$xajax->register(XAJAX_FUNCTION, "procesaForm");
$xajax->processRequest();
$xajax->configure('javascript URI','');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>
        <title>Hospital</title>
        <?php $xajax->printJavascript( "../" ) ?>
        <!--<?php $xajax->printJavascript( "../" ) ?>-->
    </head>

    <body>
        <h2><a href = "#">Hola</a></h2>

        <h1>Encabezame esta.</h1>

        <p>
        	
            <a href = "#" onclick = 'xajax_alertaRoja("Andate bien a la reputa que lo re mil re pario");return false;'>Esto es lo mio</a>
            <a href = "#" onblur = 'alert("Andate bien a la reputa que lo re mil re fwefpario")'>Esto es lo mio</a>
            
            <div id="myDiv" style="padding: 3px; display: table; border: 10px outset black; font-size: large; margin-bottom: 10px;">Click Me</div>
            
            
			<form method="post" action="javascript:void(null)" id="formularioPrueba"> 
			<input id="password" type="password" name="password"/>
            <input id="password2" type="password" name="password2" onblur="xajax_procesaForm(xajax.getFormValues('formularioPrueba'));"/>
            <div id="formDiv">
            </div>
            </form>
            


    </body>
</html>

