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
			header("Location: ../vistas/admin/modificarChofer.php");			
		}
		else if($alterar == "eliminar"){
			/*Esta variable siguiente corresponde a eliminar o modificar*/
			$id = $_POST['id'];
			$sql = Chofer::eliminar($id);
			Conexion::setQuery($sql);
			$sql1 = Usuario::eliminar($id, "chofer");
			Conexion::setQuery($sql);
			/* siempre que temrino de usar la BDD cierro la conexion, para evitar problemas de conexión futuros. De todos modos cuando quiero volver a usar la BDD, las funciones de la clase Conexion la abren (como la funcion de arriba, setQuery), nosotros solo tenemos que preocuparnos por cerrarla*/
			Conexion::cerrar();	
			header("Location: ../vistas/admin/abmChofer.php");
		}
		else if($alterar == "agregar"){
			/*declaro las diferentes variables que voy a usar para el ABM cliente*/
			$usuario = $_POST['usuario'];
			$nombre = $_POST['nombre'];
			$telefono = $_POST['telefono'];
			$dni_chofer = $_POST['dni_chofer'];
			$fecha_de_nacimiento = $_POST['fecha_de_nacimiento'];
			$tipo_licencia_de_conducir = $_POST['tipo_licencia_de_conducir'];
		

			$sql1 = Usuario::insertar($usuario, $telefono, $nombre, "chofer");
			Conexion::setQuery($sql1);

			$sql2 = Chofer::insertar($dni_chofer, $fecha_de_nacimiento, $tipo_licencia_de_conducir, $id_usuario['id']);
			Conexion::setQuery($sql2);
			Conexion::cerrar();
			header("Location: ../vistas/admin/abmChofer.php");
		}
		else{
			$dni_chofer = $_POST['dni_chofer'];
			$usuario = $_POST['usuario'];
			$nombre = $_POST['nombre'];
			$telefono = $_POST['telefono'];
			$fecha_de_nacimiento = $_POST['fecha_de_nacimiento'];
			$tipo_licencia_de_conducir = $_POST['tipo_licencia_de_conducir'];
			$id = $_POST['id'];

			$sql1 = Chofer::actualizar($id, $dni_chofer, $fecha_de_nacimiento, $tipo_licencia_de_conducir);
			$sql2 = Usuario::actualizar($id, $usuario, $telefono, $nombre, "chofer");
			Conexion::setQuery($sql1);
			Conexion::setQuery($sql2);

			Conexion::cerrar();
			header("Location: ../vistas/admin/abmChofer.php");
		}
?>
