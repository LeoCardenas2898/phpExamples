<?php
class  controlBuscarApellido
{
	public function verificarUsuario($login,$apellidoBuscado)
	{
		include_once("../models/usuario.php");	
		$objBuscarUsuarioApellido = new usuario;
		$listaUsuario = $objBuscarUsuarioApellido -> obtenerListaUsuarioApellido($apellidoBuscado);
		if($listaUsuario != -1  and $listaUsuario != 0)
		{
				include_once("formResultadoBuscarApellido.php");
				$objeGridUsuarios = new formResultadoBuscarApellido;
				$objeGridUsuarios -> formResultadoBuscarApellidoShow($login,$apellidoBuscado,$listaUsuario);			
		}
		else
		{
			if($listaUsuario == -1)
			{
				$mensaje = "Error en conexion al servidor
							<br>Contacte al administrador del sistema";
				$link =    "<form action='../index.php' method='post'>
							<input type='submit' value='abortar'>
							</form>";		
			}	
			else
			{
				$mensaje = "Error no se ha encontrado el usuario
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