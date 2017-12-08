<?php
	include "include.php";
	/* valido que haya una session "administador" viva, para que esta sección solo pueda ejecutar un administrador */
	if(!isset($_SESSION['administrador'])){
		Conexion::cerrar();
		//header("Location: ../index.php");
	}
	$alterar = $_POST['alterar'];

	/* En caso de que se trate de un DELETE o un UPDATE, eliminar o actualizar, ejecuto esta sentencia,
	en caso contrario la ignora y pasa a las siguientes sentencias, las cuales son para insertar un nuevo cliente. Al finalizar cualquira de las 3 sentencias, se va a dirigir nuevamente al abmCliente.php*/
		
		if($alterar == "modificar"){
			$id_usuario = $_POST['id'];
			session_start();
			$_SESSION['modificar'] = $id_usuario;
		header("Location: ../vistas/admin/modificarUsuario.php");			
		}
		else if($alterar == "eliminar"){
			/*Esta variable siguiente corresponde a eliminar o modificar*/
			
			$id = $_POST['id'];
			$rolClaseAEliminar = mysqli_fetch_assoc(Conexion::getQuery(Usuario::getRolForId($id)));
			$sql = Usuario::eliminar($id);
			Conexion::setQuery($sql);
			/* siempre que temrino de usar la BDD cierro la conexion, para evitar problemas de conexión futuros. De todos modos cuando quiero volver a usar la BDD, las funciones de la clase Conexion la abren (como la funcion de arriba, setQuery), nosotros solo tenemos que preocuparnos por cerrarla*/
			switch($rolClaseAEliminar['rol']){
				case 'administrador':
					mysqli_fetch_assoc(Conexion::setQuery(Administrador::eliminar($id)));
					Conexion::cerrar();	
					header("Location: ../vistas/admin/abmUsuario.php");
				break;
				case 'chofer':
					mysqli_fetch_assoc(Conexion::setQuery(Chofer::eliminar($id)));
					Conexion::cerrar();	
					header("Location: ../vistas/admin/abmUsuario.php");
				break;
				case 'cliente':
					mysqli_fetch_assoc(Conexion::setQuery(Cliente::eliminar($id)));
					Conexion::cerrar();	
					header("Location: ../vistas/admin/abmUsuario.php");
				break;
				case 'mecanico':
					mysqli_fetch_assoc(Conexion::setQuery(Mecanico::eliminar($id)));
					Conexion::cerrar();	
					header("Location: ../vistas/admin/abmUsuario.php");
				break;
				case 'empresa':
					mysqli_fetch_assoc(Conexion::setQuery(Empresa::eliminar($id)));
					Conexion::cerrar();	
					header("Location: ../vistas/admin/abmUsuario.php");
				break;
			}
		}
		
		else if($alterar == "agregar"){
			
	
			/*declaro las diferentes variables que voy a usar para el ABM cliente*/
			$user = $_POST['user'];
			$pass = $user.'1234';
			$rol = $_POST['rol'];
		
			
			$sql = Usuario::insertar($user, /*md5($pass)*/ $pass, $rol);
			Conexion::setQuery($sql);
			switch($rol){
				case 'administrador':
					$dni = $_POST['dni'];
					$nombre = $_POST['nombre'];
					$apellido = $_POST['apellido'];
					$telefono = $_POST['telefono'];
					$domicilio = $_POST['domicilio'];
					$email = $_POST['email'];
					$idUsuario = mysqli_fetch_assoc(Conexion::getQuery(Usuario::getLastUser()));
					Conexion::setQuery(Administrador::insertar($dni, $rol, $nombre, $apellido, $telefono, $domicilio, $email, $idUsuario['id_usuario']));
					Conexion::cerrar();
					header("Location: ../vistas/admin/abmUsuario.php");
				break;

				case 'chofer':
					$dni = $_POST['dni'];
					$nombre = $_POST['nombre'];
					$apellido = $_POST['apellido'];
					$fecha_nac = $_POST['fecha_nacimiento'];
					$licencia = $_POST['tipo_licencia'];
					$idUsuario = mysqli_fetch_assoc(Conexion::getQuery(Usuario::getLastUser()));
					Conexion::setQuery(Chofer::insertar($dni, $nombre, $apellido, $fecha_nac, $licencia, $idUsuario['id_usuario']));										
					Conexion::cerrar();
					header("Location: ../vistas/admin/abmUsuario.php");
				break;

				case 'cliente':
					$nombre = $_POST['nombre'];
					$razonSocial = $_POST['razon_social'];
					$telefono = $_POST['telefono'];
					$domicilio = $_POST['domicilio'];
					$email = $_POST['email'];
					$idUsuario = mysqli_fetch_assoc(Conexion::getQuery(Usuario::getLastUser()));
					Conexion::setQuery(Cliente::insertar($razonSocial, $nombre, $telefono, $domicilio, $email, $idUsuario['id_usuario']));
					Conexion::cerrar();
					header("Location: ../vistas/admin/abmUsuario.php");
				break;

				case 'mecanico':
					$dni = $_POST['dni'];
					$nombre = $_POST['nombre'];
					$apellido = $_POST['apellido'];
					$idUsuario = mysqli_fetch_assoc(Conexion::getQuery(Usuario::getLastUser()));
					Conexion::setQuery(Mecanico::insertar($dni, $nombre, $apellido, $idUsuario['id_usuario']));
					Conexion::cerrar();
					header("Location: ../vistas/admin/abmUsuario.php");
				break;

				case 'empresa':
					$nombre = $_POST['nombre'];
					$telefono = $_POST['telefono'];
					$domicilio = $_POST['domicilio'];
					$idUsuario = mysqli_fetch_assoc(Conexion::getQuery(Usuario::getLastUser()));
					Conexion::setQuery(Empresa::insertar($nombre, $telefono, $domicilio, $idUsuario['id_usuario']));
					Conexion::cerrar();
					header("Location: ../vistas/admin/abmUsuario.php");
				break;
			}
		
			Conexion::cerrar();
		}
		else{
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$rol = $_POST['rol'];
			$id = $_POST['id'];

			$sql = Usuario::actualizar($id, $user, $pass, $rol);
			Conexion::setQuery($sql);
			Conexion::cerrar();
			
	
			
			header("Location: ../vistas/admin/abmUsuario.php");
		}
?>