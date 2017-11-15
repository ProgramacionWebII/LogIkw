<?php
	class Empresa{

		/* Se usa el método que más convenga, si necesito todos los clientes, uso el primero,
		si necesito un cliente en específico, filtro por ID usando el segundo méetodo */
		public static function getAll(){
			$query = "SELECT * FROM empresa";
			return $query;
		}

		public static function getAllForId($id){
			$query = "SELECT * FROM empresa WHERE id = $id";
			return $query;
		}




		public static function insertar($nombre, $telefono, $domicilio){
			$query = "INSERT INTO empresa(nombre, rol ,telefono,domicilio)
			VALUES ('$nombre', 'empresa', $telefono, '$domicilio')";
			return $query;
		}

		public static function eliminar($id){
			$query = "DELETE FROM empresa WHERE id = $id";
			return $query;
		}

	public static function actualizar($id, $nombre, $telefono, $domicilio){
			$query = "UPDATE empresa
			SET nombre = '$nombre',
			telefono = $telefono,
			domicilio = '$domicilio'
		
			WHERE id = $id";
			return $query;
		}
	}
?>