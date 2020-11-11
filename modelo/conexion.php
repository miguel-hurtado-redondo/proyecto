<?php
// //localhost:
$serverName = "localhost";
$userName = "root";
$password = "a";
$dataBase = "proyecto";

//migue.byethost5.com/
// $serverName = "sql308.byethost5.com";
// $userName = "b5_24775313";
// $password = "peligros";
// $dataBase = "b5_24775313_proyecto";

	//Establecemos conexión con la base de datos
	$mysqli = @new mysqli($serverName, $userName, $password, $dataBase);
	
	//Si la conexión es correcta, accedemos
	if (!$mysqli->connect_error){
		
		$mysqli->set_charset("utf8");
		//Conexión establecida
		
	} else {
		//Si no es correcta, nos aparece un error
		echo "Error de conexión: " . $mysqli->connect_error;
	}
?>
