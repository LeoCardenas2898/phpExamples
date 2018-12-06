<?php
//getLoginBuscado.php
if(isset($_POST['btnBuscarLogin']) and strcmp($_POST['login'],"")!=0)
	{
		$login = $_POST['login'];
		$usuarioLogin = $_POST['usuarioLogin'];
		/*$usuarioPassword = $_POST['usuarioPassword'];
		$usuarioNombre = $_POST['usuarioNombre'];
		$usuarioAPaterno = $_POST['usuarioAPaterno'];
		$usuarioAMaterno = $_POST['usuarioAMaterno'];
		$usuarioEstado = $_POST['usuarioEstado'];*/
		//enviar al formulario o al control
		//echo $login.$usuarioLogin.$usuarioPassword.$usuarioNombre.$usuarioAPaterno.$usuarioAMaterno.$usuarioEstado; 
		include_once("controlDatosUsuarioActualizar.php");
		$objActualizar = new controlDatosUsuarioActualizar;
		$objActualizar -> recibirLoginBuscado($login,$usuarioLogin);
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