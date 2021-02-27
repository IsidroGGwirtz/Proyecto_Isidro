<?php
session_start();
?>
<!DOCTYPE html>
	<html lang="es">
	<meta charset="utf-8">
<head>
	<title>Proyecto Isidro</title>
	<style type="text/css">

	table {
		max-width: 1000px;
		border: 1px solid #000000;
		border-collapse: collapse;
		margin: 0 auto;		
	}

	th, td{		
		border: 1px solid #000000;
		height: auto;
		max-width: 100px;
		text-align: center;
		height: auto;
	}
	
	
	</style>
</head>

<body>

<?php 

	$listaProductos = array();

	require_once("conexion.php");


	if ($_SESSION["proveedor"] == ""){
		header("Location:index.php");
	}
	

		$query = "SELECT * FROM PRODUCTOS";
		$result = $mysqli->query($query);
		if($result){
			while($producto = $result->fetch_assoc()){//Obtiene una fila del resultado

				$listaProductos[] = $producto;
			}
		}

		$mysqli->close();
?>

	<h1>Lista de Productos</h1>
	<form action="cerrar_sesion.php" method="post">
		<input type="submit" name="cerrarsesion" value="Cerrar sesión" /><br><br>
	</form>
	<form action="menu_principal.php" method="post">
		<input type="submit" value="Ir al Menu Principal" />
	</form><br>

	<table >
	<thead>
		<tr>
		<th>Codigo
		Producto
		Interno</th>
		<th>CIF
		Proveedor</th>
		<th>Codigo
		Producto
		Proveedor</th>
		<th>Nombre</th>
		<th>Marca</th>
		<th>Modelo</th>
		<th>Talla</th>
		<th>Coste</th>
		<th>Plazo
		de
		Entrega</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($listaProductos as $producto){
	?>		
		<tr>
		<td><?php echo $producto["CodigoProductoInterno"]?></td>
		<td><?php echo $producto["CIFProveedor"]?></td>
		<td><?php echo $producto["CodigoProductoProveedor"]?></td>
		<td><?php echo $producto["Nombre"]?></td>
		<td><?php echo $producto["Marca"]?></td>
		<td><?php echo $producto["Modelo"]?></td>
		<td><?php echo $producto["Talla"]?></td>
		<td><?php echo $producto["Coste"]?></td>
		<td><?php echo $producto["PlazodeEntrega"]?></td>
		</tr>
	<?php
	}
	?>
	</tbody>
	</table><br><br>
		
</body>
</html>   



