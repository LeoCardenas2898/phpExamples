<?php
class formGeneral
{
	public function headLogin($title)
	{
		?><head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />            
            <title><?php echo ucwords(strtolower($title));?></title>
            </head>
        <?php
	}
	
	public function footLogin()
	{
		?>
        	
        	<table width="900" border="0" align="center">
              <tr>
              	<td colspan="3"  class="subheadingbold"><marquee behavior="alternate" scrolldelay="50">sistema de prueba</marquee></td>
              </tr>
            </table>              
        <?php	
	}
}
?>