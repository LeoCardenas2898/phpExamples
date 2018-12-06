<?php
	include_once("./inc/formGeneral.php");
	class formLogin extends formGeneral
	{
		public function formLoginShow()
		{
		?>
        	<html>
            <?php
				$this -> headLogin("autenticacion de usuario");
            ?>  
            <link href="./css/stylo.css" rel="stylesheet" type="text/css" />   
            <link href="../css/stylo.css" rel="stylesheet" type="text/css" />          
            <style type="text/css">
            body {	background-image: url(./img/patronFondo.jpg);background-repeat: 0,0;}
            </style>
            <body>
            <p>&nbsp;</p>
            <p>&nbsp;</p>            
            <p>&nbsp;</p>            
            <p>&nbsp;</p>            
            <p>&nbsp;</p>            
            <p>&nbsp;</p>            
            <p>&nbsp;</p>
            <form name="form1" method="post" action="./securityModule/getLogin.php">
  <table width="450" border="0" align="center">
                    <tr>
                      <td height="100" colspan="5" align="center" class="tituloscentros" >Autenticacion de Usuario</td>
                    </tr>
                    <tr>
                      <td width="101" rowspan="2" align="center" ><img src="./img/usuario.png" alt="" width="50" height="50"></td>
                      <td colspan="4" class="tituloscentros" >Usuario:</td>
                    </tr>
                    <tr>
                      <td colspan="4" ><label for="USUARIO"></label>
                      <input name="login" type="text" class="tituloscentros" id="login"></td>
                    </tr>
                    <tr>
                      <td rowspan="2" align="center" ><img src="./img/password.png" alt="" width="50" height="50"></td>
                      <td colspan="4" class="tituloscentros"  >Password:</td>
                    </tr>
                    <tr>
                      <td colspan="4" ><label for="PASSWORD"></label>
                      <input name="password" type="password" class="tituloscentros" id="password"></td>
                    </tr>
                    <tr>
                      <td height="52" align="right">&nbsp;</td>
                      <td width="47" align="right">&nbsp;</td>
                      <td width="187" align="right"><input name="LogIn" type="submit" class="tituloscentros" id="LogIn" value="LogIn"></td>
                      <td width="75" align="right">&nbsp;</td>
                      <td width="18" align="right">&nbsp;</td>
                    </tr>
                  </table>
            </form>                       
            <?php $this -> footLogin();?>
            </span>
            </body>
            </html>
        <?php	
		}	
	}
?>



