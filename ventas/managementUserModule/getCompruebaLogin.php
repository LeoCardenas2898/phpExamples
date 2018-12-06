<?php
	  function comprobar($login) 
	  { 
            include_once("../models/usuario.php");
			$objUsuario = new usuario;
			$existeLogin = $objUsuario -> verificarLoginUsado($login);
			if($existeLogin == 1)
				echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
			else
				echo "<span style='font-weight:bold;color:red;'>No Disponible</span>";			
      }
	  $login = $_POST['nuevoLogin'];
	 // echo"aaaa";
      if(!empty($login)) 
	       comprobar($login);
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