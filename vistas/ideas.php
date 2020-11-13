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
                <a href="../index.php">
                    <li>Home</li>
                </a>
                <a href="../index.php/galeria">
                    <li>Galeria</li>
                </a>
                <a href="../index.php/quienSomos">
                    <li>Quien somos</li>
                </a>
                <a href="../index.php/tarifas">
                    <li>Tarifas</li>
                </a>
                <a href="../index.php/ideas">
                    <li>Ideas</li>
                </a>
                <a href="../index.php/contacto">
                    <li>Contacto</li>
                </a>
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
    <article class="principal">

        <h1><?php echo $datos['titulo']; ?></h1>
        <sectiona id=>
            <p>Desde AUTOCASA queremos mostrarte algunas ideas de las que podrás disfrutar.<br><br>
                Ideal para hacer en parejas, en familia, combinar con deportes de aventura y un gran abanico de posibilidades.<br><br>
                A continuacion, te mostramos algunas ideas.<br><br>
                <h3>¡¡¡Animate!!! Te esperan miles de kilometros y aventuras.</h3><br><br>
            </p>
        </section>
        <h3 class="tarifaTemporadas">CALETA DE VÉLEZ (MÁLAGA):</h3>

        <section class="sitios">
            <img class="imagenSitios" src="../imagenes/ideas/caleta.jpg">
            <div>
                <p class="textoSitios1">Caleta de Vélez se encuentra ubicada en la provincia de Málaga a 35 km de de Málaga capital.<br>
                    Se trata de una localidad de paisaje costero donde su actividad principal es la pesca.<br>
                    El puerto de La Caleta es el puerto pesquero por excelencia de la provincia de Málaga.<br>
                    En cuanto a gastronomía, dispone de numerosos bares y restaurantes donde puedes degustar
                    el pescado típico de la zona. La cocina presenta una variedad muy rica en sabores de origen mediterráneo.
                </p>
            </div>
        </section>
        <hr>

        <h3 class="tarifaTemporadas">TARIFA (CÁDIZ):</h3>

        <section class="sitios">
            <img class="imagenSitios" src="../imagenes/ideas/tarifa.jpg">
            <p class="textoSitios">Tarifa es un municipio español de la provincia de Cádiz. Si viajas a Tarifa podrás disfrutar de múltiples actividades
                ya que su privilegiada posición permite a los visitantes disfrutarde incontables actividades.<br>
                Visitar el Castillo de Guzmán es unade las excursiones recomendadas debido a que es uno de los castillos
                mejores conservados de Andalucía. Puedes pasear por las murallas del Castillo y solo te costará 4€,
                siendo posible disfrutar de unas espectaculares vistas de África, situada a tan solo 15 km de Tarifa.<br>
                Otra opción es relajarse y disfrutar de las playas de Tarifa disfrutandode las cálidas temperaturas y sus
                aguas cristalinas.<br>
                La playa de Bolonia se encuentra entre las mejores playas de Cádiz.
            </p>
        </section>

        <hr>

        <h3 class="tarifaTemporadas">ISLETA DEL MORO(ALMERÍA):</h3>

        <section class="sitios">
            <img class="imagenSitios" src="../imagenes/ideas/isletaDelMoro.jpg">
            <p class="textoSitios"> Isleta del moro es una pequeña localidad del Parque Natural Cabo de Gata-Níjar, provincia de Almería.<br>
                Se encuentra a 40 km de Almería y a los alrededores de la Isleta del Moro hay lugares con encanto por
                la gran belleza y valor de las playas de sus alrededores, las calderas volcánicas de la sierra de Cabo de
                Gata y la isleta o islote a la que hace alusión el nombre del pueblo.<br> Se trata de un pueblo de pescadores
                típico de la zona. De su playa destacan los 2 grandes peñones o formaciones terrestres que son visibles
                desde lejos. <br>Visitar la Isleta del Moro es un excelente lugar para degustar la pesca del mediterráneo.
            </p>

        </section>

        <hr>

        <h3 class="tarifaTemporadas">LA FABRIQUILLA (ALMERÍA):</h3>

        <section class="sitios">
            <img class="imagenSitios" src="../imagenes/ideas/fabriquilla.jpg">
            <p class="textoSitios1"> Se trata de una localidad española de la provincia de Almería, perteneciente al municipio de Níjar.<br>
                A pesar de ser un pequeño pueblo tiene mucho que ofrecer por sus playas, actividades multiaventura
                y su entorno de salinas de gran valor ecológico.<br>
                Actualmente es un pueblo de veraneo y se ha convertido, en una de las zonas más visitadas del parque.
            </p>

        </section>

        <hr>

        <h3 class="tarifaTemporadas">PUERTO DE ALMERIMAR (ALMERÍA):</h3>

        <section class="sitios">
            <img class="imagenSitios" src="../imagenes/ideas/puertoAlmerimar.jpg">
            <p class="textoSitios">El puerto deportivo de Almerimar pertenece al municipio de El Ejido. Está situado en la provincia de Almería
                y es uno de los más grandes puertos deportivos de la costa andaluza.<br> Su privilegiada ubicación y su cálido
                clima durante todo el año lo convierte en el lugar perfecto para la práctica de la vela, windsurf, buceo, pesca, golf, etc.<br>
                La función del Puerto es exclusivamente deportiva. En él se realiza todo tipo de eventos sociales ya sean fiestas,
                ferias medievales además, en él se encuentran la gran mayoría de bares, restaurante y una zona de ocio muy completa.
            </p>

        </section>

    </article>
    <footer>

    </footer>
</body>

</html>