<?php
	class Cliente{

		/* Se usa el método que más convenga, si necesito todos los clientes, uso el primero,
		si necesito un cliente en específico, filtro por ID usando el segundo méetodo */
		public static function getAll(){
			$query = "SELECT * FROM cliente";
			return $query;
		}

		public static function getAllForId($id){
			$query = "SELECT * FROM cliente WHERE id = $id";
			return $query;
		}

		public static function insertar($razonSocial, $nombre, $telefono, $domicilio, $email){
			$query = "INSERT INTO cliente(razon_social, rol, nombre,telefono,domicilio,email)
			VALUES ('$razonSocial', 'cliente', '$nombre', $telefono, '$domicilio', '$email')";
			return $query;
		}

		public static function eliminar($id){
			$query = "DELETE FROM cliente WHERE id = $id";
			return $query;
		}
	}
?>