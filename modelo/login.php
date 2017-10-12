<?php
include 'conexion.php';
	session_start();

	/*Conecto a la BDD primeramente para comenzar a operar por medio de ella*/
	$con = Conexion::conectar();

	/*Obengo el usuario y pass enviado por POST desde el formulario "login" */
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];


	$rol;

	/*Preparo la consulta que voy a querer envía a la BDD por medio de los métodos de la clase "Conexion"*/
	$query = "SELECT * FROM usuario WHERE user = '$usuario' AND pass = '$password'";

	/*Envío la consulta al método "getQuery" para que me devuelva el resultado de ese SELECT*/
	/*Por alguna razón devuelve un resultado vacío (a solucionar)*/
	$resultado = Conexion::getQuery($query);

    while($rs = mysqli_fetch_assoc($resultado)){
	    echo 'Usuario: '.$rs['user'].'<br>';
	    echo 'Password: '.$rs['pass'].'<br>';
	    echo 'Rol: '.$rs['rol'];
    }

	session_destroy();
?>