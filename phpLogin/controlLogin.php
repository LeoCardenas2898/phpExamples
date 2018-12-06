<?php
  class controlLogin{
    public function validarUsuario($login, $password){
      include_once('usuario.php');
      $objUsuario = new usuario;
      $respuesta = $objUsuario -> verificarUsuario($login, $password);
      if($respuesta == 1){

        include_once('detalleUsuarioPrivilegio.php');
        $objDetalle = new detalleUsuarioPrivilegio;
        $listaPrivilegios = $objDetalle -> extraerPrivilegios($login);
        include_once('formMenu.php');
        $objMenu =  new formMenu;
        $objMenu -> formMenuShow($login, $listaPrivilegios);
      }else{
        include_once('formMensaje.php');
        $objError = new formMensaje;
        $objError -> formMensajeShow("Error: Usuario no existe, datos mal ingresados o usuario desactivado.", "<a href='index.php'>Inicio</a>");
      }
    }
  }
 ?>
