<?php
	class Usuario{

		/* Se usa el método que más convenga, si necesito todos los clientes, uso el primero,
		si necesito un cliente en específico, filtro por ID usando el segundo méetodo */
		public static function getAll(){
			$query = "SELECT * FROM usuario";
			return $query;
		}

		public static function getAllForId($id){
			$query = "SELECT * FROM usuario WHERE id_usuario = $id";
			return $query;
		}

		public static function getLastUser(){
			$query = "SELECT MAX(id_usuario) as id_usuario FROM usuario";
			return $query;
		}

		public static function getRolForId($id){
			$query = "SELECT rol FROM usuario where id_usuario = $id";
			return $query;
		}

		public static function insertar($user, $pass, $rol){
			$query = "INSERT INTO usuario(user,pass,rol)
			VALUES ('$user', '$pass', '$rol')";
			return $query;
		}

		public static function eliminar($id){
		$query = "DELETE FROM usuario WHERE id_usuario = $id";
			return $query;
		}

	public static function actualizar($id, $user, $pass, $rol){
			$query = "UPDATE usuario
			SET user = '$user',
			pass = '$pass',
			rol = '$rol'
		
			WHERE id_usuario = $id";
			return $query;
		}
	}
?>