<?php
class controlActualizarUsuario
{
	public function actualizarDatosUsuario($login,$loginUsuario,$passwordUsuario,$nombreUsuario,$apellidoPaternoUsuario,$apellidoMaternoUsuario,$estado,$privilegiosUsuario)
	{
		
		include_once("../models/usuario.php");
		include_once("../models/detalleUsuarioPrivilegio.php");
		include_once("../inc/formMensaje.php");
		$objMensaje = new formMensaje;	
		$objUsuarioNuevo = new usuario;
		$objetoDetalleUsuario = new detalleUsuarioPrivilegio;
		$guardaUsuario = $objUsuarioNuevo -> guardaDatosActualizadosUsuario($loginUsuario,$passwordUsuario,$nombreUsuario,$apellidoPaternoUsuario,$apellidoMaternoUsuario,$estado);
		if($guardaUsuario == 1)
		{
				//almacenar los privilegios del usuario
				$guardaPrivilegios = $objetoDetalleUsuario -> guardarPrivilegiosActualizadosUsuario($loginUsuario,$privilegiosUsuario);	
				if($guardaPrivilegios == 1)
				{
					$mensaje = "La actualizacion de datos del usuario
								<br>se realizo con exito, continue";
					$link =    "<table border='0' align='center'>
								<tr>
								<td>
								<form action='../inc/direccionaMenu.php' method='post'>
                        		<input type='hidden' value='".$login."' name='login'>
								<input name='btnBack' class='tituloscentros' type='submit' id='btnBack' value='volver al menu principal'>
								</form>
								</td>
								<td>
								<form action='indexEditarUsuario.php' method='post'>
                        		<input type='hidden' value='".$login."' name='login'>
								<input name='btnBack' class='tituloscentros' type='submit' id='btnBack' value='Realizar otra busqueda'>
								</form>
								</td>
								</tr>";	
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
						$mensaje = "Error en actualizar de los privilegios del  usuario
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
				$mensaje = "Error en actualizar de los datos del  usuario
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