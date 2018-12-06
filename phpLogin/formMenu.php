<?php
  class formMenu {
    public function formMenuShow($login, $Privilegios){
      ?>
      <!DOCTYPE html>
      <html lang="es" dir="ltr">
        <head>
          <meta charset="utf-8">
          <title><?php echo "Usuario: ". $login; ?></title>
        </head>
        <body>
          <?php
              for($i=0; $i< count($Privilegios); $i++){
              ?>
            <form action="<?php echo $Privilegios[$i][1]; ?>" method="post">
              <input type="submit" name="btnMenu" value="<?php echo $Privilegios[$i][0]; ?>" />
              <input type="hidden" name="login" value="<?php echo $login; ?>">
            </form>
            <br>
            <?php
              }
           ?>
        </body>
      </html>
      <?php
    }
  }
 ?>
