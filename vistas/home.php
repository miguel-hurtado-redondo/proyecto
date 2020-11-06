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
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php/galeria">Galeria</a> </li>
                <li><a href="pagina.php">Quien somos</a></li>
                <li><a href="dondeEstamos.php">Donde estamos</a></li>
                <li><a href="ideas.php">Ideas</a></li>
                <li><a href="contacto.php">Contacto</a> </li>
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
	<section class="principal">
	    <h1><?php echo $datos['titulo']; ?></h1>
		<article class="frontal">
			<h2>¿Preparado para pasar unas vacaciones inolvidables?</h2>
			<h3>Autocaravanas</h3>
			<p>Una autocaravana es un vehículo automóvil que proporciona los dos medios básicos para viajar: transporte
				y alojamiento. Las autocaravanas poseen motor y se pueden conducir por la vía pública como un vehículo
				convencional.
				Las autocaravanas son el vehículo ideal para viajar en familia o con amigos disfrutando de la naturaleza
				y permitiéndote desplazarte de un lugar a otro con total comodidad y confort.
				Su equipamiento es completo con utensilios básicos incluidos como cubertería, toallas y otro mobiliario
				de exterior.</p>
		</article>
		<article class="izquierda">
			<a href="index.php/galeria"><img src="imagenes/autocaravana_294/composicion-caravana-kronos-294-tl.jpg" alt="Foto de la caravana"></a>
		</article>
		<article class="derecha">
			<a href="index.php/galeria"><img src="imagenes/autocaravana_294/composicion-caravana-kronos-294-tl.jpg" alt="Foto de la caravana"></a>
		</article>

	</section>
	<footer>

	</footer>
</body>

</html>