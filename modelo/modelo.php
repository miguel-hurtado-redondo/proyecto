<?php


/**
* Funcion para comprobar si existe el usuario bd
* @author Miguel Hurtado
* @return true si existe usuario y false si no existe
*/
function existeUsuario($usuario){
	//Conexión a la base de datos
	include 'modelo/conexion.php';

	//Consulta para tener los datos de la tabla usuarios,
	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
	
	if ($resultado = $mysqli->query($sql)){
		
		$totalFila = mysqli_num_rows($mysqli->query($sql));
		
		//Comprobamos y si no hay ningun resultado(no existe el usuario) retornamos false.
		if ($totalFila == 0){
			//cerramos consulta y conexion
			$resultado->free();
			$mysqli->close();
			return false;
		} else {//en caso de que haya algun resultado viene por el else y retornamos true.
			//cerramos consulta y conexion
			$resultado->free();
			$mysqli->close();
			return true;
		}
	}	else {
        //Error en la consulta
        echo "Algo ha salido mal consultando la base de datos, Error: " . $mysqli->error;
		//Cerramos la conexión
        $mysqli->close();
    }
}

/**
* Funcion para el login comprobamos que el usuario corresponde a su contraseña
* @return true si corresponde, en caso contrario false.
* @author Miguel Hurtado
*/
function compruebaUsuario($usuario, $contrasena){
	//Conexión a la base de datos
	include 'modelo/conexion.php';
	//comprobamos si existe el usuario
	if (existeUsuario($usuario)){
		//consultamos la contraseña del usuario
		$sql = "SELECT contraseña FROM usuarios WHERE usuario = '$usuario'";

		if ($resultado = $mysqli->query($sql)){
			$fila = $resultado->fetch_array();
			$contraBD = $fila["contraseña"];
				
			//utilizamos password_verify para comprobamos que la contraseñas son la misma.
			if(password_verify($contrasena,$contraBD)){
				//cerramos consulta y conexion
				$resultado->free();
				$mysqli->close();
				return true;//si es la misma retornamos true
			} else {
				//cerramos consulta y conexion
				$resultado->free();
				$mysqli->close();
				return false; //si no es la misma retornamos false
			}
		} else {
			//Cerramos la conexión
			$mysqli->close();
			return false;
		}
	} else { //si no existe retornamos false tambien
		return false;
	}
}	

/**
* Función para que nos muestre todos los usuarios
* @author Miguel Hurtado
* @return array $usuarios
*/
function cargarUsuarios(){
	//Conexión a la base de datos
	include 'modelo/conexion.php';
	//Consulta con todos los datos de usuarios
	$sql = "SELECT * FROM usuarios";

	if ($resultado = $mysqli->query($sql)){

		while($fila = $resultado->fetch_array()){
			$usuarios[] = array("id" => $fila["id"], "usuario" => $fila["usuario"], "nombre" => $fila["nombre"], "apellidos" => $fila["apellidos"], "email" => $fila["email"], "contrasena" => $fila["contraseña"], "rol" => $fila["rol"]);			
		}
		//cerramos consulta y conexion
        $resultado->free();
        $mysqli->close();
        return $usuarios; 
	} else {
        //Error en la consulta
        echo "Algo ha salido mal consultando la base de datos, Error: " . $mysqli->error;
		//Cerramos la conexion
        $mysqli->close();
    }
}

/**
* Función cargar rol comprobamos si es admin o usuario
* @author Miguel Hurtado
* @return Admin 
*/
function cargarRol($usuario){
	//Conexión a la base de datos
	include 'modelo/conexion.php';

	//Consulta el rol del usuario
	$sql = "SELECT rol FROM usuarios WHERE usuario = '$usuario'";

	if ($resultado = $mysqli->query($sql)){
		$fila = $resultado->fetch_array();
		$rol = $fila["rol"];
		
		//Si el rol es igual a 1 es administrador, en caso que no sea igual a 1 es usuario
		if ($rol == 1){
			//cerramos consulta y conexion
			$resultado->free(); 
			$mysqli->close();
			return "Admin";	
		} else {
			//cerramos consulta y conexion
			$resultado->free();
			$mysqli->close();
			return "Usuario";
		}
	} else {
		//Error en la consulta
		echo "Algo ha salido mal consultando la base de datos, Error: " . $mysqli->error;
		$mysqli->close();
	}
}


/**
* Función regristrar nuevos usuarios
* @author Miguel Hurtado
* @return true si se registra el usuario y false si no se registra
*/
function registrar_usuario($datos_usuario){
	//Conexión a la base de datos
	include 'modelo/conexion.php';	

	//obtenemos informacion y las guardamos en variables.
	$usuario = $datos_usuario["usuario"];
	$nombre = $datos_usuario["nombre"];
	$apellidos = $datos_usuario["apellidos"];
	$email = $datos_usuario["email"];
	$contrasena = $datos_usuario["contrasena"];
	$rol = $datos_usuario["rol"];
		
	//insertamos en la tabla usuario todos los datos obtenidos.
	$sqlInsert = "INSERT INTO usuarios (usuario, nombre, apellidos, email, contraseña, rol) VALUES ('$usuario', '$nombre', '$apellidos', '$email', '$contrasena', '$rol')";

	if ($mysqli->query($sqlInsert)){ 
		$mysqli->close();
		return true; // si todo ha ido bien returnamos true
	} else {
		//Devuelve true
		return false; // si algo ha salido mal retornamos false.
	}
}

/**
* Función para modificar a los usuarios
* @author Miguel Hurtado
* @return true si se modifica el usuario y false si no se modifica
*/
function modificarUsuario($datosUserModificado){
	
	//obtenemos informacion y las guardamos en variables.
	$id = $datosUserModificado["id"];
	$usuarioActualizado = $datosUserModificado["usuarioActualizado"];
	$nombreActualizado = $datosUserModificado["nombreActualizado"];
	$apellidosActualizado = $datosUserModificado["apellidosActualizado"];
	$emailActualizado = $datosUserModificado["emailActualizado"];
	$contrasenaCifrada = $datosUserModificado["contrasenaCifrada"];
	$rolActualizado = $datosUserModificado["rolActualizado"];
	
	//Conexión a la base de datos
	include 'modelo/conexion.php';	
	//Actualizamos a un usuario 
	$sqlUpdate = "UPDATE usuarios SET usuario = '$usuarioActualizado', nombre = '$nombreActualizado', apellidos = '$apellidosActualizado', email = '$emailActualizado', contraseña = '$contrasenaCifrada', rol = '$rolActualizado' WHERE id = $id";
	
	if ($mysqli->query($sqlUpdate)){
		$mysqli->close();
		return true; 
	} else {
		return false; //si algo ha salido mal return false
	}
}

/**
* Función para borrar usuarios
* @author Miguel Hurtado
* @return true si se elimina correctamente y false si no se elimina
*/
function eliminar_usuario($usuario){
	//Conexión a la base de datos
	include 'modelo/conexion.php';	

	//Consulta para borrar usuarios 
	$sqlDelete = "DELETE FROM usuarios WHERE usuario = '$usuario'";
	
	//Si se elimina correctamente, entra
	if ($mysqli->query($sqlDelete)){
		$mysqli->close();
		return true;
	} else {
		return false;
	}
}

?>