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
			$query = "SELECT v.*, vj.id_chofer FROM viaje v JOIN viaje_chofer vj ON v.id = vj.id_viaje
			WHERE vj.id_chofer = $id";
			return $query;
		}

		public static function getAllTableOnViaje($id){
				$query = "SELECT v.*, c.nombre nombreChofer, c.apellido apellidoChofer, a.nombre nombreAdmin, a.apellido apellidoAdmin, rcp.latitud, rcp.longitud, rcp.fecha
					 FROM viaje v
						JOIN  viaje_chofer vj ON v.id = vj.id_viaje
						JOIN chofer c ON vj.id_chofer = c.id
						JOIN administrador a ON v.id_administrador = a.id
						JOIN reporte_chofer_posicion rcp ON v.id = rcp.id_viaje
						WHERE v.id = $id";
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
		$fecha_de_salida_real,
		$fecha_de_llegada_real,
		$tiempo_real,
		$km_recorridos_previstos,
		$desviacion_km,
		$combustible_consumido_estimado,
		$combustible_consumido_real){
			
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
		desviacion_km,
		combustible_consumido_estimado,
		combustible_consumido_real)
			
			VALUES (
			
		$id_administrador,
		'$origen',
		'$destino',
		'$tipo_de_carga',
		'$fecha_de_salida_prevista',
		'$fecha_de_llegada_prevista',
		$tiempo_estimado,
		'$fecha_de_salida_real',
		'$fecha_de_llegada_real',
		$tiempo_real,
		$km_recorridos_previstos,
		$desviacion_km,
		$combustible_consumido_estimado,
		$combustible_consumido_real)";
		
		
		
		
			return $query;
		}

		public static function eliminar($id){
			$query = "DELETE FROM viaje WHERE id = $id";
			return $query;
		}

		public static function actualizar(
		$id, 
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
		$desviacion_km,
		$combustible_consumido_estimado,
		$combustible_consumido_real){
			$query = "UPDATE viaje
			SET 
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
		desviacion_km = $desviacion_km,
		combustible_consumido_estimado = $combustible_consumido_estimado,
		combustible_consumido_real = $combustible_consumido_real
			
			WHERE id = $id";
			return $query;
		}
	}
?>