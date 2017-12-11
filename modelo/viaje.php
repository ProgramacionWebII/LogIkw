<?php
	class Viaje{

		/* Se usa el método que más convenga, si necesito todos los clientes, uso el primero,
		si necesito un cliente en específico, filtro por ID usando el segundo méetodo */
		public static function getAll(){
			$query = "SELECT * FROM viaje";
			return $query;
		}

		public static function getAllForId($id){
			$query = "SELECT * FROM viaje WHERE id = $id";
			return $query;
		}

		public static function getAllForIdChofer($id){
			$query = "SELECT v.*, vj.id_chofer, vh.marca, vh.modelo, vv.id_vehiculo FROM viaje v JOIN viaje_chofer vj ON v.id = vj.id_viaje JOIN viaje_vehiculo vv ON vv.id_viaje = v.id JOIN vehiculo vh ON vh.id = vv.id_vehiculo
			WHERE vj.id_chofer = $id";
			return $query;
		}

		public static function getLast(){
			$query = "SELECT MAX(id) as id_viaje FROM viaje";
			return $query;
		}

		public static function getAllTableOnViaje($id){
				$query = "SELECT v.*, c.nombre nombreChofer, c.apellido apellidoChofer, a.nombre nombreAdmin, a.apellido apellidoAdmin, rcp.latitud, rcp.longitud, rcp.fecha
					 FROM viaje v
						JOIN  viaje_chofer vj ON v.id = vj.id_viaje
						JOIN chofer c ON vj.id_chofer = c.id
						JOIN administrador a ON v.id_administrador = a.id
						JOIN reporte_chofer_posicion rcp ON v.id = rcp.id_viaje
						WHERE v.id = $id and rcp.id = (select MAX(id) from reporte_chofer_posicion where id_viaje = $id)";
			return $query;
		}

		public static function insertar(
		$id_administrador,
		$origen,
		$destino,
		$tipo_de_carga,
		$fecha_de_salida_prevista,
		$fecha_de_llegada_prevista,
		$tiempo_estimado,
		$km_recorridos_previstos,
		$combustible_consumido_estimado){
			
			$query = "INSERT INTO viaje(
		id_administrador,
		origen,
		destino,
		tipo_de_carga,
		fecha_de_salida_prevista,
		fecha_de_llegada_prevista,
		tiempo_estimado,
		fecha_de_salida_real,
		fecha_de_llegada_real,
		tiempo_real,
		km_recorridos_previstos,
		km_recorridos_reales,
		combustible_consumido_estimado,
		combustible_consumido_real,
		estado)
			
			VALUES (
		$id_administrador,
		'$origen',
		'$destino',
		'$tipo_de_carga',
		'$fecha_de_salida_prevista',
		'$fecha_de_llegada_prevista',
		$tiempo_estimado,
		'1111-11-11',
		'1111-11-11',
		1,
		$km_recorridos_previstos,
		1,
		$combustible_consumido_estimado,
		1,
		'En proceso')";		
		
			return $query;
		}

		public static function eliminar($id){
			$query = "DELETE FROM viaje WHERE id = $id";
			return $query;
		}

		public static function eliminarViajeChofer($id){
			$query = "DELETE FROM viaje_chofer WHERE id_viaje = $id";
			return $query;
		}

		public static function eliminarViajeVehiculo($id){
			$query = "DELETE FROM viaje_vehiculo WHERE id_viaje = $id";
			return $query;
		}

 		public static function actualizaSalidaReal($id_viaje, $fecha_de_salida_real){
			$query = "UPDATE viaje SET fecha_de_salida_real = '$fecha_de_salida_real'
			WHERE id = $id_viaje";
			return $query;
		}

		public static function actualizaViajeFinalizado($id_viaje, $fecha_de_llegada_real, $tiempo_real, $km_recorridos_reales, $combustible_consumido_real){
			$query = "UPDATE viaje SET 
			fecha_de_llegada_real = '$fecha_de_llegada_real',
			tiempo_real = $tiempo_real,
			km_recorridos_reales = $km_recorridos_reales,
			combustible_consumido_real = $combustible_consumido_real
			WHERE id = $id_viaje";
			return $query;
		}
		public static function actualizarTodo(
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
		$combustible_consumido_real){
			$query = "UPDATE viaje
			SET 
		id_vehiculo = $id_vehiculo,
		id_administrador = $id_administrador,
		origen ='$origen',
		destino = '$destino',
		tipo_de_carga = '$tipo_de_carga',
		fecha_de_salida_prevista = '$fecha_de_salida_prevista',
		fecha_de_llegada_prevista = '$fecha_de_llegada_prevista',
		tiempo_estimado = $tiempo_estimado,
		fecha_de_salida_real = '$fecha_de_salida_real',
		fecha_de_llegada_real = '$fecha_de_llegada_real',
		tiempo_real = $tiempo_real,
		km_recorridos_previstos = $km_recorridos_previstos,
		km_recorridos_reales = $km_recorridos_reales,
		combustible_consumido_estimado = $combustible_consumido_estimado,
		combustible_consumido_real = $combustible_consumido_real
			
			WHERE id = $id";
			return $query;
		}

		public static function actualizarEstado($id){
			$query = "UPDATE viaje set 
			estado = 'Finalizado'
			 WHERE id = $idViaje";
			return $query;			
		}

		public static function agregarViajeChofer($idViaje, $idChofer){
			$query = "INSERT INTO viaje_chofer(id_viaje, id_chofer)
			VALUES ($idViaje, $idChofer)";
			return $query;
		}

		public static function agregarViajeVehiculo($idViaje, $idVehiculo){
			$query = "INSERT INTO viaje_vehiculo(id_viaje,id_vehiculo)
			VALUES ($idViaje, $idVehiculo)";
			return $query;
		}

		public static function salidaReal($idViaje, $salida){
			$query = "UPDATE viaje set fecha_de_salida_real = '$salida' WHERE id = $idViaje";
			return $query;
		}

		public static function kmReal($idViaje, $km){
			$query = "UPDATE viaje set km_recorridos_reales = km_recorridos_reales + $km WHERE id = $idViaje";
			return $query;
		}
		public static function llegadaReal($idViaje, $llegada, $tiempo){
			$query = "UPDATE viaje set 
			fecha_de_llegada_real = '$llegada',
			tiempo_real = $tiempo,
			estado = 'Finalizado'
			 WHERE id = $idViaje";
			return $query;
		}

		public static function combustibleReal($idViaje, $combustible){
			$query = "UPDATE viaje set combustible_consumido_real = combustible_consumido_real + $combustible WHERE id = $idViaje";
			return $query;
		}
	}
?>