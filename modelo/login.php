<?php
include 'include.php';
	session_start();

	/*Conecto a la BDD primeramente para comenzar a operar por medio de ella*/
	$con = Conexion::conectar();

	/*Obengo el usuario y pass enviado por POST desde el formulario "login" */
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];

	/*Preparo la consulta que voy a querer envía a la BDD por medio de los métodos de la clase "Conexion"*/
	$query = "SELECT * FROM usuario WHERE user = '$usuario' AND pass = '$password'";

	/*Envío la consulta al método "getQuery" para que me devuelva el resultado de ese SELECT*/
	/*Por alguna razón devuelve un resultado vacío (a solucionar)*/
	$resultado = Conexion::getQuery($query);

	/*Muestro el objeto traido por mysqli_fetch_assoc*/
    $usuario = mysqli_fetch_assoc($resultado)
    $user = $usuario['user'];
    $pass = $usuario['pass'];
    $rol = $usuario['rol'];
    $id = $usuario['id'];

    /*Busco por ID la clase a la que le corresponde este usuario*/
    $query2 = "SELECT id FROM $rol WHERE id = '$id'";
    $buscarRolCorrespondiente = Conexion::getQuery($query2);

    $clase = mysqli_fetch_assoc($buscarRolCorrespondiente);

    $_SESSION["miUsuario"] = $clase['id'];


    Conexion::cerrar();
?>