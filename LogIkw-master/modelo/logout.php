<?php
	session_start();
	if($_SESSION['administrador'] == true || $_SESSION['chofer'] == true || 
	$_SESSION['cliente'] == true || $_SESSION['mecanico'] == true || $_SESSION['empresa'] == true){
		include "conexion.php";

		unset($_SESSION['administrador']);
		unset($_SESSION['chofer']);
		unset($_SESSION['cliente']);
		unset($_SESSION['mecanico']);
		unset($_SESSION['empresa']);
		
		Conexion::cerrar();
		session_destroy();
		header("Location: ../index.php");
	}
?>