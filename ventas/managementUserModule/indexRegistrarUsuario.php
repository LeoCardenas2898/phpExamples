<?php
//indexRegistrarUsuario.php
if(isset($_POST['login']))
{
	include_once("formRegistrarUsuario.php");
	include_once("../models/privilegio.php");
	$objPrivilegio = new privilegio;
	$objNuevoUsuario = new formRegistrarUsuario;
	$listaPrivilegios = $objPrivilegio -> obtenerTodosPrivilegios();	
	if($listaPrivilegios != -1 and $listaPrivilegios != 0)
	{
		$objNuevoUsuario -> formRegistrarUsuarioShow($_POST['login'],$listaPrivilegios);
	}	
	else
	{
		include_once("../inc/formMensaje.php");
		$objMensaje = new formMensaje;
		if($listaPrivilegios == -1)
		{
			$mensaje = "Error en conexion al servidor
						<br>Contacte al administrador del sistema";
			$link =    "<form action='../index.php' method='post'>
						<input type='submit' value='regresar'>
						</form>";	
		}	
		else
		{
			$mensaje = "No se ha podido extraer privilegios<br>
			            contacte al administrador del sistema";
			$link =    "<form action='../index.php' method='post'>
					    <input type='submit' value='volver a intentar'>
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