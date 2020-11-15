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
			<input class="botonesHome" type="button" value="Cerrar sesión" name="Logout" onclick="location.href='../destruirSesion.php'"/>
	
	</div>
	<section class="galeriabox">
	<h1><?php echo $datos['titulo']; ?></h1>
		<h2 class="galeria">Ford 294TL</h2>
		<br><br>
		<div class="columnasGaleria">
			<img  class="fotoGaleria" src="../imagenes/autocaravana_294/composicion-caravana-kronos-294-tl.jpg" alt="Modelo y Distribucion" width="120%"><br><br>
			<p>
				<h3>INTERIOR</h3><br>
				<span>matrimonio trasera:</span> 2160 x 1350 (1118)<br>
				<span>abatible:</span> 1900 x 1160 (950)<br>
				<span>Calefacción:</span> Truma C 6Kw<br>
				<span>Cocina:</span> 3 fuegos<br>
				<span>Calentador agua:</span> SI<br>
				<span>Frigorifico trivalente:</span> 140l.<br>
				<span>Enchufes 220v:</span> 1<br>
				<span>Enchufes 12v:</span> 2<br>
				<span>Enchufes USB:</span> 2<br>
				<span>Asientos cabina giratorios:</span> SI<br><br>
				<h3>EQUIPAMIENTO</h3><br>
				<span>Ropa de cama:</span> 4<br>
				<span>Trapos de cocina:</span> 2<br>
				<span>Sartenes:</span> 2<br>
				<span>Cazuelas:</span> 2<br>
				<span>Platos:</span> 8<br>
				<span>Vasos:</span> 4<br>
				<span>Cubiertos:</span> 4<br>
				<span>Cuchillos de cocina:</span> 2<br>
				<span>Tabla de cortar:</span> 1<br>
				<span>Líquido inodoro:</span> SI<br>
				<span>Manguera llenado de agua:</span> SI<br>
				<span>Manguera eléctrica:</span> SI<br>
				<span>TV con entrada USB y HDMI:</span> SI<br>
				<h3>CHASIS</h3><br>
				<span>Aire acondicionado:</span> SI<br>
				<span>Ordenador de bordo:</span> SI<br>
				<span>Radio CD con USB:</span> SI<br>
				<span>Chasis:</span> Especial autocaravana<br>
				<span>Retrovisores eléctricos:</span> SI<br>
				<span>Cruise control:</span> SI<br>
				<span>Sensores de aparcamiento traseros:</span> SI<br>
				<h3>DIMENSIONES Y PESO</h3><br>
				<span>Largo:</span> 6,41<br>
				<span>Ancho:</span> 2,35<br>
				<span>Alto:</span> 2,95<br>
				<span>PMMA:</span> 3500<br>
				<h3>DEPÓSITOS</h3><br>
				<span>Agua potable:</span> 110l.<br>
				<span>Aguas grises:</span> 100l.<br>
				<span>WC:</span> 20l.<br>
			</p>
		</div>
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

		<h2 class="galeria">Fiat 279M</h2>
		<br><br>
		<div class="columnasGaleria">
			<img class="fotoGaleria" src="../imagenes/autocaravana_279_fiat/composicion-caravana-kronos-279m-fiat.jpg" alt="Modelo y Distribucion" width="120%"><br><br>
			<p>
				<h3>INTERIOR</h3>

				<span>Cama trasera alta:</span> 2160 x 1300<br>
				<span>Cama trasera baja:</span> 2100 x 1100<br>
				<span>Cama capuchina:</span> 2090 x 1600<br>
				<span>Cama comedor:</span> 1860 x 1100<br>
				<span>Calefacción:</span> Truma C 6Kw<br>
				<span>Cocina:</span> 3 fuegos<br>
				<span>Calentador agua:</span> SI<br>
				<span>Frigorifico trivalente:</span> 167l.<br>
				<span>Enchufes 220v:</span> 3<br>
				<span>Enchufes 12v:</span> 2<br>
				<span>Enchufes USB:</span> 2<br><br>
				<h3>EQUIPAMIENTO</h3><br>
				<span>Ropa de cama:</span> 6<br>
				<span>Trapos de cocina:</span> 2<br>
				<span>Sartenes:</span> 3<br>
				<span>Cazuelas:</span> 3<br>
				<span>Platos:</span> 12<br>
				<span>Vasos:</span> 6<br>
				<span>Cubiertos:</span> 6<br>
				<span>Cuchillos de cocina:</span> 2<br>
				<span>Tabla de cortar:</span> 1<br>
				<span>Líquido inodoro:</span> SI<br>
				<span>Manguera llenado de agua:</span> SI<br>
				<span>Manguera eléctrica:</span> SI<br>
				<span>TV con entrada USB y HDMI:</span> SI<br>
				<h3>CHASIS</h3><br>
				<span>Aire acondicionado:</span> SI<br>
				<span>Ordenador de bordo:</span> SI<br>
				<span>Radio CD con USB:</span> SI<br>
				<span>Chasis:</span> Especial autocaravana<br>
				<span>Retrovisores eléctricos y calefactados:</span> SI<br>
				<span>Cruise control:</span> SI<br>
				<span>Sensores de aparcamiento traseros:</span> SI<br>
				<h3>DIMENSIONES Y PESO</h3><br>
				<span>Largo:</span> 6,99<br>
				<span>Ancho:</span> 2,35<br>
				<span>Alto:</span> 3,20<br>
				<span>PMMA:</span> 3500<br>
				<h3>DEPÓSITOS</h3><br>
				<span>Agua potable:</span> 120l.<br>
				<span>Aguas grises:</span> 100l.<br>
				<span>WC:</span> 20l.<br>


			</p>
		</div>
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
	
	<?php } else {
			echo "<script>alert('REGISTRATE O INICIA SESIÓN');</script>" ?>
		<section id="mensage">
			<h1> NECESITAS ESTAR REGISTRADO PARA PODER VISUALIZAR LA GALERIA.
			POR FAVOR, REGISTRESE O INICIE SESIÓN.
			</h1>
		</section>
	<?php } ?>
	
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

	<footer>
	<p>© Copyright - 2020 Autocaravanas | Grupo Miguel Hurtado</p>
	</footer>

</body>

</html>