<?php
//getBuscarApellido
if(isset($_POST['btnApellidoBuscado']) and strcmp($_POST['login'],"")!=0)
	{
		$login = $_POST['login'];
		$apellidoBuscado = $_POST['apellidoBuscado'];
		include_once("controlBuscarApellido.php");
		$objBuscarApellido = new controlBuscarApellido;
		$objBuscarApellido -> verificarUsuario($login,$apellidoBuscado);
	}
	else
	{
		include_once("../inc/formMensaje.php");
		$objMensaje = new formMensaje;
		$objMensaje -> formMensajeAbortoShow("se ha detectado un acceso no permitido al sistema",
											 "<form action='../index.php' method='post'>
											 	<input type='submit' value='ir a la pagina inicial'>
											  </form>");
	}
?>