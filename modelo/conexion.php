<?php

  class Conexion{

    public static function conectar(){
      $con = mysqli_connect("localhost","root","","logikw");
      return $con;
    }

    public static function setQuery($sql){
      mysqli_query($con, $sql);
    }

    public static function getQuery($sql){
      $con = mysqli_connect("localhost","root","","logikw");
      $datos = mysqli_query($con, $sql);
    $i = 0;
    while($rs = mysqli_fetch_assoc($datos)){
      echo $rs[$i];
      $i++;
  }

      return $datos;
  }
}
?>