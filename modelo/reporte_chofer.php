<?php
	class Reporte_chofer{

		/* Se usa el método que más convenga, si necesito todos los clientes, uso el primero,
		si necesito un cliente en específico, filtro por ID usando el segundo méetodo */
		public static function getAll(){
			$query = "SELECT * FROM reporte_chofer";
			return $query;
		}

		public static function getAllForId($id){
			$query = "SELECT * FROM reporte_chofer WHERE id = $id";
			return $query;
		}

		public static function getAllForIdViaje($id){
			$query = "SELECT rc.* FROM reporte_chofer rc join viaje v ON v.id = rc.id_viaje
			WHERE rc.id_viaje = $id";
			return $query;
		}

		public static function insertar_posicion($id_chofer, $id_viaje,$fecha,$latitud,$longitud){
			$query = "INSERT INTO reporte_chofer_posicion(id_chofer, id_viaje,fecha,latitud,longitud)
			VALUES ($id_chofer, $id_viaje,'$fecha',$latitud,$longitud)";
			return $query;
		}

			public static function insertar_incidente($id_chofer, $id_viaje,$fecha,$incidente){
			$query = "INSERT INTO reporte_chofer_incidente(id_chofer, id_viaje,fecha,incidente)
			VALUES ($id_chofer, $id_viaje, '$fecha','$incidente')";
			return $query;
		}
			public static function insertar_combustible($id_chofer, $id_viaje,$fecha, $combustible_cargado, $importe_combustible, $ubicacion,$km_unidad){
			$query = "INSERT INTO reporte_chofer_combustible(id_chofer, id_viaje, fecha,combustible_cargado,importe_combustible,ubicacion,km_unidad)
			VALUES ($id_chofer, $id_viaje, '$fecha', $combustible_cargado,$importe_combustible, '$ubicacion', $km_unidad)";
			return $query;
		}

		public static function actualizar_posicion($reporteId,$id_chofer, $id_viaje,$fecha,$latitud,$longitud){
			$query = "UPDATE reporte_chofer 
			SET	fecha = $fecha,
			latitud = $latitud,
			longitud = $longitud
			WHERE id = $reporteId";
			return $query;
		}
		
	}
?>