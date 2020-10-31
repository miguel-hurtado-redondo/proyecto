<style>
	@import url("../estilo/css.css");
</style>
<body>

<h1><?php echo $datos['titulo']; ?></h1>
<!--Formulario de registro desde el home-->
<form action="registro" method="POST"> 
	<br>
	<label  for="usuario">Usuario </label>
	<input  type="text" name="usuario" required/>
	<br>
	<br>
	<label  for="nombre">Nombre </label>
	<input  type="text" name="nombre" required/>
	<br>
	<br>
	<label  for="apellidos">Apellidos </label>
	<input  type="text" name="apellidos" required/>
	<br>
	<br>
	<label  for="email">Email </label> 
	<input  type="email" name="email" required/>
	<br>
	<br>
	<label  for="contrasena">Contraseña </label>
	<input  type="password" name="contrasena" required/>
	<br>
	<br>
	<input type="submit" name="registro" value="Registrar"/>
	<input type="submit" name="inicio" value="Home" onclick="location.href='../index.php'"/>
</form>	
</body>