<?php
	$con = new mysqli("localhost","root","","db");
	if($con->connect_error) { die("Fallo la conexion");}

	$con->close();
?>
