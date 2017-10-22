<?php
	include "include.php";
	/* valido que haya una session "administador" viva, para que esta sección solo pueda ejecutar un administrador */
	if(!isset($_SESSION['administrador'])){
		Conexion::cerrar();
		header("Location: ../index.php");
	}

	/*declaro las diferentes variables que voy a usar para el ABM cliente*/
	$razonSocial = $_POST['razonSocial'];
	$nombre = $_POST['nombre'];
	$telefono = $_POST['telefono'];
	$domicilio = $_POST['domicilio'];
	$email = $_POST['email'];
	/*Estas dos variables siguientes corresponden a eliminar o modificar, aunque modificar está incompleto aún*/
	$id = $_POST['id'];
	$alterar = $_POST['alterar'];

	/* En caso de que se trate de un DELETE o un UPDATE, eliminar o actualizar, ejecuto esta sentencia,
	en caso contrario la ignora y pasa a las siguientes sentencias, las cuales son para insertar un nuevo cliente. Al finalizar cualquira de las 3 sentencias, se va a dirigir nuevamente al abmCliente.php*/
	if(isset($id) & isset($alterar)){
		if($alterar == 'eliminar'){
			$sql = Cliente::eliminar($id);
			Conexion::setQuery($sql);
			/* siempre que temrino de usar la BDD cierro la conexion, para evitar problemas de conexión futuros. De todos modos cuando quiero volver a usar la BDD, las funciones de la clase Conexion la abren (como la funcion de arriba, setQuery), nosotros solo tenemos que preocuparnos por cerrarla*/
			Conexion::cerrar();	
			header("Location: ../vistas/abmCliente.php");
		}
		else if($alterar == 'modificar'){

		}
	}


	$sql = Cliente::insertar($razonSocial, $nombre, $telefono, $domicilio);
	Conexion::setQuery($sql);
	Conexion::cerrar();

	header("Location: ../vistas/abmCliente.php");

?>