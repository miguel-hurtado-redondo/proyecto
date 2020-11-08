<?php
//Controlador frontal index.php

include 'modelo/modelo.php';
include 'controlador/controlador.php';
	
// Recogemos la URI insertada
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/proyecto', $path);
$URI = $segments[count($segments)-1];

if ($URI == '/index.php'){
	//Se ejecuta el controlador de index
	controlador_index();
} elseif ($URI == '/index.php/registro') {
	// Se ejecuta el controlador del registro
	controlador_registro();
} elseif ($URI == '/index.php/login') {
	// Se ejecuta el controlador del login
	controlador_login();
} elseif ($URI == '/index.php/admin_usuarios') {
	// Se ejecuta el controlador de administrar usuarios
	controlador_admin_usuarios();
}elseif ($URI == '/index.php/controlAdmin') {
	// Se ejecuta el controlador registro admin
	controlador_registro_admin();
}elseif ($URI == '/index.php/galeria') {
	// Se ejecuta el controlador galeria
	controlador_galeria();
}elseif ($URI == '/index.php/quienSomos') {
	// Se ejecuta el controlador quienSomos
	controlador_quienSomos();
} elseif ($URI == '/index.php/contacto') {
	// Se ejecuta el controlador contacto
	controlador_contacto();
	
}elseif ($URI == '/index.php/tarifas') {
	// Se ejecuta el controlador tarifas
	controlador_tarifas();
	
}else {
	//Si no esta la $URI se lanza error que no existe.
	header('Status: 404 Not found');
	echo '<h1>La página ' .  $URI . ' no existe</h1>';
}
?>
