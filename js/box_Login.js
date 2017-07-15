$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

function validar_clave() {
var caract_invalido = " ";
var caract_longitud = 10;
var p1 = document.getElementById("password").value;
var p2 = document.getElementById("password2").value;
if (p1 == '' || p2 == '') {
alert('Debes introducir tu clave en los dos campos.');
return false;
}
if (p1.length < caract_longitud) {
alert('Tu clave debe constar de ' + caract_longitud + ' caracteres.');
return false;
}
if (p1.indexOf(caract_invalido) > -1) {
alert("Las claves no pueden contener espacios");
return false;
}
else {
if (p1 != p2) {
alert ("Las claves introducidas no son iguales");
return false;
}
else {
alert('Contraeña correcta');
return true;
      }
   }
}
