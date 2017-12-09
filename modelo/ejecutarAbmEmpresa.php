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
			header("Location: ../vistas/admin/modificarEmpresa.php");			
		}
		else if($alterar == "eliminar"){
			/*Esta variable siguiente corresponde a eliminar o modificar*/
			$id = $_POST['id'];
			$sql = Empresa::eliminar($id);
			Conexion::setQuery($sql);
			mysqli_fetch_assoc(Conexion::setQuery(Empresa::eliminar($id)));
			/* siempre que temrino de usar la BDD cierro la conexion, para evitar problemas de conexión futuros. De todos modos cuando quiero volver a usar la BDD, las funciones de la clase Conexion la abren (como la funcion de arriba, setQuery), nosotros solo tenemos que preocuparnos por cerrarla*/
			Conexion::cerrar();	
			header("Location: ../vistas/admin/abmEmpresa.php");
		}
		else if($alterar == "agregar"){
			/*declaro las diferentes variables que voy a usar para el ABM cliente*/
			
			$nombre = $_POST['nombre'];
			$telefono = $_POST['telefono'];
			$domicilio = $_POST['domicilio'];
			

			$sql = Empresa::insertar($nombre, $telefono,$domicilio);
			Conexion::setQuery($sql);
			Conexion::cerrar();
			header("Location: ../vistas/admin/abmEmpresa.php");
		}
		else{
		
			$nombre = $_POST['nombre'];
			$telefono = $_POST['telefono'];
			$domicilio = $_POST['domicilio'];
		
			$id = $_POST['id'];

			$sql = Empresa::actualizar($id, $nombre, $telefono, $domicilio);
			Conexion::setQuery($sql);
			Conexion::cerrar();
			header("Location: ../vistas/admin/abmEmpresa.php");
		}
?>
