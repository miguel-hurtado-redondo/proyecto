<?php
session_start();  //Se inicia o restaura sesión

//Si hay sesion y se pulsa logout cerramos sesion.
// if(isset($_POST["Logout"])){
	session_destroy();
	$_SESSION=array();
	header("location: index.php");
// }
?>