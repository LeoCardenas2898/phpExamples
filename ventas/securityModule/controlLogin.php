<?php
class controlLogin
{
	public function validarUsuario($login,$password)
	{
		include_once("../models/usuario.php");
		$objUsuario = new usuario;
		$respuesta = $objUsuario -> verificarUsuarioActivo($login,$password);
		if($respuesta == 1)
		{
			include_once("../models/detalleUsuarioPrivilegio.php");	
			$objDetalleUsuario = new detalleUsuarioPrivilegio;
			$listaPrivilegios = $objDetalleUsuario -> extraerPrivilegiosUsuario($login);
			if($listaPrivilegios != 0 and $listaPrivilegios != -1)
			{
				include_once("formMenuUsuario.php");
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
			if($respuesta == -1)
			{
				$mensaje = "Error en conexion al servidor
							<br>Contacte al administrador del sistema";
				$link =    "<form action='../index.php' method='post'>
							<input type='submit' value='regresar'>
							</form>";	
			}	
			else
			{
				$mensaje = "No se encontro el usuario esto se puede deber a:
							<br>login incorrecto<br>
							password incorrecto<br>
							usuario inactivo en el sistema";
				$link =    "<form action='../index.php' method='post'>
						    <input type='submit' value='volver a intentar'>
							</form>";	
			}
			$objMensaje -> formMensajeAbortoShow($mensaje,$link);
		}
	}	
}
?>