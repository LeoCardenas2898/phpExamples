<?php
	include_once("../inc/formGeneral.php");
	class formMenuUsuario extends formGeneral
	{
		public function formMenuUsuarioShow($login,$listaPrivilegios)
		{
		?>
        	<html>
            <?php
				$this -> headLogin("Menu principal: bienvenido");
            ?>  
            <link href="./css/stylo.css" rel="stylesheet" type="text/css" />   
            <link href="../css/stylo.css" rel="stylesheet" type="text/css" /> 
            
            <style type="text/css">
            body {	background-image: url(../img/patronFondo.jpg);background-repeat: 0,0;}
            </style>
            <body>
            <?php
            //obtener vector lista de los diferentes modulos de provilegios del usuario
			$contModulos = 0;
			$listaModulos[$contModulos] = $listaPrivilegios[0]['grupo'];
			for($contFilas = 1; $contFilas < count($listaPrivilegios); $contFilas++)
			{
					if(strcmp($listaModulos[$contModulos],$listaPrivilegios[$contFilas]['grupo']) != 0)
					{
						$flagExiste = 0;
						for($contVerifica = 0; $contVerifica < count($listaModulos); $contVerifica++)
						{
							if(strcmp($listaModulos[$contVerifica],$listaPrivilegios[$contFilas]['grupo']) == 0)
							{
								$flagExiste = 1;
								break;	
							}												
						}
						if($flagExiste == 0)
						{
							$contModulos += 1;	
							$listaModulos[$contModulos] = $listaPrivilegios[$contFilas]['grupo'];
						}
					}
			}
			/*for($i=0;$i<count($listaModulos);$i++)
				echo $listaModulos[$i]."<br>";*/						
			?>
                  
            <table width="600" border="0" align="center">
              <tr>
                <td colspan="3" align="center" class="tituloscentros">Menu Principal del Sistema</td>
              </tr>
              <tr>
                <td height="31" colspan="3"><hr></td>
              </tr>
              <tr>
                <td colspan="2"><p>Usuario Activo: <?php echo strtoupper($login);?></p>
                <p>Fecha: <?php //echo date('l').", ".date('d').date('S')." ".date('F')." ".date('Y');?></p></td>
                <td width="177">&nbsp;</td>
              </tr>
              <tr>
                <td height="32" colspan="3"><hr></td>
              </tr>
              <tr>
                <td colspan="3">
                <?php
                $contModulos = 0;
				$contLista = 0;
				$tope = intval(count($listaModulos)/2+0.5);				
				echo "<table width='600' border=0 align='center'><tr>";
				do{
					echo "<td width='300' valign='top'>";
					$i=0;
					echo "<strong class='cot-titulobolsa'>".strtoupper($listaModulos[$contModulos])."</strong><br>";
					do{
						if(strcmp($listaModulos[$contModulos],$listaPrivilegios[$contLista]['grupo']) == 0)
						{
							echo "<form method='post' action='".$listaPrivilegios[$contLista]['path']."'>";
							echo "<input type='hidden' name='login' value='".$login."'>";
							echo "<input type=image src='../img/".$listaPrivilegios[$contLista]['image']."' width='20' height='20'>";
							echo "  ".ucfirst($listaPrivilegios[$contLista]['label']);							
							echo "</form>";								
						}
						else
						{
							$contModulos++;
							$contLista--;
							$i = $contModulos;
							echo "<br>";
							if($i<$tope) 
							{
								echo "<strong class='cot-titulobolsa'>".strtoupper($listaModulos[$contModulos])."</strong><br>";
							}
						}
						$contLista++;
					}while($i<$tope);
					echo "</td>";
				}while($contLista < count($listaPrivilegios));
				echo "</tr></table>";
				?>
                </td>
              </tr>
              <tr>
                <td height="39" colspan="3"><hr></td>
              </tr>
              <tr>
                <td width="189">&nbsp;</td>
                <td width="220" align="center" valign="middle">
                	
                 </td>
                <td valign="middle" align="right"><form action='../index.php' method='post'>
						<input type='submit' value='salir del sistema'>
					</form></td>
              </tr>
            </table>
            <br>              
            <?php $this -> footLogin();?>            
            </body>
            </html>
        <?php	
		}	
	}
?>



