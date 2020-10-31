<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Actualizar</title>
		<style>
			@import url("../estilo/css.css");
		</style>
	</head>

	<body>

		<h1>Adiministrar Usuario</h1>
		
		<!-- formulario para actualizar usuario-->
		<form name="actualizarEnBD" method="post" action="controlAdmin"> 
		
			<table>
                    <a href='../index.php'><input type='button' name='vueltaIndex' value='Home'></a>
					<a href='../index.php/admin_usuarios'><input type='button' name='vueltaAdminUsuarios' value='Administrar usuarios'></a>
                    <input type="submit" name="actualizarEnBD" value="Actualizar">
                    <br><br>
				<tr>
					<td>Id</td>
					<td><input type="text" name="id" value="<?php echo $id ?>" readonly></td>
				</tr>
				<tr>
					<td>Usuario</td>
					<td><input type="text" name="usuario" value="<?php echo $usuario ?>"></td>
				</tr>
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="nombre" value="<?php echo $nombre ?>"></td>
				</tr>
				<tr>
					<td>Apellidos</td>
					<td><input type="text" name="apellidos" value="<?php echo $apellidos ?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" value="<?php echo $email ?>"></td>
				</tr>
				<tr>
					<td>Contraseña encriptada</td>
					<td><input type="text" name="contrasenaActual" readonly value="<?php echo $contrasena ?>"></td>
				</tr>
				<tr>
					<td>Contraseña nueva</td>
					<td><input type="text" name="contraNueva" value="<?php ?>"></td>
				</tr>
				<tr>
					<td>Rol administrador</td>
					<?php if($rol == 1){ ?><!--Si es 1, es administrador.-->
					<td><input type="checkbox" name="rol" value="1" checked></td>
					<?php } else { ?>
					<td><input type="checkbox" name="rol" value="0"></td>
					<?php } ?>
				</tr>							
			</table>
		</form>
	</body>
</html>