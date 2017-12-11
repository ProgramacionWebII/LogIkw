<?php
	session_start();
	include "include.php";
	/* valido que haya una session "administador" viva, para que esta sección solo pueda ejecutar un administrador */
	if(!isset($_SESSION['chofer'])){
	
		header("Location: ../index.php");
	}
	
		$tipo_reporte = $_POST['tipo_reporte'];
		
		
		$id_viaje = $_POST['variable'];
		//echo $id_viaje;
		//echo $tipo_reporte;
		


		
		if($tipo_reporte == "posicion"){
	
			$id_chofer = $_SESSION['chofer'];
			$id_viaje = $_POST['variable'];
			$fecha = date("Y-m-d H:i:s");
			$latitud = $_POST['latitud'];
			$longitud = $_POST['longitud'];
			$sqlViaje = Reporte_chofer::getAllForIdViaje($id_viaje);
			$resultado = Conexion::getQuery($sqlViaje);
			$reporteC = mysqli_fetch_assoc($resultado);
			if($reporteC['id'] != null){
				$sql1 = Reporte_chofer::actualizar_posicion($reporteC['id'], $id_viaje, $fecha,$latitud,$longitud);
				Conexion::setQuery($sql1);
				Conexion::cerrar();
			}
			else{
				$sql1 = Reporte_chofer::insertar_posicion($id_chofer, $id_viaje,$fecha,$latitud,$longitud);
				Conexion::setQuery($sql1);
				Conexion::cerrar();
			}
			
			header("Location: ../vistas/reportesChofer.php?id_viaje=$id_viaje");
		/*	echo $id_chofer;
			echo $id_viaje;
			echo $fecha;
			echo $latitud;
			echo $longitud;*/
			
		}
		if($tipo_reporte == "incidente"){
			/*declaro las diferentes variables que voy a usar para el ABM cliente*/
			$id_chofer = $_SESSION['chofer'];
	$id_viaje = $_POST['variable'];
			$fecha = $_POST['fecha'];
			$incidente = $_POST['incidente'];
			
			

				$sql2 = Reporte_chofer::insertar_incidente($id_chofer, $id_viaje,$fecha,$incidente);
			Conexion::setQuery($sql2);
			Conexion::cerrar();
			
			/*echo $id_chofer;
			echo $id_viaje;
			echo $fecha;
			echo $incidente;*/
		header("Location: ../vistas/reportesChofer.php?id_viaje=$id_viaje");
		

		}
		if ($tipo_reporte == "combustible"){
			/*declaro las diferentes variables que voy a usar para el ABM cliente*/
			$id_chofer = $_SESSION['chofer'];
			$id_viaje = $_POST['variable'];
			$fecha = $_POST['fecha'];
			$combustible_cargado = $_POST['combustible_cargado'];
			$importe_combustible = $_POST['importe_combustible'];
			$ubicacion = $_POST['ubicacion'];
			$km_unidad = $_POST['km_unidad'];
			
			Conexion::setQuery(Viaje::combustibleReal($id_viaje, $combustible_cargado));
			$sql3 = Reporte_chofer::insertar_combustible($id_chofer, $id_viaje,$fecha, $combustible_cargado, $importe_combustible, $ubicacion,$km_unidad);
			Conexion::setQuery($sql3);
			Conexion::cerrar();
			
			/*echo $id_chofer;
			echo $id_viaje;
			echo $fecha;
			echo $combustible_cargado;
		echo $importe_combustible;
			echo $ubicacion;
			echo $km_unidad;*/
		
			
		header("Location: ../vistas/reportesChofer.php?id_viaje=$id_viaje");
		}
		if($tipo_reporte == 'diario'){

			$id_chofer = $_SESSION['chofer'];
			$id_viaje = $_POST['variable'];
			$fechaSalida = $_POST['fechaSalida'];
			$kmRecorridos = $_POST['kmRecorridos'];

			if($fechaSalida != null){
				Conexion::setQuery(Viaje::salidaReal($id_viaje, $fechaSalida));
			}
			Conexion::setQuery(viaje::kmReal($id_viaje, $kmRecorridos));
		header("Location: ../vistas/reportesChofer.php?id_viaje=$id_viaje");
		}
		
			

?>
