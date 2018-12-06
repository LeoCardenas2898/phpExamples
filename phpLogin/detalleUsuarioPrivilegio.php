<?php
  include_once("conectarBD.php");
  class detalleUsuarioPrivilegio extends conectarBD{
    public function extraerPrivilegios($login){
      $consulta = "select p.labelPriv, p.pathPriv from usuarios u, privilegios p, detalle d where u.login = '$login' and u.login = d.login and p.idPriv = d.idPriv";
      $this -> conectar();
      $resultado = mysql_query($consulta);
      $filas = mysql_num_rows($resultado);
      $this -> desconectar();
      for ($i=0; $i<$filas; $i++){
        $Privilegios[$i] = mysql_fetch_array($resultado);
      }
      return $Privilegios;
    }
  }
 ?>
