<?php
session_start(); ?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title><?php echo $datos['titulo']; ?></title>
	<link rel="shortcut icon" type="image / x-icon" href="/proyecto/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0">
	<link rel="stylesheet" href="../estilo/style.css">
	<link rel="stylesheet" href="../estilo/hes-gallery.css">
	<style>
		@import url("../estilo/css.css");
	</style>

</head>

<body>
	<header>
		<h1><?php echo $datos['titulo']; ?></h1>
		<a href="../index.php"><img src="../imagenes/logo.png"></a>
		<h1> GALERIA </h1>
		<?php
		//Si existe sesión y o el rol es 1 (Admin), mostramos los botones de administrar
		if (isset($_SESSION["usuario"]) && (($_SESSION["rol"] == "Admin") || ($_SESSION["rol"] == 1))) {
		?>
			<input class="botonesHome" type="button" value="Administrar usuarios" name="adminUser" onclick="location.href='index.php/admin_usuarios'" />
			<!-- <input class="botonesHome" type="button" value="Administrar libros" name="adminLib" onclick="location.href='index.php/admin_libros'"/> -->

		<?php } elseif (!isset($_SESSION["usuario"])) { ?>

			<input class="botonesHome" type="button" value="Registro" name="registro" onclick="location.href='../index.php/registro'" />
			<input class="botonesHome" type="button" value="Iniciar sesión" name="login" onclick="location.href='../index.php/login'" />
		<?php } ?>
		<!--Boton para cerrar sesion.-->
		<?php if (isset($_SESSION["usuario"])) { ?>
			<form action="../destruirSesion.php" method="POST">
				<input class="botonesHome" type="button" value="Administrar mi usuario" name="adminUser" onclick="location.href='index.php/admin_usuarios'" />
				<input type="submit" name="Logout" value="Cerrar sesión" />
			</form>
	</header>
				<nav>
					<ul>
						<li><a href="../index.php">Home</a></li>

						<li><a href="../pagina.php">Quien somos</a></li>
						<li><a href="../dondeEstamos.php">Donde estamos</a></li>
						<li><a href="../ideas.php">Ideas</a></li>
						<li><a href="../contacto.php">Contacto</a> </li>
					</ul>
				</nav>
				<section>
					<h2>Ford 294TL</h2>
					<br><br>
					<img src="../imagenes/autocaravana_294/composicion-caravana-kronos-294-tl.jpg" alt="Modelo y Distribucion">
					<br><br>
					<div class="hes-gallery">
						<img src="../imagenes/autocaravana_294/20200615_101618-1030x773.jpg" alt="Exterior" data-fullsize="../imagenes/autocaravana_294/20200615_101618-1030x773.jpg" data-subtext='Exterior'>
						<img src="../imagenes/autocaravana_294/20200615_103209-1030x773.jpg" alt="Exterior2" data-subtext="Exterior2">
						<img src="../imagenes/autocaravana_294/20200615_101944-1030x773.jpg" alt="Interior trasera" data-subtext="Interior trasera">
						<img src="../imagenes/autocaravana_294/20200615_102122-1030x773.jpg" alt="Interior delantera" data-subtext="Interior delantera">
						<img src="../imagenes/autocaravana_294/20200615_102647-1030x773.jpg" alt="Comedor" data-subtext="Comedor">
						<img src="../imagenes/autocaravana_294/20200615_102908-1030x773.jpg" alt="Conductor" data-subtext="Conductor">
						<img src="../imagenes/autocaravana_294/Kronos-294TL15.jpg" alt="Cama" data-subtext="Cama">
						<img src="../imagenes/autocaravana_294/Kronos-294TL18.jpg" alt="Cama2" data-subtext="Cama2">
						<img src="../imagenes/autocaravana_294/20200615_101903-773x1030.jpg" alt="Cocina" data-subtext="Cocina">
						<img src="../imagenes/autocaravana_294/20200615_102401-773x1030.jpg" alt="Cocina1" data-subtext="Cocina1">
						<img src="../imagenes/autocaravana_294/20200615_1023380-773x1030.jpg" alt="Baño" data-subtext="Baño">
						<img src="../imagenes/autocaravana_294/20200615_102730-773x1030.jpg" alt="Maletero" data-subtext="Maletero">
						<img src="../imagenes/autocaravana_294/20200615_103106-773x1030.jpg" alt="Puerta de entrada" data-subtext="Puerta de entrada">
					</div>

					<h2>Fiat 279M</h2>
					<br><br>
					<img src="../imagenes/autocaravana_279_fiat/composicion-caravana-kronos-279m-fiat.jpg" alt="Modelo y Distribucion">
					<br><br>
					<div class="hes-gallery" data-wrap="false" data-img-count="false">
						<img src="../imagenes/autocaravana_279_fiat/IMG_20190412_103625_426-773x1030.jpg" alt="Maletero" data-subtext="Maletero" data-alt="Maletero">
						<img src="../imagenes/autocaravana_279_fiat/IMG_20190412_104000_630-773x1030.jpg" alt="Interior Entrada" data-subtext="Interior Entrada">
						<img src="../imagenes/autocaravana_279_fiat/IMG_20190412_104015_831-773x1030.jpg" alt="Cocina" data-subtext="Cocina" data-alt="Cocina">
						<img src="../imagenes/autocaravana_279_fiat/IMG_20190412_105549_531-773x1030.jpg" alt="Comedor" data-subtext="Comedor">
						<img src="../imagenes/autocaravana_279_fiat/Kronos2029020M2018_a900x9001-687x1030.jpg" alt="Baño" data-subtext="Baño">
						<img src="../imagenes/autocaravana_279_fiat/Roller-Team-Kronos-279M18-1079x8091.jpg" alt="Conductor" data-subtext="Conductor">
						<img src="../imagenes/autocaravana_279_fiat/Kronos-279-2.jpg" alt="Exterior" data-subtext="Exterior">
						
					</div>

				</section>
				<script src="../js/hes-gallery.js"></script>
				<script>
					HesGallery.setOptions({
						disableScrolling: false,
						hostedStyles: false,
						animations: true,

						showImageCount: true,
						wrapAround: true
					});
				</script>
				<section>
					<article>

					</article>
					<!-- <article id=derecha>
					<img src="../imagenes/autocaravana_294/composicion-caravana-kronos-294-tl.jpg" alt="Foto de la caravana">
					</article>
					<article>
					<img src="imagenes/autocaravana_294/composicion-caravana-kronos-294-tl.jpg" alt="Foto de la caravana">
					</article> -->

				</section>
				<footer>

				</footer>
				<div>


				</div>

				<br><br>


				<br>
				<br>


</body>

</html>
<?php } else {
			echo "<script>alert('REGISTRATE');</script>" ?>
	<h1> NECESITAS ESTAR REGISTRADO PARA PODER VISUALIZAR LA GALERIA.
		POR FAVOR, REGISTRESE O LOGUESE
	</h1>

<?php } ?>