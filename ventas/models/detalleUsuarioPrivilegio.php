<?php
include_once("conexionBD.php");
class detalleUsuarioPrivilegio extends conexionBD
{
	public function extraerPrivilegiosUsuario($login)
	{
			$conexion = $this -> conectar();
			if ($conexion == 0)
			{
				return(-1);	
				exit();
			}
			$query = 	"SELECT PR.id, PR.path, PR.label, PR.image,PR.grupo
						FROM usuario U, privilegio PR, usuario_privilegio DT
						WHERE  U.login = DT.login AND
							   PR.id = DT.id AND
							   U.login = '$login' 
						ORDER BY PR.grupo,PR.label";
						//echo $query;
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
	
	public function guardarPrivilegiosNuevoUsuario($loginNuevo,$privilegioNuevo)
	{
		$conexion = $this -> conectar();
		if ($conexion == 0)
		{
			return(-1);	
			exit();
		}
		$bandera = 1;
		for($i = 0 ; $i < count($privilegioNuevo) ; $i++)
		{
			$query ="INSERT INTO  usuario_privilegio VALUES('$loginNuevo','$privilegioNuevo[$i]')";	
			mysql_query($query);
			$aciertos = mysql_affected_rows();
			if ($aciertos != 1)
			{
				$bandera = 0;
				break;
			}				
		}
		$this -> desconectar();
		return($bandera);	
	}	
	
	public function guardarPrivilegiosActualizadosUsuario($loginUsuario,$privilegiosUsuario)
	{
		$conexion = $this -> conectar();
		if ($conexion == 0)
		{
			return(-1);	
			exit();
		}
		$query = "DELETE FROM usuario_privilegio WHERE login='$loginUsuario'";		
		$respuesta = mysql_query($query);
		$aciertos = mysql_affected_rows();
		if ($respuesta)	
		{
			$bandera = 1;
			for($i = 0 ; $i < count($privilegiosUsuario) ; $i++)
			{
				$query ="INSERT INTO  usuario_privilegio VALUES('$loginUsuario','$privilegiosUsuario[$i]')";	
				mysql_query($query);
				$aciertos = mysql_affected_rows();
				if ($aciertos != 1)
				{
					$bandera = 0;
					break;
				}				
			}
			$this -> desconectar();
			return($bandera);				
		}
		else
		{
			$this -> desconectar();
			return (0);
		}	
	}
}
?>