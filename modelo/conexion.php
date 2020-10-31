<?php
//localhost:
$serverName = "localhost";
$userName = "root";
$password = "a";
$dataBase = "tgdwes";

/* //migue.byethost5.com/
$servername = "sql308.byethost.com";
$username = "b5_24775313";
$password = "peligros";
$database = "b5_24775313_tgdwes";
*/
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
