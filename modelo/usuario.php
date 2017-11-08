<?php 
class Usuario{
 	/* Todos los métodos son estáticos con propósito de no tener que instanciar un administrador
	y así agilizar la utilización de las funciones */

 	/* Todas las funciones traen algo en específico, de modo que no hay que estar creando sentencias SQL
 		en otro lado, solo llamamos a las funciones que contienen dichas funciones, aunque por el momento
 		solo hay SELECT, hay que completar con UPDATE, CREATE y DELETE */
 	public static function getAll(){ 		
		$query = "SELECT * FROM usuario";
		return $query;
 	}

 	public static function getAllForId($id){ 		
		$query = "SELECT * FROM usuario WHERE id = $id";
		return $query;
 	}
}
?>