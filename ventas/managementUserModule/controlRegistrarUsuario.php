<?php
//controlRegistrarUsuario
class controlRegistrarUsuario
{
	public function almacenarNuevousuario($loginActivo,$loginNuevo,$passwordNuevo,$nombreUsuarioNuevo,$aPaternoUsuarioNuevo,$aMaternoUsuarioNuevo,$privilegioNuevo)
	{
		include_once("../models/usuario.php");
		include_once("../models/detalleUsuarioPrivilegio.php");
		include_once("../inc/formMensaje.php");
		$objMensaje = new formMensaje;	
		$objUsuarioNuevo = new usuario;
		$objetoDetalleUsuario = new detalleUsuarioPrivilegio;
		$guardaUsuario = $objUsuarioNuevo -> guardarUsuarioNuevo($loginNuevo,$passwordNuevo,$nombreUsuarioNuevo,$aPaternoUsuarioNuevo,$aMaternoUsuarioNuevo);
		if($guardaUsuario == 1)
		{
				//almacenar los privilegios del usuario
				$guardaPrivilegios = $objetoDetalleUsuario -> guardarPrivilegiosNuevoUsuario($loginNuevo,$privilegioNuevo);	
				if($guardaPrivilegios == 1)
				{
					$mensaje = "El Almacenamiento de los datos del nuevo usuario
								<br>se realizo con exito, continue";
					$link =    "<form action='../inc/direccionaMenu.php' method='post'>
                        		<input type='hidden' value='".$loginActivo."' name='login'>
								<input name='btnBack' type='submit' id='btnBack' value='volver al menu principal'>
								</form>";	
					$objMensaje -> formMensajeAbortoShow($mensaje,$link);
				}
				else
				{
					if($guardaPrivilegios == -1)
					{
						$mensaje = "Error en conexion al servidor
									<br>Contacte al administrador del sistema";
						$link =    "<form action='../index.php' method='post'>
									<input type='submit' value='abortar'>
									</form>";		
					}	
					else
					{
						$mensaje = "Error en guardado de los privilegios del nuevo usuario
									<br>Contacte al administrador del sistema";
						$link =    "<form action='../index.php' method='post'>
									<input type='submit' value='abortar'>
									</form>";	
					}
					$objMensaje -> formMensajeAbortoShow($mensaje,$link);
				}				
		}
		else
		{
			if($guardaUsuario == -1)
			{
				$mensaje = "Error en conexion al servidor
							<br>Contacte al administrador del sistema";
				$link =    "<form action='../index.php' method='post'>
							<input type='submit' value='abortar'>
							</form>";		
			}	
			else
			{
				$mensaje = "Error en guardado de los datos del nuevo usuario
							<br>Contacte al administrador del sistema";
				$link =    "<form action='../index.php' method='post'>
							<input type='submit' value='abortar'>
							</form>";	
			}
			$objMensaje -> formMensajeAbortoShow($mensaje,$link);
		}
	}
}
?>