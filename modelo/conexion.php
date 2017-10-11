<?php

  class Conexion{

    private $con;
	  private $datos;

    public static function conexion(){
      $this-> $con = new mysqli("localhost","root","123456","LogIkw");
    }

    public static function setQuery($sql){
      $this->con->query($sql);
    }

    public static function getQuery($sql){
      $datos = $this->con->query($sql);
      return $datos;
    }
  }

	$con->close();
?>
