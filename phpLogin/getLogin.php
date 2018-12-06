<?php
  if(isset($_POST['btnLogin'])){
    $login = trim(strtolower($_POST['login']));
    $password = trim($_POST['password']); //Encriptado: $password = md5(trim($POST['password']));
    include_once("controlLogin.php");
    $objcontrol = new controlLogin;
    $objcontrol -> validarUsuario($login, $password);

  }else{
    include_once("formMensaje.php");
    $objMsj = new formMensaje();
    $objMsj -> formMensajeShow("Error: Acceso violado", "<a href='index.php'>Accesar correctamente</a>");
  }
 ?>
