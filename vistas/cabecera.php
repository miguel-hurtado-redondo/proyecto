<?php
session_start(); ?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title><?php echo $datos['titulo']; ?></title>
	<link rel="shortcut icon" type="image / x-icon" href="/proyecto/favicon.ico">
	<style>
		@import url("estilo/css.css");
	</style>

</head>

<body>
	<header>
		
        <img id="logo" src="./imagenes/logo.png">
        <nav>
            <ul>
				<a href="./index.php"><li>Home</li></a>
				<a href="./index.php/galeria"><li>Galeria</li></a>
				<a href="./index.php/quienSomos"><li>Quien somos</li></a>
				<a href="./index.php/tarifa"><li>Tarifas</li></a>
				<a href="./index.php/ideas"><li>Ideas</li></a>
				<a href="./index.php/contacto"><li>Contacto</li></a>
            </ul>
        </nav>
		
	</header>
	<div class="botonesHom">
		<?php
		//Si existe sesión y o el rol es 1 (Admin), mostramos los botones de administrar
		if (isset($_SESSION["usuario"]) && (($_SESSION["rol"] == "Admin") || ($_SESSION["rol"] == 1))) {
		?>
			<input class="botonesHome" type="button" value="Administrar usuarios" name="adminUser" onclick="location.href='index.php/admin_usuarios'" />
			<!-- <input class="botonesHome" type="button" value="Administrar libros" name="adminLib" onclick="location.href='index.php/admin_libros'"/> -->

		<?php } elseif (!isset($_SESSION["usuario"])) { ?>
			
				<input class="botonesHome" type="button" value="Registro" name="registro" onclick="location.href='index.php/registro'" />
				<input class="botonesHome" type="button" value="Iniciar sesión" name="login" onclick="location.href='index.php/login'" />
			
			<?php } ?>
		<!--Boton para cerrar sesion.-->
		<?php if (isset($_SESSION["usuario"])) { ?>
			<input class="botonesHome" type="button" value="Cerrar sesión" name="Logout" onclick="location.href='destruirSesion.php'" />
		<?php } ?>
    </div>
</body>
</html>
