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
			$id = $_POST['id'];
			session_start();
			$_SESSION['modificar'] = $id;
			header("Location: ../vistas/admin/modificarVehiculo.php");			
		}
		else if($alterar == "eliminar"){
			/*Esta variable siguiente corresponde a eliminar o modificar*/
			$id = $_POST['id'];
			$sql = Vehiculo::eliminar($id);
			Conexion::setQuery($sql);
			/* siempre que temrino de usar la BDD cierro la conexion, para evitar problemas de conexión futuros. De todos modos cuando quiero volver a usar la BDD, las funciones de la clase Conexion la abren (como la funcion de arriba, setQuery), nosotros solo tenemos que preocuparnos por cerrarla*/
			Conexion::cerrar();	
			header("Location: ../vistas/admin/abmVehiculo.php");
		}
		else if($alterar == "agregar"){
			/*declaro las diferentes variables que voy a usar para el ABM cliente*/
			
			$patente = $_POST['patente'];
			$nro_chasis = $_POST['nro_chasis'];
			$nro_motor = $_POST['nro_motor'];
				$marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$anio_fabricacion = $_POST['anio_fabricacion'];
				$tipo = $_POST['tipo'];
			$estado = $_POST['estado'];
	
			

			$sql = Vehiculo::insertar($patente, $nro_chasis,$nro_motor,
			$marca, $modelo,$anio_fabricacion,$tipo,$estado);
			Conexion::setQuery($sql);
			Conexion::cerrar();
			header("Location: ../vistas/admin/abmVehiculo.php");
		}
		else{
		
				$patente = $_POST['patente'];
			$nro_chasis = $_POST['nro_chasis'];
			$nro_motor = $_POST['nro_motor'];
				$marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$anio_fabricacion = $_POST['anio_fabricacion'];
				$tipo = $_POST['tipo'];
			$estado = $_POST['estado'];
		
			$id = $_POST['id'];

			
			$sql = Vehiculo::actualizar($id,$patente, $nro_chasis, $nro_motor, $marca, $modelo, $anio_fabricacion, $tipo,$estado);
		
			Conexion::setQuery($sql);
			Conexion::cerrar();
		header("Location: ../vistas/admin/abmVehiculo.php");
		
	
		}
?>
