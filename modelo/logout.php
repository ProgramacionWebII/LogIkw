<?php
	session_start();
	if($_SESSION['administrador'] == true || $_SESSION['chofer'] == true || 
	$_SESSION['cliente'] == true || $_SESSION['mecanico'] == true || $_SESSION['empresa'] == true){
		session_destroy();
		header("Location: ../index.php");
	}
?>