<?php
	class Chofer{

		/* Se usa el método que más convenga, si necesito todos los clientes, uso el primero,
		si necesito un cliente en específico, filtro por ID usando el segundo méetodo */
		public static function getAll(){
			$query = "SELECT * FROM chofer";
			return $query;
		}

		public static function getAllForId($id){
			$query = "SELECT * FROM chofer WHERE id = $id";
			return $query;
		}

		public static function insertar($dni_chofer, $nombre, $apellido, $fecha_de_nacimiento,$tipo_licencia_de_conducir){
			$query = "INSERT INTO chofer(dni_chofer,rol, nombre, apellido, fecha_de_nacimiento,tipo_licencia_de_conducir)
		VALUES ('$dni_chofer', 'chofer', '$nombre','$apellido','$fecha_de_nacimiento','$tipo_licencia_de_conducir')";
			return $query;
		}

		public static function eliminar($id){
			$query = "DELETE FROM chofer WHERE id = $id";
			return $query;
		}
	}
?>