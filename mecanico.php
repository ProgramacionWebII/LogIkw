<?php
	class Mecanico{

		/* Se usa el método que más convenga, si necesito todos los mecanicos, uso el primero,
		si necesito un mecanico en especial, filtro por ID usando el segundo método */
		public static function getAll(){
			$query = "SELECT * FROM mecanico";
			return $query;
		}

		public static function getAllForId($id){
			$query = "SELECT * FROM mecanico WHERE id = $id";
			return $query;
		}

		public static function insertar($dni_mecanico, $rol, $nombre, $apellido,){
			$query = "INSERT INTO mecanico(dni_mecanico, rol, nombre, apellido)
			VALUES ('$dni_mecanico', 'mecanico', '$rol', $nombre, '$apellido')";
			return $query;
		} 

		public static function eliminar($id){
			$query = "DELETE FROM mecanico WHERE id = $id";
			return $query;
		}

		public static function actualizar($id, $dni_mecanico, $rol, $nombre, $apellido)
		{
			$query = "UPDATE mecanico
			SET dni_mecanico = '$dni_mecanico',
			rol = '$rol', 
			nombre = '$nombre',
			apellido = '$apellido',
			WHERE id = $id";
		}
	}
?>