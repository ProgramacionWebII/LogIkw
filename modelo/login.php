<?php
include 'include.php';
	$variable=$_POST['id_viaje'];	

	/*Conecto a la BDD primeramente para comenzar a operar por medio de ella*/
	$con = Conexion::conectar();

	/*Obtengo el usuario y pass enviado por POST desde el formulario "login" */
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];

	if(isset($usuario) || isset($password) || empty($usuario) || empty($password)){
		Conexion::cerrar();
		header("Location: ../index.php");
	}
	
	/*Preparo la consulta que voy a querer envía a la BDD por medio de los métodos de la clase "Conexion"*/
	$query = "SELECT * FROM usuario WHERE user = '$usuario' AND pass = '$password'";

	/*Envío la consulta al método "getQuery" para que me devuelva el resultado de ese SELECT*/
	/*Por alguna razón devuelve un resultado vacío (a solucionar)*/
	$resultado = Conexion::getQuery($query);
	/*Muestro el objeto traido por mysqli_fetch_assoc*/
    $usuarioTraido = mysqli_fetch_assoc($resultado);
    $user = $usuarioTraido['user'];
    $pass = $usuarioTraido['pass'];
    $rol = $usuarioTraido['rol'];
    $id = $usuarioTraido['id_usuario'];
    /*Busco por ID la clase a la que le corresponde este usuario*/
    $query2 = "SELECT * FROM $rol WHERE id_usuario = '$id'";
    $buscarRolCorrespondiente = Conexion::getQuery($query2);

    $clase = mysqli_fetch_assoc($buscarRolCorrespondiente);
 
    switch ($clase['rol']) {
    	case 'administrador':
	session_start();
		    $_SESSION["administrador"] = $clase['id'];	
		    header("Location: ../vistas/adminLogeado.php");
		    Conexion::cerrar();
    		break;

    	case 'chofer':
session_start();
		    $_SESSION["chofer"] = $clase['id'];	
		    header("Location: ../vistas/choferLogeado.php?id_viaje=$variable");
		    Conexion::cerrar();
    		break;

    	case 'cliente':
session_start();
		    $_SESSION["cliente"] = $clase['id'];	
		    header("Location: ../vistas/clienteLogeado.php");
		    Conexion::cerrar();
    		break;

    	case 'mecanico':
session_start();
		    $_SESSION["mecanico"] = $clase['id'];	
		    header("Location: ../vistas/mecanicoLogeado.php");
		    Conexion::cerrar();
    		break;

    	case 'empresa':
session_start();
		    $_SESSION["empresa"] = $clase['id'];	
		    header("Location: ../vistas/empresaLogeado.php");
		    Conexion::cerrar();
    		break;
    }

    Conexion::cerrar();
?>