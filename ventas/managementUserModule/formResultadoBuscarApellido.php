<?php
	include_once("../inc/formGeneral.php");
	class formResultadoBuscarApellido extends formGeneral
	{
		public function formResultadoBuscarApellidoShow($login,$apellidoBuscado,$listaUsuario)
		{
		?>
        	<html>
            <?php
				$this -> headLogin("Registro de Usuario");
            ?>  
            <link href="./css/stylo.css" rel="stylesheet" type="text/css" />   
            <link href="../css/stylo.css" rel="stylesheet" type="text/css" /> 
          	<script src="../js/jquery-3.2.1.js"></script>
            <script language="javascript">
			function validarFormulario1()
			{
				var apellidoBuscado = document.getElementById('apellidoBuscado').value;
				if(apellidoBuscado == null || apellidoBuscado.length < 2){
					alert('ERROR: El campo Apellido no debe ir vacío, minimo 2 caracteres');
					return false;
				}
 				return true;
			}
		    </script>
            <style type="text/css">
            body {	background-image: url(../img/patronFondo.jpg);background-repeat: 0,0;}
            </style>
            <body>
            <table width="600" border="0" align="center">
              <tr>
                <td colspan="2" class="tituloscentros" align="center">Lista de Usuarios Encontrados del Sistema</td>
              </tr>
              <tr>
                <td height="36" colspan="2"><hr></td>
              </tr>
              <tr>
                <td width="465"><p>Usuario Activo: <?php echo strtoupper($login);?></p>
                <p>Fecha: <?php //echo date('l').", ".date('d').date('S')." ".date('F')." ".date('Y');?></p></td>
                <td width="141">&nbsp;</td>
              </tr>
              <tr>
                <td height="38" colspan="2"><hr></td>
              </tr>
              <tr>
                <td colspan="2">
                <table width="600" border="0" align="center">
                  <tr>
                    <td colspan="2" align="center" valign="top"><table width="150" border="0">
                      <tr>
                        <td colspan="2" class="titsec2" align="center" valign="middle">Navegacion</td>
                      </tr>
                      <tr>
                        <td width="24" valign="middle" align="center">
                        <form action='../inc/direccionaMenu.php' method='post'>
                        <input type='hidden' value='<?php echo $login?>' name="login">
						<input name="btnBack" type='submit' id="btnBack" value='...'>
						</form>
                        </td>
                        <td width="110" class="subheading" valign="middle">Regresar al Menu</td>
                      </tr>
                      <tr>
                        <td valign="middle" align="center">
                        <form action='../index.php' method='post'>
						<input type='submit' value='...'>
						</form>
                        </td>
                        <td class="subheading" valign="middle">Salir del sistema</td>
                      </tr>
                      <tr>
                        <td valign="middle" align="center"><form name="form1" method="post" action="indexEditarUsuario.php">
                          <input name="btnBack2" type='submit' id="btnBack2" value='...'>
                          <input type='hidden' value='<?php echo $login?>' name="login">
                        </form></td>
                        <td class="prod_golive" valign="middle">buscar otro usuario</td>
                      </tr>
                    </table></td>
                    <td width="449" valign="top">
                    <table width="450" border="0" align="center">
                      <tr class="inputbts">
                        <td width="21" align="center" valign="middle">N°</td>
                        <td width="340" align="center" valign="middle">Nombres del Usuario</td>
                        <td width="67" align="center" valign="middle">Pulse para Mostrar</td>
                      </tr>
                      <?php
					  for($i = 0; $i < count($listaUsuario); $i++)
					  {
							echo "<tr>";  
							echo "<td align='center' valign='middle'>";
							echo $i+1;
							echo "</td>";
							echo "<td>";
							echo strtoupper($listaUsuario[$i]['apaterno'])." ".strtoupper($listaUsuario[$i]['amaterno']).", ".strtoupper($listaUsuario[$i]['nombre'])." (".strtolower($listaUsuario[$i]['login']).")";
							echo "</td>";
							echo "<td align='center' valign='middle'>";
							?>
                            <form name="formApellido" method="post" action="getLoginBuscado.php">
                            	<input type="hidden" name="login" value="<?php echo $login;?>">
                                <input type="hidden" name="usuarioLogin" value="<?php echo $listaUsuario[$i]['login'];?>">
                                <input name="btnBuscarLogin" value="Mostrar" type="submit">
                            </form>
                            <?php
							echo "</td>";
							echo "</tr>";  
					  }
                      ?>                      
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="37" colspan="2"><hr></td>
              </tr>
            </table>                 
            <?php $this -> footLogin();?>            
            </body>
            </html>
        <?php	
		}	
	}
?>