<?php

  class Conexion{

    /*Funcion que se invoca al principio para conectar a la BDD*/
    public static function conectar(){
      $con = mysqli_connect("localhost","root","","logikw");
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