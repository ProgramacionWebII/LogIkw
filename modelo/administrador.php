<?php
include "/modelo/conexion.php";
 class Administrador{

	public $usuario = $_POST["usuario"];
	public $password = $_POST["password"];

	public function logearse($usuario, $password){
		Conexion::conexion();
		$query = "SELECT * FROM administrador WHERE usuario =  $usuario AND pass = $password";
		$con = mysqli_query($query);
		return $con;
	}
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