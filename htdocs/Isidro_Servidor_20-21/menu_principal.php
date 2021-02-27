<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">
<head><title>1º fichero Proyecto Isidro</title>

	<style type="text/css">
	
</style>
</head>

<body>
<?php
	if($_SESSION["proveedor"] != "") {
		echo("Proveedor: <b>".$_SESSION["proveedor"]."</b>"."<br><br>");
?>


	<form action="cerrar_sesion.php" method="post">
		<input type="submit" name="cerrarsesion" value="Cerrar sesión" /><br><br><br><br>
	</form>

			<a href="alta_producto.php"><button type="button">Añadir producto</button></a><br><br><br>
			
			<a href="lista_productos.php"><button type="button">Listar productos</button></a><br><br><br>
			
			<a href="modificar_producto.php"><button type="button">Modificar producto</button></a><br><br><br>
			
			<a href="eliminar_producto.php"><button type="button">Eliminar producto</button></a><br>
			
		
<?php

} else {
?>
		<form action="index.php" method="post">
			<input type="submit" value="Ir a Inicio" />
		</form>
<?php
}
?>
</body>
</html>
