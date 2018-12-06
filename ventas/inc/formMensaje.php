<?php
	include_once("formGeneral.php");
	class formMensaje extends formGeneral
	{
		public function formMensajeAbortoShow($mensaje,$link)
		{
			?>
<html>
            <?php
				$this -> headLogin("Mensaje del sistema");
            ?>  
            <link href="./css/stylo.css" rel="stylesheet" type="text/css" />   
            <link href="../css/stylo.css" rel="stylesheet" type="text/css" />          
            <style type="text/css">
            body {	background-image: url(../img/patronMensaje.jpg); background-repeat: 0,0;}
            </style>
			<body>
            <p>&nbsp;</p>
            <p>&nbsp;</p>            
            <p>&nbsp;</p>            
            <p>&nbsp;</p>            
            <p>&nbsp;</p>            
            <p>&nbsp;</p>            
            <p>&nbsp;</p>
            <table width="500" border="0" align="center">
                  <tr>
                    <td width="367" height="73" align="center" class="tituloscentros">MENSAJE DEL SISTEMA</td>
                    <td width="117" rowspan="3" align="center" class="titulocentro2"><img src="../img/advertencia.png" width="100" height="100" /></td>
              </tr>
                  <tr>
                    <td height="75" class="tituloscentros" align="center"><?php echo ucfirst(strtolower($mensaje));?></td>
              </tr>
                  <tr>
                    <td height="63" align="right" class="titulocentro2"><?php echo $link; ?></td>
                  </tr>
</table>
            <p>
              <?php $this -> footLogin();?>
            </p>
</body>
            </html>
            <?
		}
	}
?>