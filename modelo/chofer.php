<?php
	class Chofer{

		/* Se usa el método que más convenga, si necesito todos los clientes, uso el primero,
		si necesito un cliente en específico, filtro por ID usando el segundo méetodo */
		public static function getAll(){
			$query = "SELECT c.*, u.nombre, u.rol, u.telefono, u.user FROM chofer c JOIN usuario u ON c.id_usuario = u.id";
			return $query;
		}

		public static function getAllForId($id){
			$query = "SELECT c.*, u.nombre, u.rol, u.telefono, u.user FROM chofer c JOIN usuario u ON c.id_usuario = u.id WHERE c.id = $id";
			return $query;
		}

		public static function insertar( $dni_chofer, $fecha_de_nacimiento, $tipo_licencia_de_conducir){

			$query = "INSERT INTO chofer(dni_chofer,fecha_nacimiento,tipo_licencia_de_conducir, id_usuario)
			VALUES ($dni_chofer, '$fecha_de_nacimiento', '$tipo_licencia_de_conducir', 
			(SELECT max(id) FROM usuario))";
			return $query;
		}

		public static function eliminar($id){
			$query = "DELETE FROM chofer WHERE id = $id";
			return $query;
		}

		public static function actualizar($id, $dni_chofer, $fecha_de_nacimiento, $tipo_licencia_de_conducir){
			$query = "UPDATE chofer
			SET dni_chofer = '$dni_chofer',
			/*fecha_ nacimiento = '$fecha_de_nacimiento',*/
			tipo_licencia_de_conducir = '$tipo_licencia_de_conducir'

			WHERE id = $id";
			return $query;
		}
	}
?>