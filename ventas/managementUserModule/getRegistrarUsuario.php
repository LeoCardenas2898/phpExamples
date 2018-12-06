<?php
//getRegistrarUsuario.php
	if(isset($_POST['bntGuardarNuevoUsuario']) and strcmp($_POST['login'],"")!=0)
	{
		$loginActivo = $_POST['login'];
		$loginNuevo = trim(strtolower($_POST['nuevoLogin']));
		$passwordNuevo = md5(trim($_POST['nuevoPassword']));
		$nombreUsuarioNuevo = trim(strtolower($_POST['nombreUsuario']));
		$aPaternoUsuarioNuevo = trim(strtolower($_POST['aPaternoUsuario']));
		$aMaternoUsuarioNuevo = trim(strtolower($_POST['aMaternoUsuario']));
		$privilegioNuevo = $_POST['newPrivilegio'];
		include_once("controlRegistrarUsuario.php");
		$objRegistroUsuario = new controlRegistrarUsuario;
		$objRegistroUsuario -> almacenarNuevousuario($loginActivo,$loginNuevo,$passwordNuevo,$nombreUsuarioNuevo,$aPaternoUsuarioNuevo,$aMaternoUsuarioNuevo,$privilegioNuevo);
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