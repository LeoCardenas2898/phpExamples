<?php
	//getlogin
	if(isset($_POST['LogIn']))
	{
		if(trim(strlen($_POST['login'])) >=4 and strlen($_POST['password']) >=4)
		{
			include_once("controlLogin.php");
			$objControl = new controlLogin;
			$objControl -> validarUsuario(trim(strtolower($_POST['login'])) , $_POST['password']);
		}
		else
		{
			include_once("../inc/formMensaje.php");
			$objMensaje = new formMensaje;
			$objMensaje -> formMensajeAbortoShow("Los valores ingresados no son validos para el sistema",
												 "<form action='../index.php' method='post'>
													<input type='submit' value='volver a intentar'>
												  </form>");
		}
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