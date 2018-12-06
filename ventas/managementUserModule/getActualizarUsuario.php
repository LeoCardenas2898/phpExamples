<?php
//getActualizarUsuario.php
	if(isset($_POST['bntGuardarUsuario']) and strcmp($_POST['login'],"")!=0)
	{
		$login = $_POST['login'];
		$loginUsuario = $_POST['nuevoLogin'];
		$passwordUsuario = trim($_POST['nuevoPassword']);
		$passwordUsuarioAntiguo = $_POST['nuevoPasswordx'];
		$nombreUsuario = strtolower(trim($_POST['nombreUsuario']));
		$apellidoPaternoUsuario = strtolower(trim($_POST['aPaternoUsuario']));
		$apellidoMaternoUsuario = strtolower(trim($_POST['aMaternoUsuario']));
		$estado = $_POST['estado'];
		$privilegiosUsuario = $_POST['newPrivilegio'];
		if(strcmp($passwordUsuario,"")==0)
			$passwordUsuario = $passwordUsuarioAntiguo;
		else
			$passwordUsuario = md5($passwordUsuario);
		
		include_once("controlActualizarUsuario.php");
		$objControlActualizar = new controlActualizarUsuario;
		$objControlActualizar -> actualizarDatosUsuario($login,$loginUsuario,$passwordUsuario,$nombreUsuario,$apellidoPaternoUsuario,$apellidoMaternoUsuario,$estado,$privilegiosUsuario);
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