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
				<a href="../index.php/tarifas"><li>Tarifas</li></a>
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
		<h1><?php echo $datos['titulo']; ?></h1>
		<article class="centro">

			<h2>ALQUILER DE AUTOCARAVANAS EN GRANADA</h2>
			<br><br>
			<h3><span>Te damos la posibilidad de viajar en familia con tu autocaravana ¡Estamos en Granada!</span></h3><br><br>

				<p><span>Autocaravanas <strong>AUTOCASA</strong></span> te ofrece una flota de autocaravanas en alquiler para que elijas la que mejor
				se adapta a tus necesidades según el número de personas que vayan a viajar, y el espacio que necesitarás.<br><br><br>

				<span>¿Por qué alquilar tu autocaravana?</span> <br><br><br>

				Si estás cansado de las típicas vacaciones, eres una persona inquieta, quieres disfrutar de un viaje inolvidable con tu familia,
				estás jubilado y quieres hacer lo que siempre soñaste y un largo etcetera de motivos te damos para alquilar una autocaravana en nuestra
				empresa de Granada.<br><br><br>

				Podrás visitar numerosas ciudades y lugares en muy poco tiempo gracias a la flexibilidad y comodidad que te ofrece viajar en autocaravana.<br><br><br>


				<span>¿Por qué elegir Autocaravanas <strong>AUTOCASA</strong> para el alquiler de autocaravanas en Granada?</span><br><br><br>

				Hay varias razones por las cuales creemos sinceramente que Autocaravanas <strong>AUTOCASA</strong> es la mejor opción para el alquiler
				de autocaravanas, vamos con ellas:<br><br><br>

				<strong>Variedad,</strong> contamos con un buen número de autocaravanas de diferentes modelos y características, pero todas de
				grandes marcas como Fiat o Citroen, con todas las comodidades posibles.<br>
				<strong>Precio,</strong> sabemos que buscas la mejor relación calidad precio del mercado, y nosotros nos hemos empeñado en que no
				busques más después de encontrarnos. Tenemos muy buenos precios en alquiler de autocaravanas, ofertas en temporadas
				bajas, etc.. En precio somos diferenciales.<br>
				<strong>Satisfacción,</strong> nuestros clientes siempre quedan satisfechos, y destacan el trato que les brindamos y la calidad de las
				autocaravanas. En Google Mybusiness contamos con numerosas opiniones de clientes que describen a la perfección nuestro
				servicio.
				<strong>Autocaravanas semi-nuevas,</strong> cambiamos nuestras autocaravanas cada dos años, por lo tanto, siempre tendrás la garantía de
				alquilar una autocaravana que parecerá que la estás estrenando, y con muy poco kilometraje a pesar de los largos viajes que hacen nuestros clientes.<br>


				<span>¿Quieres conocer nuestra flota?</span> visita nuestra <a href="../index.php/galeria"><strong>GALERIA</strong></a> y ver <a href="../index.php/tarifas"><strong>TARIFAS</strong></a>.
			</p>
		</article>

	</section>
	<footer>
	<p>© Copyright - 2020 Autocaravanas | Grupo Miguel Hurtado</p>
	</footer>
</body>

</html>