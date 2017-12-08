<?php
 class Administrador{

 	/* Todos los métodos son estáticos con propósito de no tener que instanciar un administrador
 		y así agilizar la utilización de las funciones */

 	/* Todas las funciones traen algo en específico, de modo que no hay que estar creando sentencias SQL
 		en otro lado, solo llamamos a las funciones que contienen dichas funciones, aunque por el momento
 		solo hay SELECT, hay que completar con UPDATE, CREATE y DELETE */
 	public static function getAllForId($id){ 		
		$query = "SELECT * FROM administrador WHERE id = $id";
		return $query;
 	}

	public static function getId($id){
		$query = "SELECT id FROM administrador";
		return $query;
	}

	public static function eliminar($id){
		$query = "DELETE FROM administrador WHERE id_usuario = $id";
		return $query;
	}

	public static function insertar($dni, $rol, $nombre, $apellido, $telefono, $domicilio, $email, $idUsuario){
		$query = "INSERT INTO 
		administrador(dni_administrador,rol,nombre,apellido,telefono,domicilio,email,id_usuario) VALUES
		($dni, '$rol', '$nombre', '$apellido', $telefono, '$domicilio', '$email', $idUsuario)";
		return $query;
	}


}
?>