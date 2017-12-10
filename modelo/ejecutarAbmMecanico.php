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
			header("Location: ../vistas/admin/modificarMecanico.php");			
		}
		else if($alterar == "eliminar"){
			/*Esta variable siguiente corresponde a eliminar o modificar*/
			$id = $_POST['id'];
			$sql = Mecanico::eliminar($id);
			Conexion::setQuery($sql);
			mysqli_fetch_assoc(Conexion::setQuery(Mecanico::eliminar($id)));
			/* siempre que temrino de usar la BDD cierro la conexion, para evitar problemas de conexión futuros. De todos modos cuando quiero volver a usar la BDD, las funciones de la clase Conexion la abren (como la funcion de arriba, setQuery), nosotros solo tenemos que preocuparnos por cerrarla*/
			Conexion::cerrar();	
			header("Location: ../vistas/admin/abmMecanico.php");
		}
		else if($alterar == "agregar"){
			/*declaro las diferentes variables que voy a usar para el ABM cliente*/
			$dni_mecanico = $_POST['dni_mecanico'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$user = $_POST['user'];
			$pass = $user.'1234';
			
			Conexion::setQuery(Usuario::insertar($user, /*md5($pass)*/ $pass, 'mecanico'));
			$idUsuario = mysqli_fetch_assoc(Conexion::getQuery(Usuario::getLastUser()));
			Conexion::setQuery(Mecanico::insertar($dni, $nombre, $apellido, $idUsuario['id_usuario']));
			Conexion::cerrar();
			header("Location: ../vistas/admin/abmMecanico.php");
		}
		else{
			$dni_mecanico = $_POST['dni_mecanico'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$id = $_POST['id'];
			$user = $_POST['user'];
			$idUsuario = $_POST['idUsuario'];

			Conexion::setQuery(Usuario::actualizar($idUsuario, $user));

			Conexion::setQuery(Mecanico::actualizar($id,$dni_mecanico, $nombre, $apellido));
			Conexion::cerrar();
			header("Location: ../vistas/admin/abmMecanico.php");
		}
?>
