<?php
	session_start();
	if(isset($_SESSION['administrador']) || isset($_SESSION['chofer']) || 
	isset($_SESSION['cliente']) || isset($_SESSION['mecanico']) || isset($_SESSION['empresa'])){
		include "conexion.php";

		Conexion::cerrar();
		session_destroy();
		header("Location: ../index.php");
	}
?>