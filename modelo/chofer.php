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

		public static function insertar($dni_chofer, $nombre, $apellido, $fecha_de_nacimiento, $tipo_licencia_de_conducir, $idUsuario){
			$query = "INSERT INTO chofer(dni_chofer, rol, nombre,apellido,fecha_de_nacimiento,tipo_licencia_de_conducir, id_usuario)
			VALUES ($dni_chofer, 'chofer', '$nombre', '$apellido', '$fecha_de_nacimiento', '$tipo_licencia_de_conducir', $idUsuario)";
			return $query;
		}

		public static function eliminar($id){
			$query = "DELETE FROM chofer WHERE id_usuario = $id";
			return $query;
		}

		public static function actualizar($id,$dni_chofer, $nombre, $apellido, $fecha_de_nacimiento, $tipo_licencia_de_conducir){
			$query = "UPDATE chofer
			SET dni_chofer = $dni_chofer,
			nombre = '$nombre', 
			apellido = '$apellido',
			fecha_de_nacimiento = '$fecha_de_nacimiento',
			tipo_licencia_de_conducir = '$tipo_licencia_de_conducir'
			WHERE id = $id";
			return $query;
		}

		public static function actualizarEstado($id, $estado){
			$query = "UPDATE chofer SET estadoC = $estado WHERE id = $id";
			return $query;
		}

		public static function getIdForViaje($idViaje){
			$query = "SELECT c.id id_chofer FROM chofer c JOIN viaje_chofer v ON
			c.id = v.id_chofer WHERE v.id_viaje = $idViaje";
			return $query;
		}

		public static function getChoferForViaje($idChofer){
			$query = "SELECT c.* FROM chofer c JOIN viaje_chofer v
			ON c.id = v.id_chofer JOIN viaje vj ON v.id_viaje = vj.id
			WHERE c.estadoC = 1 AND vj.estado = 'En proceso' and c.id = $idChofer";
			return $query;
		}
	}
?>