<?php
	session_start();
	if (isset($_POST["cerrarsesion"])){
		session_destroy();
		echo ("Has cerrado sesión: "."<b>".$_SESSION["proveedor"]."</b>");
	}

?>

	<form action="index.php" method="post">
		<input type="submit" value="Ir a Inicio" />
	</form>
	


