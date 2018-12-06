<?php
  class conectarBD {
    public function conectar(){
      mysql_connect('localhost','root','12345678');
      mysql_select_db('prueba');
    }

    public function desconectar(){
      mysql_close();
    }
  }
 ?>
