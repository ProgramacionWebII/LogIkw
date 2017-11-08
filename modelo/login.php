<?php
include 'include.php';


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
	$resultado = Conexion::getQuery($query);
	/*Muestro el objeto traido por mysqli_fetch_assoc*/
    $usuarioTraido = mysqli_fetch_assoc($resultado);
 
    switch ($usuarioTraido['rol']) {
    	case 'administrador':
			session_start();
		    $_SESSION["administrador"] = $usuarioTraido['id'];	
		    header("Location: ../vistas/adminLogeado.php");
		    Conexion::cerrar();
    		break;

    	case 'chofer':
			session_start();
		    $_SESSION["chofer"] = $usuarioTraido['id'];	
		    header("Location: ../vistas/choferLogeado.php");
		    Conexion::cerrar();
    		break;

    	case 'cliente':
			session_start();
		    $_SESSION["cliente"] = $usuarioTraido['id'];	
		    header("Location: ../vistas/clienteLogeado.php");
		    Conexion::cerrar();
    		break;

    	case 'mecanico':
			session_start();
		    $_SESSION["mecanico"] = $usuarioTraido['id'];	
		    header("Location: ../vistas/mecanicoLogeado.php");
		    Conexion::cerrar();
    		break;

    	case 'empresa':
			session_start();
		    $_SESSION["empresa"] = $usuarioTraido['id'];	
		    header("Location: ../vistas/empresaLogeado.php");
		    Conexion::cerrar();
    		break;
    }

    Conexion::cerrar();
?>