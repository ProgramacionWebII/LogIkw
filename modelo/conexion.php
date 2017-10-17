<?php

  class Conexion{

    /*Funcion que se invoca al principio para conectar a la BDD*/
    public static function conectar(){
      $con = mysqli_connect("localhost","root","","logikw");
	  // comprobar  conexion
if ($con->connect_error) {
    die("Conexion fallida" . $con->connect_error);
} 
      return $con;
    }

    /*Esta funcion se invoca para mandar consultas de las que no necesitemos que nos de un retorno, por ejemplo un INSERT, DELETE, UPDATE*/
    public static function setQuery($sql){
      mysqli_query($con, $sql);
    }

    /*Esta funcion se usa cuando quiero mandar un SELECT EJ:
    SELECT * FROM administrador WHERE id_administrador = 1
    */
    public static function getQuery($sql){
      $con = Conexion::conectar();
      $datos = mysqli_query($con, $sql);
      return $datos;
    }

    public static function cerrar(){
      $con = Conexion::conectar();
      mysqli_close($con);
    }
}
?>