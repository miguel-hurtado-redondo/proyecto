<style>
		@import url("../estilo/css.css");
</style>
<link rel="shortcut icon" type="image / x-icon" href="/proyecto/favicon.ico">

<h1><?php echo $datos['titulo']; ?></h1>

<table>
	<tr>
		<td>Id</td>
		<td>Usuario</td>
		<td>Nombre</td>
		<td>Apellidos</td>
		<td>Email</td>
		<td>Contraseña</td>
		<td>Rol (Admin=1 / Usuario=0)</td>
		<td>Acción</td>
	</tr>
	<br><br><br>
	<?php
		foreach($usuarios as $usuario):
		
		echo "<tr>";
			echo "<td>";
				echo $usuario["id"];
			echo "</td>";
			echo "<td>";
				echo $usuario["usuario"];
			echo "</td>";
			echo "<td>";
				echo $usuario["nombre"];
			echo "</td>";
			echo "<td>";
				echo $usuario["apellidos"];
			echo "</td>";
			echo "<td>";
				echo $usuario["email"];
			echo "</td>";
			echo "<td>";
				echo $usuario["contrasena"];
			echo "</td>";
			echo "<td>";
				echo $usuario["rol"];
			echo "</td>";?>
			<td class="bot">
				<a href="controlAdmin?eliminar&usuario=<?php echo $usuario['usuario']?>"><input type='button' name='eliminar' id='eliminar' value='Eliminar'></a>
				<a href="controlAdmin?actualizar&id=<?php echo $usuario['id'] ?>&usuario=<?php echo $usuario['usuario']?>&nombre=<?php echo $usuario['nombre']?>&apellidos=<?php echo $usuario['apellidos']?>&email=<?php echo $usuario['email']?>&contrasena=<?php echo $usuario['contrasena']?>&rol=<?php echo $usuario['rol']?>"><input type='button' name='actualizar' id='actualizar' value='Actualizar'></a>
			</td> 
				<?php
			echo "</td>";
		echo "</tr>";
		endforeach; 	
	?>

</table>

<br><br>

<!-- Comprobamos si creaUsuario ha sido pulsado -->
<?php 	if(isset($_POST['creaUsuario'])){?>

<!--formulario crear usuario-->
<form action="controlAdmin" method="POST">
	<label>Usuario</label>
	<input type="text" name="usuario" required/>
	<label>Nombre</label>
	<input type="text" name="nombre" />
	<label>Apellidos</label>
	<input type="text" name="apellidos" />
	<label>Email</label>
	<input type="email" name="email" />
	<label>Contraseña</label>
    <input type="password" name="contrasena" required/>
    <br><br>
	<label>Rol (Admin=1 /Usuario=0)</label>
	<input type="text" name="rol" />
    <p><input type="submit" name="registroAdmin" value="Registrar" /></p>
    <p><input type="submit" name="cierraEdicion" id="cierraEdicion" value="Cancelar" onclick="location.href='../index.php/admin_usuarios'"/></p>

</form>

<?php } else { ?>
  
		<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"> 
            <input type="submit" name="creaUsuario" value="Crear Usuario"/>
			<input type="button" value="Home" name="volverInicio" onclick="location.href='../index.php'"/>
		</form>
        <!-- <div class="botonesFuera">
        <input type="submit" name="volverInicio"  value="Home" onclick="location.href='../index.php'"/>
    </div> -->
        	
<?php } ?>