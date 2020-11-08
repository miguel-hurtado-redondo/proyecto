<style>
		@import url("../estilo/css.css");
</style>
<?php

/**
* 
* Funcion que va a cargar todos los libros al home
* @author Miguel Hurtado
* @var string
*/
function controlador_index(){
	$datos = array("titulo"=>"AUTOCASA");
	include 'vistas/cabecera.php';
	include 'vistas/home.php';
	
}

/**
* 
* Función para el registro de usuarios
* @author Miguel Hurtado
* @var string
* 
*/
function controlador_registro(){
	
	//Array con el titulo de la pagina
	$datos = ["titulo"=>"Página de registro de usuarios"];
	
	//Comprobamos si registro se ha pulsado, si es asi recogemos los datos del formulario
	if(isset($_POST['registro'])){
	
		$usuario = $_POST["usuario"];
		$nombre = $_POST["nombre"];
		$apellidos = $_POST["apellidos"];
		$email = $_POST["email"];
		$contrasena = $_POST["contrasena"];
		
		//Si el usuario no esta vacio comprobamos si este existe con la funcion existeUsuario.
		if($usuario != ""){
			if(!existeUsuario($usuario)){
				
				//Ciframos la contraseña y la metemos en el array y metemos el rol en 0 por defecto, para que cualquier usuario que se registre no pueda ser admin
				$contrasenaCifrada = password_hash($contrasena, PASSWORD_BCRYPT);
				$datos_usuario = array("usuario" => "$usuario", "nombre" => "$nombre", "apellidos" => "$apellidos", "email" => "$email", "contrasena" => "$contrasenaCifrada", "rol" => 0);
			
				//Llamamos a la función registrar_usuario que recibirá el array creado.
				if(registrar_usuario($datos_usuario)){
					//Nos aparecerá un alert informando de que todo ha sido correcto.
					echo "<script>alert('Registro de usuario completado correctamente');</script>"; 
				};

			} else {
				// Si el usuario existe, mostramos un mensaje indicandolo.
				echo "<script>alert('El usuario ya existe en BD');</script>"; 
			}
		} else { //Este else no saldrá debido a que el campo usuario es obligatorio, pero lo dejamos para controlar el error en caso de que existiese.
			echo "<script>alert('El usuario es obligatorio');</script>"; 
		}
	}
	
	//Incluimos vistas/registro.php donde esta el  formulario para registrarse.
	include 'vistas/registro.php';

}

/**
* 
* Función para logearse
* @author Miguel Hurtado
* @var string
* 
*/
function controlador_login(){

$datos = ["titulo"=>"Página de login"];
	
	//comprobamos login que se haya mandado
	if(isset($_POST['login'])){
		
		$usuario = $_POST["usuario"];

		//Comprobamos si existe usuario
		if(existeUsuario($usuario)){
			$contrasena = $_POST["contrasena"];
			if(compruebaUsuario($usuario, $contrasena)){ //si todo es correcto iniciamos y creamos session
				session_start();
				$_SESSION['usuario'] = $usuario;
				$_SESSION['rol'] = cargarRol($usuario);
				header("location: ../index.php");
			
			} else { //Si no coincide, se mostrará un error.
				echo "<script>alert('Error en la autentificacion del la cuenta');</script>"; 
			}
		} else { //Si no existe el usuario, se mostrará un error.
			echo "<script>alert('No existe el usuario');</script>"; 
		}
	}
	
	//Incluimos vistas/login.php donde esta el formulario para logearse.
	include 'vistas/login.php';
}

/**
* 
* Función para administrar los usuarios que se le mostrará solo al administrador
* @author Miguel Hurtado
* @var string
* 
*/
function controlador_admin_usuarios(){

//Iniciamos o restauramos sesion.
session_start(); 

$datos = ["titulo"=>"Página de administración de usuarios"];

	//comprobamos que la sesion rol se haya mandando.
	if(isset($_SESSION["rol"])){
		// Si es rol administrador 1 (admin), mostramos todos usuarios
		if($_SESSION["rol"] = 1){
			$usuarios = cargarUsuarios();
			include 'vistas/admin_usuarios.php';
		} else { //En caso de ser un usuario no administrador 0 (Usuario), se indicará un error.
			echo "<script>alert('No puedes acceder, no eres administrador.');</script>"; 
		}
	} else { //En caso de que el rol no se haya mandado, se mostrara un error.
		echo "<script>alert('No puedes acceder, no has iniciado sesión');</script>"; 
	}
}

