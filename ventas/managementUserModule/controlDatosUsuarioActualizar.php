<?php
class  controlDatosUsuarioActualizar
{
	public function recibirLoginBuscado($login,$usuarioLogin)
	{
		include_once("../models/usuario.php");		
		include_once("../models/privilegio.php");
		include_once("../models/detalleUsuarioPrivilegio.php");
		$objBuscarUsuarioLogin = new usuario;
		$objPrivilegios = new privilegio;
		$objDetallePrivilegiosUsuario = new detalleUsuarioPrivilegio;
		$usuario = $objBuscarUsuarioLogin -> obtenerUsuarioLogin($usuarioLogin);		
		if($usuario != -1  and $usuario != 0)
		{
			$privilegios = $objPrivilegios -> obtenerTodosPrivilegios();
			if($privilegios != -1 and $privilegios != 0)
			{
				$privilegiosUsuario = $objDetallePrivilegiosUsuario -> extraerPrivilegiosUsuario($usuarioLogin);
				if($privilegiosUsuario != -1 and $privilegiosUsuario != 0)
				{
					include_once("formActualizarUsuario.php");
					$objActualizarDatos = new formActualizarUsuario;
					$objActualizarDatos -> formActualizarUsuarioShow($login,$usuario,$privilegios,$privilegiosUsuario);
				}	
				else
				{
					include_once("../inc/formMensaje.php");
					$objMensaje = new formMensaje;
					if($privilegiosUsuario == -1)
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
				if($privilegios == -1)
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
			if($usuario == -1)
			{
				$mensaje = "Error en conexion al servidor
							<br>Contacte al administrador del sistema";
				$link =    "<form action='../index.php' method='post'>
							<input type='submit' value='abortar'>
							</form>";		
			}	
			else
			{
				$mensaje = "Error no se ha podido obtener los datos del usuario
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