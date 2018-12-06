<?php
  class formLogin{
    public function formLoginShow(){
      ?>
       <!DOCTYPE html>
       <html lang="es" dir="ltr">
         <head>
           <meta charset="utf-8">
           <title>Login usuario</title>
         </head>
         <body>
           <form class="fLogin" action="getLogin.php" method="post">
              Usuario: <input type="text" name="login" /><br><br>
              Contraseña: <input type="password" name="password" /><br><br>
              <input type="submit" name="btnLogin" value="Login" />
           </form>

         </body>
       </html>
    <?php
  }
}
