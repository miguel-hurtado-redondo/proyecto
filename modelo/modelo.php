<?php
/**
* Función que nos carga todos los libros
* @author Miguel Hurtado
* @return array $libros
*/
function cargarLibros(){
	//Conexión a la base de datos
	include 'modelo/conexion.php';

	//Consulta para todos los datos de la tabla Libro
	$sql = "SELECT * FROM libro";
	
	if ($resultado = $mysqli->query($sql)){
		
		while($fila = $resultado->fetch_array()){
			$libros[] = array("id" => $fila["id"], "titulo" => $fila["titulo"], "f_publicacion" => $fila["f_publicacion"], "id_autor" => $fila["id_autor"]);
		}
		//cerramos consulta y conexion
        $resultado->free();
        $mysqli->close();
		return $libros;
		
	} else {
        //error en la consulta
        echo "Algo ha salido mal consultando la base de datos, Error: " . $mysqli->error;
        $mysqli->close();
    }
}

/**
* Función para cargar todos los autores 
* @author Miguel Hurtado
* @return array $autores 
*/
function cargarAutores(){
	//Conexión a la base de datos
	include 'modelo/conexion.php';

	//Consulta para todos los datos de la tabla autores
	$sql = "SELECT * FROM autor";

	if ($resultado = $mysqli->query($sql)){
		
		while($fila = $resultado->fetch_array()){
			$autores[] = array("id" => $fila["id"], "nombre" => $fila["nombre"], "apellidos" => $fila["apellidos"], "nacionalidad" => $fila["nacionalidad"]);
		}
		//cerramos consulta y conexion
        $resultado->free();
        $mysqli->close();
        return $autores; 
		
	} else {
        //error en la consulta
        echo "Algo ha salido mal consultando la base de datos, Error: " . $mysqli->error;
        $mysqli->close();
    }
}

/**
* Función para cargar los libros y su autor
* @author Miguel Hurtado
* @return array $librosAutor
*/
function cargarLibros_autores(){
	//Conexión a la base de datos
	include 'modelo/conexion.php';
		
	//Consulta sql para obtener el id, titulo y fecha publicación del libro y el nombre del autor.
	$sql = "SELECT libro.id, libro.titulo, libro.f_publicacion, autor.nombre FROM libro libro, autor autor WHERE libro.id_autor = autor.id";

	if ($resultado = $mysqli->query($sql)){
		
		while($fila = $resultado->fetch_array()){

			$librosAutor[] = array("id" => $fila["id"], "titulo" => $fila["titulo"], "f_publicacion" => $fila["f_publicacion"], "nombre_autor" => $fila["nombre"]);
		}

		//cerramos consulta y conexion
        $resultado->free();
        $mysqli->close();
		return $librosAutor; 
		
	} else {
        //Error en la consulta
        echo "Algo ha salido mal consultando la base de datos, Error: " . $mysqli->error;
		//Cerramos la conexión
        $mysqli->close();
    }
}

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
* Función para crear libros nuevos
* @author Miguel Hurtado
* @return true si creamos el libro y false si no lo creamos
*/
function crearLibro($datos_libro){
	
	//Conexión a la base de datos
	include 'modelo/conexion.php';

	//obtenemos informacion y las guardamos en variables.
	$titulo = $datos_libro["titulo"];
	$f_publicacion = $datos_libro["f_publicacion"];
	$autor = $datos_libro["autor"];

	
	//Insertamos en una consulta los datos obtenidos.
	$sqlInsert = "INSERT INTO libro(titulo, f_publicacion, id_autor) VALUES ('$titulo', '$f_publicacion', '$autor')";

	if ($mysqli->query($sqlInsert)){
		$mysqli->close();
		return true;
	} else {
        //Error en la consulta
        echo "Algo ha salido mal consultando la base de datos, Error: " . $mysqli->error;
		$mysqli->close();
    }
}

