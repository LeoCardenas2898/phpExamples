<?php
	include_once("../inc/formGeneral.php");
	class formActualizarUsuario extends formGeneral
	{
		public function formActualizarUsuarioShow($login,$usuario,$privilegios,$privilegiosUsuario)
		{
		?>
        	<html>
            <?php
				$this -> headLogin("Actualizacion de Usuario");
            ?>  
            <link href="./css/stylo.css" rel="stylesheet" type="text/css" />   
            <link href="../css/stylo.css" rel="stylesheet" type="text/css" /> 
          	<script src="../js/jquery-3.2.1.js"></script>
            <script language="javascript">
			var banderaLogin; 
			function validarFormulario(){
				var nuevoLogin = document.getElementById('nuevoLogin').value;
				var nuevoPassword = document.getElementById('nuevoPassword').value;
				var nuevoPasswordConf = document.getElementById('nuevoPasswordConf').value;
				var nombreUsuario = document.getElementById('nombreUsuario').value;
				var aPaternoUsuario = document.getElementById('aPaternoUsuario').value;
				var aMaternoUsuario = document.getElementById('aMaternoUsuario').value;		
				var newPrivilegio = document.getElementById('newPrivilegio');
				/*var cmbSelector = document.getElementById('selector').selectedIndex;
				var chkEstado = document.getElementById('checkBox');
				var rbtEstado = document.getElementsByName('radioButton');*/
 				var banderaRBTN = false;
 				if(nuevoLogin == null || nuevoLogin.length == 0 || /^\s+$/.test(nuevoLogin)){
					alert('ERROR: El campo login no debe ir vacío o lleno de solamente espacios en blanco');
					return false;
				}
		 		
				if(nuevoPassword.length > 0)
				{
					if(nuevoPassword.length < 4)
					{
						alert('ERROR: El campo password debe tener minimo 4 caracteres');
						return false;
					}
				}					
				
							
		 		if(nuevoPassword != nuevoPasswordConf){
					alert('ERROR: LAS CLAVES DEBEN COINCIDIR');
					return false;
				}
				if(nombreUsuario == null || nombreUsuario.length < 4){
					alert('ERROR: El campo nombre no debe ir vacío, minimo 4 caracteres');
					return false;
				}
				if(aPaternoUsuario == null || aPaternoUsuario.length < 4){
					alert('ERROR: El campo apellido paterno no debe ir vacío, minimo 4 caracteres');
					return false;
				}
				if(aMaternoUsuario == null || aMaternoUsuario.length < 4){
					alert('ERROR: El campo apellido paterno no debe ir vacío, minimo 4 caracteres');
					return false;
				}
				
				//Test check
				var found = false;
				var chk = document.getElementsByName('newPrivilegio'+'[]');
				for (var i=0 ; i < chk.length ; i++)
				{
					found = chk[i].checked ? true : found;
				}
				if(found == false)
				{
					alert('ERROR: Seleccione al menos un privilegio');
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
                <td colspan="2" class="tituloscentros" align="center">Actualizacion de Datos de Usuario: <br> <?php echo $usuario[0]['nombre']." ".$usuario[0]['apaterno']." ".$usuario[0]['amaterno']?> (<?php echo $usuario[0]['login']?>)</td>
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
                      <tr>
                        <td valign="middle" align="center"><form name="form1" method="post" action="indexEditarUsuario.php">
                          <input name="btnBack2" type='submit' id="btnBack2" value='...'>
                          <input name="login" type='hidden' id="login" value='<?php echo $login?>'>
                        </form></td>
                        <td class="prod_golive" valign="middle">buscar otro usuario</td>
                      </tr>
                      <tr>
                        <td valign="middle" align="center">&nbsp;</td>
                        <td class="subheading" valign="middle">&nbsp;</td>
                      </tr>
                    </table></td>
                    <td width="449" valign="top"><form  name="form" id="form" method="post" action="getActualizarUsuario.php" onSubmit="return validarFormulario()" >
                      <table width="450" border="0" align="center">
                        <tr>
                          <td height="30" colspan="3"  align="center" valign="middle" class="inputbts">Datos de Acceso al Sistema</td>
                        </tr>
                        <tr>
                          <td width="25" height="35"  align="center" valign="middle" class="subheading"><strong>1</strong></td>
                          <td width="180" valign="middle" class="subheading">Nombre de usuario</td>
                          <td width="173" valign="middle"><label for="nuevoLogin"></label>
                          <input name="nuevoLogin" type="text" class="tituloscentros"  id="nuevoLogin" value="<?php echo strtolower($usuario[0]['login']);?>" readonly>
                          <div id="result-username"></div>
                          </td>
                        </tr>
                        <tr>
                          <td height="55"  align="center" valign="middle" class="subheading"><strong>2</strong></td>
                          <td valign="middle" class="subheading"><p>Ingrese su nueva clave</p>
                          <p class="prod_golive">(deje en blanco si no desea alterar la clave)
                            <input name="nuevoPasswordx" type="hidden" id="nuevoPasswordx" value="<?php echo $usuario[0]['password']?>">
                          </p></td>
                          <td valign="middle"><input name="nuevoPassword" type="password" class="tituloscentros" id="nuevoPassword"></td>
                        </tr>
                        <tr>
                          <td height="54"  align="center" valign="middle" class="subheading"><strong>3</strong></td>
                          <td valign="middle" class="subheading"><p>vuelva a ingresar la clave</p>
                          <p><span class="prod_golive">(deje en blanco si no desea alterar la clave)</span></p></td>
                          <td valign="middle"><input name="nuevoPasswordConf" type="password" class="tituloscentros" id="nuevoPasswordConf">
                          
                          </td>
                        </tr>
                        <tr>
                          <td height="31" colspan="3"  align="center" valign="middle" class="inputbts">Datos Personales del Usuario</td>
                        </tr>
                        <tr>
                          <td  align="center" valign="middle" class="subheading"><strong>4</strong></td>
                          <td valign="middle" class="subheading">Nombres del usuario</td>
                          <td valign="middle"><input name="nombreUsuario" type="text" class="tituloscentros" id="nombreUsuario" value="<?php echo $usuario[0]['nombre'] ?>"></td>
                        </tr>
                        <tr>
                          <td  align="center" valign="middle" class="subheading"><strong>5</strong></td>
                          <td valign="middle" class="subheading">Apellido Paterno</td>
                          <td valign="middle"><input name="aPaternoUsuario" type="text" class="tituloscentros" id="aPaternoUsuario" value="<?php echo $usuario[0]['apaterno'] ?>"></td>
                        </tr>
                        <tr>
                          <td  align="center" valign="middle" class="subheading"><strong>6</strong></td>
                          <td valign="middle" class="subheading">Apellido Materno</td>
                          <td valign="middle"><input name="aMaternoUsuario" type="text" class="tituloscentros" id="aMaternoUsuario" value="<?php echo $usuario[0]['amaterno'] ?>"></td>
                        </tr>
                        <tr>
                          <td height="33"  align="center" valign="middle" class="subheadingbold">7</td>
                          <td height="33" class="subheading">Estado</td>
                          <td height="33" class="tituloscentros" ><label for="select"></label>
                            <select name="estado" size="1" class="tituloscentros" id="estado">
                            <?php
                            $estado = $usuario[0]['estado'];
							if($estado == 1)
							{
								echo "<option value='1'>habilitado</option>";	
								echo "<option value='0'>no habilitado</option>";
							}
							else
							{
								echo "<option value='0'>no habilitado</option>";
								echo "<option value='1'>habilitado</option>";
							}
							?>                              
                          </select></td>
                        </tr>
                        <tr>
                          <td height="33" colspan="3"  align="center" valign="middle" class="inputbts">Seleccion de Privilegios de Acceso al Sistema</td>
                        </tr>
                        <tr>
                          <td colspan="3"  align="center" valign="middle" class="menuhmlft2lines"><table width="450" border="0">
                            <tr class="bgpub">
                              <td width="31" align="center" valign="middle">&nbsp;</td>
                              <td width="48" align="center" valign="middle">Seleccion</td>
                              <td width="236" align="center" valign="middle">Privilegio del sistema</td>
                              <td width="107" align="center" valign="middle">Modulo/categoria</td>
                            </tr>
                            <?php								
							for($i = 0; $i < count($privilegios); $i++ )
							{
							//comprando listas $ListaPrivilegios,$ListaPrivilegiosUsuario
							//" checked";
								$chk="";
								for($j = 0; $j < count($privilegiosUsuario); $j++)
								{
									if($privilegios[$i]['id'] == $privilegiosUsuario[$j]['id'])
									{
										$chk=" checked";
										break;	
									}
								}										
								echo "<tr>";
								echo "<td align ='center'><img src='../img/".$privilegios[$i]['image']."'width='20' height='20' /></td>";
								echo "<td align ='center'><input name='newPrivilegio[]' type='checkbox' id='newPrivilegio' value='".$privilegios[$i]['id']."'".$chk."></td>";
								echo "<td>".$privilegios[$i]['label']."</td>";
								echo "<td align ='center'>".strtoupper($privilegios[$i]['grupo'])."</td>";					
								echo "</tr>";								
							}
                			?>
                        </table></td>
                        </tr>
                        <tr>
                          <td  align="center" valign="middle" class="menuhmlft2lines">&nbsp;</td>
                          <td valign="middle" class="menuhmlft2lines">&nbsp;</td>
                          <td valign="middle">&nbsp;</td>
                        </tr>
                        <tr>
                          <td  align="center" valign="middle" class="menuhmlft2lines">&nbsp;</td>
                          <td valign="middle" class="menuhmlft2lines"><input name="login" type="hidden" id="login" value="<?php echo $login; ?>"></td>
                          <td valign="middle" align="right"><input name="bntGuardarUsuario" type="submit" class="tituloscentros" id="bntGuardarUsuario" value="Grabar Datos Usuario"></td>
                        </tr>
                      </table>
                    </form></td>
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