<?php
	class Mantenimiento{

		/* Se usa el método que más convenga, si necesito todos los clientes, uso el primero,
		si necesito un cliente en específico, filtro por ID usando el segundo méetodo */
		public static function getAll(){
			$query = "SELECT * FROM mantenimiento";
			return $query;
		}

		public static function getAllForId($id){
			$query = "SELECT * FROM mantenimiento WHERE id = $id";
			return $query;
		}


		public static function insertar(
		$id_empresa,
		$id_mecanico,
		$patente,
		$nro_chasis,
		$nro_motor,
		$fecha_service,
		$km_de_la_unidad,
		$costo,
		$tipo,
		$repuestos_cambiados
		){
			
			$query = "INSERT INTO mantenimiento(
				id_empresa,
		id_mecanico,
		patente,
		nro_chasis,
		nro_motor,
		fecha_service,
		km_de_la_unidad,
		costo,
		tipo,
		repuestos_cambiados
		)
			
			VALUES (
			$id_empresa,
		$id_mecanico,
		'$patente',
		$nro_chasis,
		$nro_motor,
		'$fecha_service',
		$km_de_la_unidad,
		$costo,
		'$tipo',
		'$repuestos_cambiados')";
		
			return $query;
		}

		public static function eliminar($id){
			$query = "DELETE FROM mantenimiento WHERE id = $id";
			return $query;
		}

		public static function actualizar(
		$id,
		$id_empresa,
		$id_mecanico,
		$patente,
		$nro_chasis,
		$nro_motor,
		$fecha_service,
		$km_de_la_unidad,
		$costo,
		$tipo,
		$repuestos_cambiados){
			$query = "UPDATE mantenimiento
			SET 
		id_empresa = $id_empresa,
		id_mecanico =$id_mecanico,
		patente = '$patente',
		nro_chasis = $nro_chasis,
		nro_motor = $nro_motor,
		fecha_service = 	'$fecha_service',
		km_de_la_unidad = $km_de_la_unidad,
		costo = $costo,
		tipo = '$tipo',
		repuestos_cambiados = '$repuestos_cambiados'
		
			WHERE id = $id";
			return $query;
		}
	}
?>