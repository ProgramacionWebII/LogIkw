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
    $usuarioTraido = mysqli_fetch_assoc($resultado);
    $user = $usuarioTraido['user'];
    $pass = $usuarioTraido['pass'];
    $rol = $usuarioTraido['rol'];
    $id = $usuarioTraido['id_usuario'];

    /*Por alguna extraña razón no me trae la palabra "administrador" sino "administra", porque
    me veo obligado a agregarle las letras que faltan para que pueda realizar la búsqueda correctamente dentro del SELECT del 'query2'*/
	if($rol == 'administra'){
		$rol = 'administrador';
	}    

    /*Busco por ID la clase a la que le corresponde este usuario*/
    $query2 = "SELECT * FROM $rol WHERE id = '$id'";
    $buscarRolCorrespondiente = Conexion::getQuery($query2);

    $clase = mysqli_fetch_assoc($buscarRolCorrespondiente);
 
    switch ($clase['rol']) {
    	case 'administrador':

		    $_SESSION["administrador"] = true;	
		    header("Location: ../vistas/adminLogeado.php");
		    Conexion::cerrar();
    		break;

    	case 'chofer':

		    $_SESSION["chofer"] = true;	
		    header("Location: ../vistas/choferLogeado.php");
		    Conexion::cerrar();
    		break;

    	case 'cliente':

		    $_SESSION["cliente"] = true;	
		    header("Location: ../vistas/clienteLogeado.php");
		    Conexion::cerrar();
    		break;

    	case 'mecanico':

		    $_SESSION["mecanico"] = true;	
		    header("Location: ../vistas/mecanicoLogeado.php");
		    Conexion::cerrar();
    		break;

    	case 'empresa':

		    $_SESSION["empresa"] = true;	
		    header("Location: ../vistas/empresaLogeado.php");
		    Conexion::cerrar();
    		break;
    }

    Conexion::cerrar();
?>