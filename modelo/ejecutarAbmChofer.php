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
			$idUsuario = $_POST['id_usuario'];
			Conexion::setQuery(Usuario::eliminar($id_usuario));
			Conexion::setQuery(Chofer::eliminar($id));
			/* siempre que temrino de usar la BDD cierro la conexion, para evitar problemas de conexión futuros. De todos modos cuando quiero volver a usar la BDD, las funciones de la clase Conexion la abren (como la funcion de arriba, setQuery), nosotros solo tenemos que preocuparnos por cerrarla*/
			Conexion::cerrar();	
			header("Location: ../vistas/admin/abmChofer.php");
		}
		else if($alterar == "agregar"){
			/*declaro las diferentes variables que voy a usar para el ABM cliente*/
			$dni_chofer = $_POST['dni_chofer'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$fecha_de_nacimiento = $_POST['fecha_de_nacimiento'];
			$tipo_licencia_de_conducir = $_POST['tipo_licencia_de_conducir'];
			$user = $_POST['user'];
			$pass = $user.'1234';
			
			Conexion::setQuery(Usuario::insertar($user, /*md5($pass)*/ $pass, 'chofer'));

			$idUsuario = mysqli_fetch_assoc(Conexion::getQuery(Usuario::getLastUser()));
			Conexion::setQuery(Chofer::insertar($dni_chofer, $nombre, $apellido, $fecha_de_nacimiento, $tipo_licencia_de_conducir, $idUsuario['id_usuario']));
			Conexion::cerrar();
			header("Location: ../vistas/admin/abmChofer.php");
		}
		else{
			$dni_chofer = $_POST['dni_chofer'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$fecha_de_nacimiento = $_POST['fecha_de_nacimiento'];
			$tipo_licencia_de_conducir = $_POST['tipo_licencia_de_conducir'];
			$id = $_POST['id'];
			$user = $_POST['user'];
			$idUsuario = $_POST['idUsuario'];

			Conexion::setQuery(Usuario::actualizar($idUsuario, $user));

			Conexion::setQuery(Chofer::actualizar($id,$dni_chofer, $nombre, $apellido, $fecha_de_nacimiento, $tipo_licencia_de_conducir));
			Conexion::cerrar();
			header("Location: ../vistas/admin/abmChofer.php");
		}
?>
