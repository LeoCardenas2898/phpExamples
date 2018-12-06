<?php
include_once("conexionBD.php");
class privilegio extends conexionBD
{
	public function obtenerTodosPrivilegios()
	{
		$conexion = $this -> conectar();
		if ($conexion == 0)
		{
			return(-1);	
			exit();
		}
		$query = 	"SELECT * FROM privilegio ORDER BY grupo,label";
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
}
?>