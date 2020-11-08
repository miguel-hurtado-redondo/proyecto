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
        <article class="tarifa">
            <h1><?php echo $datos['titulo']; ?></h1>
            <article class="tarifaIzquierda">

            <div class="tarifas">
                <ul>
                    <li class="tarifaVertical">Tipo</li>
                    <li class="tarifaVertical">Minimo</li>
                    <li class="tarifaVertical">Precio/Dia</li>
                </ul>
            </div>
            <div class="tarifas">
                <ul>
                    <li class="tarifaHorizontal">Reducida</li>
                    <li class="tarifaTabla">3 dias</li>
                    <li class="tarifaTabla">105€</li>
                </ul>
            </div>
            <div class="tarifas">
                <ul>
                    <li class="tarifaHorizontal">Baja</li>
                    <li class="tarifaTabla">3 dias</li>
                    <li class="tarifaTabla">125€</li>
                </ul>
            </div>
            <div class="tarifas">
                <ul>
                    <li class="tarifaHorizontal">Media</li>
                    <li class="tarifaTabla">7 dias</li>
                    <li class="tarifaTabla">140€</li>
                </ul>
            </div>
            <div class="tarifas">
                <ul>
                    <li class="tarifaHorizontal">Alta</li>
                    <li class="tarifaTabla">7 dias</li>
                    <li class="tarifaTabla">150€</li>
                </ul>
            </div>
            </article>  
            <article class="tarifaDerecha">
               <p>
               
               <strong>* Precios con IVA y equipamiento incluido<br>
               * Para más de 10 días consultar precio</strong>

    <h3 class="tarifaTemporadas">Temporada reducida</h3>

    De lunes a jueves laborables (Excepto temporada baja,media y alta)
    <h3 class="tarifaTemporadas">Temporada Baja</h3>

    Navidad, primera quincena de Junio, segunda de Septiembre y fin de semana (Excepto temporada alta y media)
    <h3 class="tarifaTemporadas">Temporada media</h3>

    Segunda quincena Junio, primera quincena Septiembre y puentes
    <h3 class="tarifaTemporadas">Temporada alta</h3>

    Julio, Agosto y Semana Santa.

               </p>
            </article>
        </article>
	</section>
	<footer>

	</footer>
</body>

</html>