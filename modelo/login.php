<?php
include 'conexion.php';
	session_start();
	$con = Conexion::conectar();
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];
	$rol;

	$query = "SELECT * FROM usuario WHERE usuario = '$usuario' AND pass = '$password'";

	$resultado = Conexion::getQuery($query);
	session_destroy();
?>