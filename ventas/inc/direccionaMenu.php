<?php
if(isset($_POST['btnBack']) and strcmp($_POST['login'],"") != 0)
{
	$login = $_POST['login'];
	include_once("../models/detalleUsuarioPrivilegio.php");	
	$objDetalleUsuario = new detalleUsuarioPrivilegio;
	$listaPrivilegios = $objDetalleUsuario -> extraerPrivilegiosUsuario($login);
	if($listaPrivilegios != 0 and $listaPrivilegios != -1)
	{
		include_once("../securityModule/formMenuUsuario.php");
		$objMenu = new formMenuUsuario;
		$objMenu -> formMenuUsuarioShow($login,$listaPrivilegios);
	}
	else
	{
		include_once("../inc/formMensaje.php");
		$objMensaje = new formMensaje;
		if($listaPrivilegios == -1)
		{
			$mensaje = "Error en conexion al servidor
 					    <br>Contacte al administrador del sistema";
			$link =		"<form action='../index.php' method='post'>
						<input type='submit' value='regresar'>
						</form>";					
		}
		else
		{
			$mensaje = "El usuario encontrado carece de privilegios
						<br>Contacte al administrador del sistema";
			$link =	   "<form action='../index.php' method='post'>
					    <input type='submit' value='salir del sistema'>
						</form>";	
		}
		$objMensaje -> formMensajeAbortoShow($mensaje,$link);
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