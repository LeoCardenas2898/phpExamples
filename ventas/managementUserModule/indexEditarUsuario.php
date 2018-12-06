<?php
//indexEditarUsuario.php
//comienza con busqueda
if(isset($_POST['login']))
{
	include_once("formBuscarUsuario.php");
	$objBuscarUsuario = new formBuscarUsuario;
	$objBuscarUsuario -> formBuscarUsuarioShow($_POST['login']);
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