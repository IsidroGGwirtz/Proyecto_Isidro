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

	if($_SESSION["proveedor"]=="") {
		header("Location:index.php");
	}

	require_once("conexion.php");

	if(isset($_POST["enviar"])) {

		$codProdInt = $_POST["codProdInt"];
		$cifProveedor = $_POST["cifProveedor"];
		$nombre = $_POST["nombre"];
		$marca = $_POST["marca"];
		$coste = $_POST["coste"];
		$coste = str_replace(",", ".", $coste);
		//sustituir la "," por "." ya que el update no admite números decimales con coma(,)

	$query = "UPDATE PRODUCTOS SET CIFProveedor='$cifProveedor', Nombre='$nombre', Marca='$marca', Coste='$coste' WHERE 
CodigoProductoInterno='$codProdInt'";

			$result = $mysqli->query($query);
			if($result) {
	?>

	<h1>Modificar Producto</h1><br>
	<!--Devuelve el número de filas afectadas de diferentes consultas:-->
	<p><?php echo("$mysqli->affected_rows")?> Producto modificado correctamente</p>
		
		<?php
				} else {
					echo "Error"; 
				}

				$mysqli->close();

			} else {

?>			

	<form action = "cerrar_sesion.php" method="post">
			<input type="submit" name="cerrarsesion" value="Cerrar sesión" />
	</form>
	<h1>Modificar Producto</h1>
	
		<form action="modificar_producto.php" method="post">
		<h2>Datos del producto:</h2>
			<label>CodigoProductoInterno<input type="text" name="codProdInt" size="30" maxlength="30"></label>			
			<label>CIFProveedor<input type="text" name="cifProveedor" size="30" maxlength="30"/></label>

			<label>Nombre
			<input type="text" name="nombre" size="30" maxlength="30"></label>

			<label>Marca
			<input type="text" name="marca" size="30" maxlength="30"></label>
			<label>Coste
			<input type="text" name="coste" size="30" maxlength="30"></label><br>
			<!--<label><input type="reset" name="borrar" value="Limpiar datos"></label><br>-->
			<label><input type="submit" name="enviar" value="Modificar producto"></label><br>
		
	</form>

<?php
 	}

 ?>
 	
 	<form action="menu_principal.php" method="post">
 		<input type="submit" value="Ir al menú principal">
 	</form>
 	
</body>

</html>