/**
* Función para crear un nuevo autor
* @author Miguel Hurtado
* @return true si creamos el autor y false si no lo creamos.
*/	
function crearAutor($datos_autor){
	include 'modelo/conexion.php';

	//obtenemos informacion y las guardamos en variables.
	$nombre = $datos_autor["nombre"];
	$apellidos = $datos_autor["apellidos"];
	$nacionalidad = $datos_autor["nacionalidad"];

	//Insertamos toda la informacion obtenida en la tabla autor.
	$sqlInsert = "INSERT INTO autor(nombre, apellidos, nacionalidad) VALUES ('$nombre', '$apellidos', '$nacionalidad')";
	
	if ($mysqli->query($sqlInsert)){
		$mysqli->close();
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

/**
* Función para la modificion de los libros
* @author Miguel Hurtado
* @return true si se modifica el libro y false si no se modifica
*/
function modificarLibro($datosLibroModificado){
	
	//Obtenemos informacion y las guardamos en variables.
	$id = $datosLibroModificado["id"];
	$titulo = $datosLibroModificado["titulo"];
	$f_publicacion	= $datosLibroModificado["f_publicacion"];
	$autor = $datosLibroModificado["autor"];

	//Conexión a la base de datos
	include 'modelo/conexion.php';	
	
	//Hacemos un update para meter los nuevos datos en la base de datos. 
	$sqlUpdate = "UPDATE libro SET titulo = '$titulo', f_publicacion = '$f_publicacion', id_autor = '$autor' WHERE id = $id";
	
	if ($mysqli->query($sqlUpdate)){
		$mysqli->close();
		return true;
	} else {
		return false; //si algo ha salido mal return false
	}
}

/**
* Funcion para ver si existe un libro 
* @author Miguel Hurtado
* @return true si existe y false si no existe
*/
function existeLibro($titulo, $autor){
	//Conexión a la base de datos
	include 'modelo/conexion.php';

	//consultamos el libro por su titulo y autor
	$sql = "SELECT * FROM libro WHERE titulo = '$titulo' AND id_autor = '$autor'";
		
	if ($resultado = $mysqli->query($sql)){	
		$totalFila = mysqli_num_rows($mysqli->query($sql));
	
		if ($totalFila == 0){ //si no hay coincidencias, false
			$resultado->free();
			$mysqli->close();
			return false;
		} else { //si hay coincidencias  true
			$resultado->free();
			$mysqli->close();
			return true;
		}
	} else {
		//Error en la consulta
		echo "Algo ha salido mal consultando la base de datos, Error: " . $mysqli->error;
		$mysqli->close();
    }	
} 

/**
* Funcion para eliminar los libros
* @author Miguel Hurtado
* @return true si eliminamos el libro y false si no es eliminado.
*/
function eliminar_libro($idLibro){
	//Conexión a la base de datos
	include 'modelo/conexion.php';	
	
	//Establecemos el juego de caracteres a utf8
	//$mysqli->set_charset("utf8");
	
	//Delete de la tabla libro el libro correspondiente.
	$sqlDelete = "DELETE FROM libro WHERE id = '$idLibro'";
	
	if ($mysqli->query($sqlDelete)){
		$mysqli->close();
		return true;
	} else {
		return false; //si algo ha salido mal return false
	}
}

/**
* Función para modificar los autores.
* @author Miguel Hurtado
* @return true si modificamos el autor ponemos true y si no false.
*/
function modificarAutor($datosAutorModificado){
	
	//Obtenemos informacion y la guardamos en variables.
	$id = $datosAutorModificado["id"];
	$nombre = $datosAutorModificado["nombre"];
	$apellidos	= $datosAutorModificado["apellidos"];
	$nacionalidad = $datosAutorModificado["nacionalidad"];
	//Conexión a la base de datos
	include 'modelo/conexion.php';	
	//Modificamos con update el autor.
	$sqlUpdate = "UPDATE autor SET nombre = '$nombre', apellidos = '$apellidos', nacionalidad = '$nacionalidad' WHERE id = $id";
	
	if ($mysqli->query($sqlUpdate)){
		$mysqli->close();
		return true;
	} else {
		return false;
	}
}

/**
* Función para comprobar si existe un autor en base a su nombre, debería existir un DNI o algún campo 
* @author Miguel Hurtado
* @return true si existe el autor y false si no existe
*/
function existeAutor($nombre){
	//Conexión a la base de datos
	include 'modelo/conexion.php';
	//Consultamos el nombre del autor en la tabla
	$sql = "SELECT * FROM autor WHERE nombre = '$nombre'";

		if ($resultado = $mysqli->query($sql)){	
			$totalFila = mysqli_num_rows($mysqli->query($sql));
			if ($totalFila == 0){
				$resultado->free();
				$mysqli->close();
				return false;
			} else {
				$resultado->free();
				$mysqli->close();
				return true;
			}
		} else {
        //Error en la consulta
        echo "Algo ha salido mal consultando la base de datos, Error: " . $mysqli->error;
        $mysqli->close();
    }	
} 

/**
* Función para eliminar un autor por id
* @author Miguel Hurtado
* @return true si se ha eliminado correctamente, si no false.
*/
function eliminar_autor($idAutor){
	//Conexión a la base de datos
	include 'modelo/conexion.php';	
	//delete a la tabla para borrar el autor que queramos.
	$sqlDelete = "DELETE FROM autor WHERE id = '$idAutor'";
	
	if ($mysqli->query($sqlDelete)){
		$mysqli->close();
		return true; 
	} else {
		return false; //False si algo ha salido mal.
	}
}
?>