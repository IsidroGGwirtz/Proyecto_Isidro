<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">
<head>
	<title>ALTA_PRODUCTO</title>
	<style type="text/css">
		
		label, input {
			display: block;
		}
	</style>
</head>


<body>

<?php
	
	if($_SESSION["proveedor"] == "") {
		header("Location:index.php");
	}

	require_once("conexion.php");

	if(isset($_POST["enviar"])) {
		$codProdInt = $_POST["codProdInt"];
		$cifProveedor = $_POST["cifProveedor"];
		$nombre = $_POST["nombre"];
		$marca = $_POST["marca"];
		$coste = $_POST["coste"];
		$coste = str_replace(",", ".", $coste); //sustituir la "," por "." ya que el insert no admite números decimales con coma(,)

		$query = "INSERT INTO PRODUCTOS (CodigoProductoInterno, CIFProveedor, Nombre, Marca, Coste) VALUES('$codProdInt', '$cifProveedor', '$nombre', '$marca', '$coste')";

		$result = $mysqli->query("$query");
		if($result) {
			?>			
			<p><b>Producto añadido correctamente</b></p>
			<a href="alta_producto.php"><button type="button">Añadir más</button></a><br><br>
			
			<?php
				} else {
					echo "Error: No has rellenado los campos del producto que quieres añadir"; 
				}

				$mysqli->close();

			} else {

			?>	

				<div style="text-align: right;">
				<form action="cerrar_sesion.php" method="post">
					<label for="cerrarsesion"><input type="submit" name="cerrarsesion" id = "cerrarsesion" value="Cerrar sesión"></label>
				</form>
				</div>

				<h1>Añadir producto</h1>

				<form action="alta_producto.php" method="post">
				<label for="codProdInt">CodigoProductoInterno<input type="text" name="codProdInt" id="codProdInt" size="30" maxlength="20"></label>
				<label for="cifProveedor">CIFProveedor<input type="text" name="cifProveedor" id="cifProveedor" size="30" maxlength="9"></label>
				<label for="nombre">Nombre<input type="text" name="nombre" id="nombre" size="30" maxlength="20"></label>
				<label for="marca">Marca<input type="text" name="marca" size="30" maxlength="30"></label>
				<label for="coste">Coste<input type="text" name="coste" id="coste" size="30" maxlength="10"></label><br><br>
				<label><input type="submit" name="enviar" value="Añadir Producto"></label><br><br>
				
				</form>

				<?php

					}
				?>

				<div style="text-align: center">
				<form action="menu_principal.php" method="post">
					<input type="submit" value="Ir al menú principal">
				</form>
				</div>
			
		</body>
		</html>




