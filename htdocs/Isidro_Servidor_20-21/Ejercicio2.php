<?php
session_start();
?>

<!DOCTYPE html>
	<html lang="es">
	<meta charset="utf-8">
	<head><title>Ejercicio2.php</title></head>

<body>

<?php

include("conexion.php");

if (isset($_POST["enviar"])) {

			if (isset($_POST["cifProveedor"]) && $_POST["cifProveedor"]!=""){
			$cifProveedor=$_POST["cifProveedor"];
			} if(!preg_match("/^[A-Z]{1}[0-9]{8}$/",$cifProveedor)){
			echo "El Cif no está escrito correctamente. Escríbalo de nuevo<br />";
			} else { echo "Su CIF es $cifProveedor<br />";}

			if (isset($_POST["nombreProveedor"]) && $_POST["nombreProveedor"]!=""){
			$nombreProveedor=$_POST["nombreProveedor"];
			echo "Su nombre es $nombreProveedor<br/>";}

			if (isset($_POST["direccion"]) && $_POST["direccion"]!=""){
			$direccion=$_POST["direccion"];
			echo "Su direccion es $direccion<br>";
			}

			if (isset($_POST["codigoPostal"]) && $_POST["codigoPostal"]!=""){
			$codigoPostal=$_POST["codigoPostal"];
			echo "Su Código Postal es $codigoPostal<br>";
			}

			if (isset($_POST["localidad"]) && $_POST["localidad"]!=""){
			$localidad=$_POST["localidad"];
			echo "La localidad es de $localidad<br>";	
			}
			
			if (isset($_POST["provincia"]) && $_POST["provincia"]!=""){
				$provincia=$_POST["provincia"];
				echo "La provincia es $provincia<br>";
			}

			if (isset($_POST["telefono"]) && $_POST["telefono"]!=""){
				$telefono=$_POST["telefono"];
				echo "El telefono es de $telefono<br>";
			}
			
			}			

			//Utilizamos el método "prepare" y le pasamos la consulta SQL como parámetro
			$query="INSERT INTO proveedores(CIFProveedor, NombreProveedor, Direccion, CodigoPostal, Localidad, Provincia, Telefono) VALUES(?, ?, ?, ?, ?, ?, ?)";
			if(!($sql=$mysqli->prepare($query))) {
					echo "Error en la preparacion(" .$mysqli->errno. ")".$mysqli->error;
			}

			//Vinculamos
			$cifProveedor=$_POST["cifProveedor"];
			$nombreProveedor =$_POST["nombreProveedor"];
			$direccion=$_POST["direccion"];
			$codigoPostal=$_POST["codigoPostal"];
			$localidad=$_POST["localidad"];
			$provincia=$_POST["provincia"];
			$telefono=$_POST["telefono"];
				if(!($sql->bind_Param("sssissi", $cifProveedor, $nombreProveedor, $direccion, $codigoPostal, $localidad, $provincia, $telefono))) {
						echo "Error en la vinculacion (" .$mysqli->errno. ")".$mysqli->error;
				}
			
				//Ejecutamos
				if(!$sql->execute()) {
					echo "Error en la ejecucion (" .$mysqli->errno. ")".$mysqli->error;
				}
				$sql->close();
?>

<br><a href="Ejercicio1.php"><button type="button">Volver a registrarse</button></a><br><br>
<a href="index.php"><button type="button">Ir a inicio</button></a>

</body>

</html>