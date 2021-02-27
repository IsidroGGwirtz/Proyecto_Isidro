<?php
session_start();
?>

<!DOCTYPE html>
	<html lang="es">
	<meta charset="utf-8">
<head>
	<title>Proyecto Isidro</title>
	<style type="text/css">
		label, input {
			display:block;
		}
	
	</style>
</head>

<body>

	<form action="cerrar_sesion.php" method="post">
		<input type="submit" name="cerrarsesion" value="Cerrar sesión">
	</form>

	<h1>DATOS PERSONALES</h1>

	<form action="Ejercicio2.php" method="post">
				
		
		<label>CIFProveedor<input type="text" name="cifProveedor" size="10" maxlength="9" value=""></label>
		
		<label>NombreProveedor<input type="text" name="nombreProveedor" size="20" maxlength="30" value=""></label>
		<label>Direccion<input type="text" name="direccion" size="20" maxlength="30"></label>
		<label>Código Postal<input type="number" name="codigoPostal" size="20" maxlength="20"></label>
		<label>Localidad<input type="text" name="localidad" size="20" maxlength="20"></label>
		<label>Provincia<input type="text" name="provincia" size="20" maxlength="20"></label>
		<label>Teléfono<input type="tel" name="telefono" size="20" maxlength="9"></label><br>

	
		<label><input type="reset" name="borrar" value="Limpiar datos"></label><br>
		<label><input type="submit" name="enviar" value="Registrarse"></label>
		</form>

</body>

</html>