/**
* 
* Creamos una nueva función controlador_registro_admin() 
* @author Miguel Hurtado
* @var string
* 
*/
function controlador_registro_admin(){
	
	//Aqui vamos a recoger lo que viene por POST lo descomponemos , ciframos la contraseña si hace falta y volvemos a crear una array con los datos modificados, para luego poder meterla en la bd desde la funcion del modelo mas facilmente.
	if(isset($_POST["actualizarEnBD"])){
		$id = $_POST["id"];
		$usuarioActualizado = $_POST["usuario"];
		$nombreActualizado = $_POST["nombre"];
		$apellidosActualizado = $_POST["apellidos"];
		$emailActualizado = $_POST["email"];
		$contrasena = $_POST["contrasenaActual"];
		$contraNuevaActualizado = $_POST["contraNueva"];
		if(isset($_POST["rol"])){
			$rolActualizado = 1;
		} else {
			$rolActualizado = 0;
		}
		
		//Si se ha introducido una nueva contraseña la ciframos.
		if($contraNuevaActualizado != ""){
			$contrasenaCifrada = password_hash($contraNuevaActualizado, PASSWORD_BCRYPT);
		} else {
			$contrasenaCifrada = $contrasena;
		}
		
		//Creamos el array que pasaremos con la información del usuario que se debe quedar en BD
		$datosUserModificado = array("id" => "$id", "usuarioActualizado" => "$usuarioActualizado", "nombreActualizado" => "$nombreActualizado", "apellidosActualizado" => "$apellidosActualizado", "emailActualizado" => "$emailActualizado", "contrasenaCifrada" => "$contrasenaCifrada", "rolActualizado" => "$rolActualizado");

		//Le pasamos el array que acabamos de crear $datosUserModificado a la Función modificarUsuario.
		if(modificarUsuario($datosUserModificado)){
			//Si todo ha ido bien aparece el la confirmacion.
			echo "<h1>La modificacion del usuario se ha realizado correctamente</h1>";
			?>
			
			<input type="submit" name="volverAdminUsuarios" value="Administrar usuarios" onclick="location.href='../index.php/admin_usuarios'"/>
			<?php
		}		
	}
	
	//Guardaremos en variables lo que nos envia datos de usuario actualiza.php
	if(isset($_GET["actualizar"])){
			$id = $_GET["id"];
			$usuario = $_GET["usuario"];
			$nombre = $_GET["nombre"];
			$apellidos = $_GET["apellidos"];
			$email = $_GET["email"];
			$contrasena = $_GET["contrasena"];
			$rol = $_GET["rol"];
			include 'vistas/actualizar.php';

	}
	
	//Guardaremos en variables lo que nos envia eliminar usuario y libro
	if (isset($_GET["eliminar"])){
		$usuario = $_GET["usuario"];
		
		//Si el usuario se ha pulsado se eliminar un usuario
		if(isset($usuario)){
			if(eliminar_usuario($usuario)){
				header("location:../index.php/admin_usuarios");
			}
		} 
	}	
	//Guardaremos en variables lo que nos envia registrar el usuarios desde administracion.
	if(isset($_POST['registroAdmin'])){
		$usuario = $_POST["usuario"];
		$nombre = $_POST["nombre"];
		$apellidos = $_POST["apellidos"];
		$email = $_POST["email"];
		$contrasena = $_POST["contrasena"];
		$rol = $_POST["rol"];

		if($usuario != ""){
			if(!existeUsuario($usuario)){
				
				$contrasenaCifrada = password_hash($contrasena, PASSWORD_BCRYPT);
				$datos_usuario = array("usuario" => "$usuario", "nombre" => "$nombre", "apellidos" => "$apellidos", "email" => "$email", "contrasena" => "$contrasenaCifrada", "rol" => "$rol");
				
				if(registrar_usuario($datos_usuario)){
					echo "<h1>Usuario registrado correctamente</h1>";
				};
			} else {
				echo "<h1>El usuario $usuario ya existe en BD</h1>";
			}
		} else { 
			echo "<h1>El usuario es obligatorio</h1>";
		}
		?>
				<input type="submit" name="volverAdminUsuarios" value="Administrar usuarios" onclick="location.href='../index.php/admin_usuarios'"/>
			<?php
	}
}



/**
* creamos una funcion controlador_galeria para controlarlas.
* @author Miguel Hurtado
*/
function controlador_galeria(){
	$datos = array("titulo"=>"GALERIA");
	include 'vistas/galeria.php';
}

/**
* creamos una funcion controlador_quienSomos para controlarlas.
* @author Miguel Hurtado
*/
function controlador_quienSomos(){
	$datos = array("titulo"=>"QUIEN SOMOS");
	include 'vistas/quienSomos.php';
}

/**
* creamos una funcion controlador_contacto para controlarlas.
* @author Miguel Hurtado
*/
function controlador_contacto(){
	$datos = array("titulo"=>"CONTACTO");
	include 'vistas/contacto.php';
}
/**
* creamos una funcion controlador_tarifas para controlarlas.
* @author Miguel Hurtado
*/
function controlador_tarifas(){
	$datos = array("titulo"=>"TARIFAS");
	include 'vistas/tarifas.php';
}

?>