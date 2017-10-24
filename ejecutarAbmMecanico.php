<?php
	include "include.php";
	/* valido que haya una session "administador" viva, para que esta sección solo pueda ejecutar un administrador */
	if(!isset($_SESSION['administrador'])){
		Conexion::cerrar();
		header("Location: ../index.php");
	}
	$alterar = $_POST['alterar'];

	/* En caso de que se trate de un DELETE o un UPDATE, eliminar o actualizar, ejecuto esta sentencia,
	en caso contrario la ignora y pasa a las siguientes sentencias, las cuales son para insertar un nuevo cliente. Al finalizar cualquira de las 3 sentencias, se va a dirigir nuevamente al abmCliente.php*/
		if($alterar == "modificar"){
			$id = $_POST['id'];
			session_start();
			$_SESSION['modificar'] = $id;
			header("Location: ../vistas/modificarMecanico.php");			
		}
		else if($alterar == "eliminar"){
			/*Esta variable siguiente corresponde a eliminar o modificar*/
			$id = $_POST['id'];
			$sql = Mecanico::eliminar($id);
			Conexion::setQuery($sql);
			/* siempre que temrino de usar la BDD cierro la conexion, para evitar problemas de conexión futuros. De todos modos cuando quiero volver a usar la BDD, las funciones de la clase Conexion la abren (como la funcion de arriba, setQuery), nosotros solo tenemos que preocuparnos por cerrarla*/
			Conexion::cerrar();	
			header("Location: ../vistas/abmMecanico.php");
		}
		else if($alterar == "agregar"){
			/*declaro las diferentes variables que voy a usar para el ABM cliente*/
			$rol = $_POST['rol'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			
			$sql = Cliente::insertar($razonSocial, $nombre, $telefono, $domicilio, $email);
			Conexion::setQuery($sql);
			Conexion::cerrar();
			header("Location: ../vistas/abmMecanico.php");
		}
		else{
			$dni_mecanico = $_POST['dni_mecanico'];
			$rol = $_POST['rol'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$id = $_POST['id'];

			$sql = Mecanico::actualizar($id, $dni_mecanico, $rol, $nombre, $apellido);
			Conexion::setQuery($sql);
			Conexion::cerrar();
			header("Location: ../vistas/abmMecanico.php");
		}
?>




