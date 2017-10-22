<?php
	include "include.php";
	$razonSocial = $_POST['razonSocial'];
	$nombre = $_POST['nombre'];
	$telefono = $_POST['telefono'];
	$domicilio = $_POST['domicilio'];
	$email = $_POST['email'];

	$sql = Cliente::insertCliente($razonSocial, $nombre, $telefono, $domicilio);
	Conexion::setQuery($sql);
	Conexion::cerrar();

	header("Location: ../vistas/abmCliente.php");

?>