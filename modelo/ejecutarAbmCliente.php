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
			header("Location: ../vistas/admin/modificarCliente.php");			
		}
		else if($alterar == "eliminar"){
			/*Esta variable siguiente corresponde a eliminar o modificar*/
			$id = $_POST['id'];
			$idUsuario = $_POST['idUsuario'];
			$sql = Cliente::eliminar($id);
			Conexion::setQuery(Cliente::eliminar($id));
			Conexion::setQuery(Usuario::eliminar($id_usuario));
			/* siempre que temrino de usar la BDD cierro la conexion, para evitar problemas de conexión futuros. De todos modos cuando quiero volver a usar la BDD, las funciones de la clase Conexion la abren (como la funcion de arriba, setQuery), nosotros solo tenemos que preocuparnos por cerrarla*/
			Conexion::cerrar();	
			header("Location: ../vistas/admin/abmCliente.php");
		}
		else if($alterar == "agregar"){
			/*declaro las diferentes variables que voy a usar para el ABM cliente*/
			$razonSocial = $_POST['razonSocial'];
			$nombre = $_POST['nombre'];
			$telefono = $_POST['telefono'];
			$domicilio = $_POST['domicilio'];
			$email = $_POST['email'];
			$user = $_POST['user'];
			$pass = $user.'1234';
			
			Conexion::setQuery(Usuario::insertar($user, /*md5($pass)*/ $pass, 'cliente'));

			$idUsuario = mysqli_fetch_assoc(Conexion::getQuery(Usuario::getLastUser()));
			Conexion::setQuery(Cliente::insertar($razonSocial, $nombre, $telefono, $domicilio, $email, $idUsuario['id_usuario']));
			Conexion::cerrar();
			header("Location: ../vistas/admin/abmCliente.php");
		}
		else{
			$razonSocial = $_POST['razonSocial'];
			$nombre = $_POST['nombre'];
			$telefono = $_POST['telefono'];
			$domicilio = $_POST['domicilio'];
			$email = $_POST['email'];
			$id = $_POST['id'];
			$idUsuario = $_POST['idUsuario'];
			$user = $_POST['user'];

			Conexion::setQuery(Usuario::actualizar($idUsuario, $user));

			Conexion::setQuery(Cliente::actualizar($id, $razonSocial, $nombre, $telefono, $domicilio, $email));
			Conexion::cerrar();
			header("Location: ../vistas/admin/abmCliente.php");
		}
?>
