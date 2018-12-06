<?php
  include_once("conectarBD.php");
  class usuario extends conectarBD{
    public function verificarUsuario($login, $password){
      $consulta = "select * from usuarios where login = '$login' and password ='$password' and estado ='1' ";
      $this -> conectar();
      $resultado = mysql_query($consulta);
      $filas = mysql_num_rows($resultado);
      $this -> desconectar();
      if($filas != 1){
        return (0);
      }else{
        return (1);
      }
    }
  }
 ?>
