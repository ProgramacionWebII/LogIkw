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
				header("Location: ../vistas/admin/modificarViaje.php");			
		}
		else if($alterar == "eliminar"){
			/*Esta variable siguiente corresponde a eliminar o modificar*/
			$id = $_POST['id'];
			$idChofer = mysqli_fetch_assoc(Conexion::getQuery(Chofer::getIdForViaje($id)));
			$idVehiculo = mysqli_fetch_assoc(Conexion::getQuery(Vehiculo::getIdForViaje($id)));
			Conexion::setQuery(Chofer::actualizarEstado($idChofer['id_chofer'], 0));
			Conexion::setQuery(Vehiculo::actualizarEstado($idVehiculo['id_vehiculo'], 0));
			Conexion::setQuery(Viaje::eliminarViajeVehiculo($id));
			Conexion::setQuery(Viaje::eliminarViajeChofer($id));
			Conexion::setQuery(Viaje::eliminar($id));
			/* siempre que temrino de usar la BDD cierro la conexion, para evitar problemas de conexión futuros. De todos modos cuando quiero volver a usar la BDD, las funciones de la clase Conexion la abren (como la funcion de arriba, setQuery), nosotros solo tenemos que preocuparnos por cerrarla*/
			Conexion::cerrar();	
			header("Location: ../vistas/admin/abmViajes.php");
		}
		else if($alterar == "agregar"){
			/*declaro las diferentes variables que voy a usar para el ABM cliente*/
			
			
			$id_vehiculo = $_POST['id_vehiculo'];	
			$id_administrador = $_POST['id_administrador'];
			$id_chofer = $_POST['id_chofer'];
			$origen = $_POST['origen'];
			$destino = $_POST['destino'];
			$tipo_de_carga = $_POST['tipo_de_carga'];
			$fecha_de_salida_prevista = $_POST['fecha_de_salida_prevista'];
			$fecha_de_llegada_prevista = $_POST['fecha_de_llegada_prevista'];
			$tiempo_estimado = $_POST['tiempo_estimado'];
			$km_recorridos_previstos = $_POST['km_recorridos_previstos'];
			$combustible_consumido_estimado = $_POST['combustible_consumido_estimado'];

			Conexion::setQuery(Viaje::insertar(
				$id_administrador,
				$origen,
				$destino,
				$tipo_de_carga,
				$fecha_de_salida_prevista,
				$fecha_de_llegada_prevista,
				$tiempo_estimado,
				$km_recorridos_previstos,
				$combustible_consumido_estimado
			));
			$ultimoViaje = mysqli_fetch_assoc(Conexion::getQuery(Viaje::getLast()));
			Conexion::setQuery(Viaje::agregarViajeChofer($ultimoViaje['id_viaje'], $id_chofer));
			Conexion::setQuery(Viaje::agregarViajeVehiculo($ultimoViaje['id_viaje'], $id_vehiculo));
			Conexion::setQuery(Chofer::actualizarEstado($id_chofer, 1));
			Conexion::setQuery(Vehiculo::actualizarEstado($id_vehiculo, 1));
			Conexion::cerrar();
			header("Location: ../vistas/admin/abmViajes.php");
		}
		else{
			$id_vehiculo = $_POST['id_vehiculo'];
			$id_administrador = $_POST['id_administrador'];
			$origen = $_POST['origen'];
			$destino = $_POST['destino'];
			$tipo_de_carga = $_POST['tipo_de_carga'];
			$fecha_de_salida_prevista = $_POST['fecha_de_salida_prevista'];
			$fecha_de_llegada_prevista = $_POST['fecha_de_llegada_prevista'];
			$tiempo_estimado = $_POST['tiempo_estimado'];
			$fecha_de_salida_real = $_POST['fecha_de_salida_real'];
			$fecha_de_llegada_real = $_POST['fecha_de_llegada_real'];
			$tiempo_real = $_POST['tiempo_real'];
			$km_recorridos_previstos = $_POST['km_recorridos_previstos'];
			$km_recorridos_reales = $_POST['km_recorridos_reales'];
			$combustible_consumido_estimado = $_POST['combustible_consumido_estimado'];
			$combustible_consumido_real = $_POST['combustible_consumido_real'];
		
			$id = $_POST['id'];

			$sql = Viaje::actualizar(
				$id,
				$id_vehiculo,
				$id_administrador,
				$origen,
				$destino,
				$tipo_de_carga,
				$fecha_de_salida_prevista,
				$fecha_de_llegada_prevista,
				$tiempo_estimado,
				$fecha_de_salida_real,
				$fecha_de_llegada_real,
				$tiempo_real,
				$km_recorridos_previstos,
				$km_recorridos_reales,
				$combustible_consumido_estimado,
				$combustible_consumido_real
			);
			Conexion::setQuery($sql);
			Conexion::cerrar();
			header("Location: ../vistas/admin/abmViajes.php");
		}
?>
