<?php
  class formMensaje {
    public function formMensajeShow($mensaje, $link){
      ?>
      <!DOCTYPE html>
      <html lang="en" dir="ltr">
        <head>
          <meta charset="utf-8">
          <title>Mensaje</title>
        </head>
        <body>
          <center><?php echo strtoupper($mensaje); ?></center>
          <br><center><?php echo $link; ?></center>
        </body>
      </html>
      <?php
    }
  }
?>
