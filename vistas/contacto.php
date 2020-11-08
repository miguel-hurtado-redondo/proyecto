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

		<img id="logo" src="../imagenes/logo.png">
		<nav>
			<ul>
				<a href="../index.php"><li>Home</li></a>
				<a href="../index.php/galeria"><li>Galeria</li></a>
				<a href="../index.php/quienSomos"><li>Quien somos</li></a>
				<a href="../index.php/dondeEstamos"><li>Donde estamos</li></a>
				<a href="../index.php/ideas"><li>Ideas</li></a>
				<a href="../index.php/contacto"><li>Contacto</li></a>
			</ul>
		</nav>

	</header>
	<div class="botonesHom">
		<?php
		//Si existe sesión y o el rol es 1 (Admin), mostramos los botones de administrar
		if (isset($_SESSION["usuario"]) && (($_SESSION["rol"] == "Admin") || ($_SESSION["rol"] == 1))) {
		?>
		<?php } elseif (!isset($_SESSION["usuario"])) { ?>

			<input class="botonesHome" type="button" value="Registro" name="registro" onclick="location.href='../index.php/registro'" />
			<input class="botonesHome" type="button" value="Iniciar sesión" name="login" onclick="location.href='../index.php/login'" />

		<?php } ?>
		<!--Boton para cerrar sesion.-->
		<?php if (isset($_SESSION["usuario"])) { ?>
			<input class="botonesHome" type="button" value="Cerrar sesión" name="Logout" onclick="location.href='../destruirSesion.php'" />
		<?php } ?>
	</div>
	<section class="principal">
        <article class="contacto">
            <h1><?php echo $datos['titulo']; ?></h1>
            <article class="izquierda">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1588.3245368535652!2d-3.632552476546317!3d37.23230477594924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fd855d905c95%3A0xe8cbe7eb1df0a0!2sCalle%20Veleta%2C%2019%2C%2018210%20Peligros%2C%20Granada!5e0!3m2!1ses!2ses!4v1604787886514!5m2!1ses!2ses" width="200%" height="65%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </article>  
            <article class="derecha">
                <div>
                    <h3>Información sobre la tienda</h3><br><br>
                    <p><img class="iconos" src="../imagenes/world-location.png">  AUTOCARAVANAS AUTOCASA, C/ Veleta nº24 18210 - Peligros (Granada)</p><br>
                    <p><img class="iconos" src="../imagenes/phone-ringing.png">  Llámenos ahora: 655 136 708</p><br>
                    <p><img class="iconos" src="../imagenes/mail-send.png"> <a href="mailto:autocasa@gmail.com?Subject=Interesado%20en%20informacion"> Contacta pinchando aqui.<br> Email: Autocasa@gmail.com </a> </p><br>
                    <p><img class="iconos" src="../imagenes/chronometer.png">  Horario de atención al cliente: De lunes a Viernes de 9:00 a 14:00 - 16:00 a 20:00.</p><br>
                </div>
            </article>
        </article>
	</section>
	<footer>

	</footer>
</body>

</html>