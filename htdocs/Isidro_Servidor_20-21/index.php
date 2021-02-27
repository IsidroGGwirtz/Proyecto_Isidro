<?php
session_start();
?>

<!doctype html>
<html lang="es">
<meta charset="utf-8">
<head>
	<title>index.php</title>
	<style>
		label, input {
			display:block;
		}
	
	</style>
</head>

<body>

<?php

if (isset($_POST["enviar"])) {
	if($_POST["cifProveedor"]=="" || $_POST["telefono"]=="") {

	} else {
		//Abrir base de datos y CRUD.
		require_once("conexion.php");

		//comillas simples
		$query="SELECT * FROM PROVEEDORES where CIFProveedor = '".$_POST["cifProveedor"]."' and Telefono = '".$_POST["telefono"]."'";

		//$result, conjunto de resultados devuelto por la consulta.
		$result=$mysqli->query($query);

		//En el siguiente código utilizo un num_rows; para comprobar si existe registro o no para insertar o actualizar.
		if($result->num_rows==1) {
			$_SESSION["proveedor"] = $_POST["cifProveedor"];//Le doy el CIF del proveedor a la sesión.
		header("Location:menu_principal.php");
		}
		else {
			header("Location:Ejercicio1.php");
		}
		
		mysqli_close($mysqli);
	}	

} else if(isset($_SESSION["proveedor"]) && ($_SESSION["proveedor"] != "")) {
		header("Location:menu_principal.php");
}

?>

<form action="index.php" method="post">
	<label>CIF:<input type="text" name="cifProveedor" size="20" maxlength="9" value=""></label>
	<label>Telefono:<input type="tel" name="telefono" size="20" maxlength="9"></label>
	<label><input type="submit" name="enviar" value="Entrar"></label>
</form>

</body>
</html>