<?php
include "/modelo/conexion.php";
public class Administrador{

	Conexion::conexion();

	public static function getId($id){
		$query = "SELECT id_administrador FROM administrador WHERE id_administrador = $id";
		$result = Conexion::getQuery($query);
		return $result;
	}
	public static function setDni($dni){}
	public static function getDni(){}
	public static function setRol($rol){}
	public static function getRol(){}
	public static function setUsuario($usuario){}
	public static function getUsuario(){}
	public static function setPassword($password){}
	public static function getPassword(){}
	public static function setNombre($nombre){}
	public static function getNombre(){}
	public static function setApellido($apellido){}
	public static function getApellido(){}
	public static function setFechaDeNac($fechaDeNac){}
	public static function getFechaDeNac(){}
}

?>