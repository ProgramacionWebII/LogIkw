<?php
 class Administrador{

 	/* Todos los métodos son estáticos con propósito de no tener que instanciar un administrador
 		y así agilizar la utilización de las funciones */

 	/* Todas las funciones traen algo en específico, de modo que no hay que estar creando sentencias SQL
 		en otro lado, solo llamamos a las funciones que contienen dichas funciones, aunque por el momento
 		solo hay SELECT, hay que completar con UPDATE, CREATE y DELETE */
 	public static function getAll($id){ 		
		$query = "SELECT * FROM administrador WHERE id = $id";
		return $query;
 	}

	public static function getId($id){
		$query = "SELECT id FROM administrador";
		return $query;
	}
	public static function setDni($dni){}
	public static function getDni(){		
		$query = "SELECT dni_administrador FROM administrador";
		return $query;
	}
	public static function setRol($rol){}
	public static function getRol(){
		$query = "SELECT rol FROM administrador";
		return $query;
	}
	public static function setNombre($nombre){}
	public static function getNombre(){
		$query = "SELECT nombre FROM administrador";
		return $query;
	}
	public static function setApellido($apellido){}
	public static function getApellido(){
		$query = "SELECT apellido FROM administrador";
		return $query;
	}
	public static function setTelefono($fechaDeNac){}
	public static function getTelefono(){
		$query = "SELECT telefono FROM administrador";
		return $query;
	}
	public static function setdomicilio($domicilio){}
	public static function getdomicilio(){
		$query = "SELECT domicilio FROM administrador";
		return $query;
	}
	public static function setEmail($fechaDeNac){}
	public static function getEmail(){
		$query = "SELECT Email FROM administrador";
		return $query;
	}

}
?>