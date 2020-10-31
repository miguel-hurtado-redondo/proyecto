<style>
	@import url("../estilo/css.css");
</style>
<body>
	<h1 ><?php echo $datos['titulo']; ?></h1>
		
	<!--Formulario de login-->
	<form id="login" action='login' method='POST'>
		<p><label for='usuario'>Usuario</label><input type='text' name='usuario' required/></p>
		<p><label for='contrasena'>Contraseña </label><input type='password' name='contrasena' required/></p>
		<input type='submit' name='login' value='Hacer login'/>
        <input type='submit' name='volverAtras' value='Volver atrás' onclick="location.href='../index.php'"/>
    </form>
	<br>
	
</body>