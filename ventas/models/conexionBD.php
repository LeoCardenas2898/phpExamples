<?php
class conexionBD
{
	private $resultado;
	private $estadoConexion;
	private function conectarServer()
	{
		$this -> resultado = mysql_connect('localhost','root','12345678');		
	}	
	
	private function conectarBaseDatos()
	{
		$this -> resultado = mysql_select_db('ventas');			
	}
	
	protected function conectar()
	{
		$this -> conectarServer();		
		mysql_query("SET NAMES 'utf8'"); // evitar errore con tildes y ñ
		if(!$this -> resultado)	
			return(0);
		else
			$this -> conectarBaseDatos();
			if(!$this -> resultado)	
				return(0);
			else
				return(1);
	}
	protected function desconectar()
	{
		mysql_close();	
	}
}
?>