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
	}
?>