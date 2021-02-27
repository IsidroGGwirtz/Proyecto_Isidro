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
		display: block;
	}

	</style>
</head>

<body>

<?php 

	
	if ($_SESSION["proveedor"] == ""){
		header("Location:index.php");
	}

	require_once('conexion.php');

	if (isset($_POST["enviar"])){
		
		$marca = $_POST['marca'];
		$query = "DELETE FROM Productos WHERE Marca = '$marca'";
		$result = $mysqli->query($query);
		if($result) {
		?>
			<h1>Eliminar Producto</h1>
				<p>Productos eliminados <?php echo($mysqli->affected_rows) ?></p>
				<a href='menu_principal.php'><button type='button'>Menu Principal</button></a>
			
		<?php
		} else {
			echo "Error " . $sql . ' ' . $connect->connect_error;
		}

		$mysqli->close();
	}else{
?>

	<form action="cerrar_sesion.php" method="post">
		<label><input type="submit" name="cerrarsesion" value="Cerrar sesión" /><br></label>
	</form>

	<h1>Eliminar Producto</h1>
	
	<form action="eliminar_producto.php" method="post">	
	
	<label for="marca">Marca<input type="text" name="marca" id="marca" size="20" maxlength="30" /></label><br><br>
	
	<label><input type="submit" name="enviar" value="Eliminar producto"></label><br>
	
	</form>

	<form action="menu_principal.php" method="post">
		<label><input type="submit" value="Ir al Menu Principal" /></label><br><br>
	</form>	

<?php

	}

?>	

	
</body>
</html>   


