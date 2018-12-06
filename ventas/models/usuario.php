<?php
include_once("conexionBD.php");
class usuario extends conexionBD
{
	public function verificarUsuarioActivo($login,$password)
	{
		$conexion = $this -> conectar();	
		if ($conexion == 0)
		{
			return(-1);	
			exit();
		}
		$password = md5($password);
		$query = "SELECT login FROM usuario WHERE login = '$login' AND password = '$password' AND estado = 1";
		$resultado = mysql_query($query);
		$this -> desconectar();
		$numeroFilas = mysql_num_rows($resultado);
		if($numeroFilas == 1)
			return(1);
		else
			return(0);
	}
	
	public function verificarLoginUsado($login)
	{
		$conexion = $this -> conectar();	
		if ($conexion == 0)
		{
			return(0);	
			exit();
		}
		$query = "SELECT * FROM usuario WHERE login = '$login'";
		$resultado = mysql_query($query);
		$this -> desconectar();
		$numeroFilas = mysql_num_rows($resultado);
		if($numeroFilas == 0)
			return(1);
		else
			return(0);
	}
	
	public function guardarUsuarioNuevo($loginNuevo,$passwordNuevo,$nombreUsuarioNuevo,$aPaternoUsuarioNuevo,$aMaternoUsuarioNuevo)
	{
		$conexion = $this -> conectar();	
		if ($conexion == 0)
		{
			return(0);	
			exit();
		}
		$estado = 1;
		$query = "INSERT INTO usuario VALUES('$loginNuevo','$passwordNuevo','$nombreUsuarioNuevo','$aPaternoUsuarioNuevo','$aMaternoUsuarioNuevo','$estado')";
		$resultado = mysql_query($query);
		$aciertos = mysql_affected_rows();
		$this -> desconectar();
		if ($aciertos == 1)	
			return(1);	
		else
			return(0);	
	}
	
	public function obtenerListaUsuarioApellido($apellidoBuscado)
	{
		$conexion = $this -> conectar();
		if ($conexion == 0)
		{
			return(-1);	
			exit();
		}
		$query = "SELECT * FROM usuario WHERE apaterno LIKE  '%".$apellidoBuscado."%' ";		
		$resultado = mysql_query($query);
		$this -> desconectar();
		$aciertos = mysql_num_rows($resultado);
		if ($aciertos >= 1)
		{
			for($i=0;$i<$aciertos;$i++)	
			{ 
				$filaEncontrada[$i] = mysql_fetch_array($resultado);
			}			
			return($filaEncontrada);
		}
		else
		{
			return (0);
		}
	}
	
	public function obtenerUsuarioLogin($usuarioLogin)
	{
		$conexion = $this -> conectar();
		if ($conexion == 0)
		{
			return(-1);	
			exit();
		}
		$query = "SELECT * FROM usuario WHERE login = '$usuarioLogin' ";		
		$resultado = mysql_query($query);
		$this -> desconectar();
		$aciertos = mysql_num_rows($resultado);
		if ($aciertos >= 1)
		{
			for($i=0;$i<$aciertos;$i++)	
			{ 
				$filaEncontrada[$i] = mysql_fetch_array($resultado);
			}			
			return($filaEncontrada);
		}
		else
		{
			return (0);
		}
	}
	
	public function guardaDatosActualizadosUsuario($loginUsuario,$passwordUsuario,$nombreUsuario,$apellidoPaternoUsuario,$apellidoMaternoUsuario,$estado)
	{
		$conexion = $this -> conectar();
		if ($conexion == 0)
		{
			return(-1);	
			exit();
		}
		$query = "UPDATE usuario 
		          SET password = '$passwordUsuario', nombre = '$nombreUsuario', apaterno = '$apellidoPaternoUsuario', amaterno = '$apellidoMaternoUsuario', estado = '$estado'
				  WHERE login = '$loginUsuario'";
		$respuesta = mysql_query($query);
		$aciertos = mysql_affected_rows();
		$this -> desconectar();
		if ($respuesta)	
			return(1);	
		else
			return(0);
	}
}
?>