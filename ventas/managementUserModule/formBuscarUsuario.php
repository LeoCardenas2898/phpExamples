<?php
	include_once("../inc/formGeneral.php");
	class formBuscarUsuario extends formGeneral
	{
		public function formBuscarUsuarioShow($login)
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
                <td colspan="2" class="tituloscentros" align="center">Buscar Usuarios del Sistema</td>
              </tr>
              <tr>
                <td height="36" colspan="2"><hr></td>
              </tr>
              <tr>
                <td><p>Usuario Activo: <?php echo strtoupper($login);?></p>
                <p>Fecha: <?php //echo date('l').", ".date('d').date('S')." ".date('F')." ".date('Y');?></p></td>
                <td>&nbsp;</td>
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
                    </table></td>
                    <td width="449" valign="top"><table width="450" border="0" align="center">
                      <tr>
                        <td height="37" class="inputbts">Buscar Usuario por &lt;LOGIN&gt;</td>
                      </tr>
                      <tr>
                        <td><form name="form1" method="post" action="getLoginBuscado.php">
                          <table width="450" border="0" align="center">
                            <tr>
                              <td width="231" class="subheading">Ingrese el &lt;Login&gt; de usuario:</td>
                              <td colspan="2" class="tituloscentros"><label for="usuarioLogin"></label>
                              <input name="usuarioLogin" type="text" class="ttseccao1" id="usuarioLogin"></td>
                            </tr>
                            <tr>
                              <td class="subheading">&nbsp;</td>
                              <td width="145" class="tituloscentros"><input name="login" type='hidden' id="login" value='<?php echo $login?>'></td>
                              <td width="60" align="center" valign="middle"><input name="btnBuscarLogin" type="submit" class="tituloscentros" id="btnBuscarLogin" value="Buscar"></td>
                            </tr>
                          </table>
                        </form></td>
                      </tr>
                      <tr>
                        <td height="35" class="inputbts">Buscar Usuario por &lt;APELLIDO PATERNO&gt;</td>
                      </tr>
                      <tr>
                        <td><form name="form2" method="post" action="getBuscarApellido.php" onSubmit="return validarFormulario1()">
                          <table width="450" border="0" align="center">
                            <tr>
                              <td width="216" class="subheading">Ingrese el Apellido Paterno:</td>
                              <td colspan="2">
                                <input name="apellidoBuscado" type="text" class="ttseccao1" id="apellidoBuscado">
                             </td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td width="141"><span class="tituloscentros">
                                <input name="login" type='hidden' id="login" value='<?php echo $login?>'>
                              </span></td>
                              <td width="71" align="center" valign="middle"><input name="btnApellidoBuscado" type="submit" class="tituloscentros" id="btnApellidoBuscado" value="Buscar"></td>
                            </tr>
                          </table>
                        </form></td>
                      </tr>
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