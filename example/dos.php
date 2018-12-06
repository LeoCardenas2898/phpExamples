<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ejercicio 2</title>
  </head>
  <body>
    <table border="1">
      <?php
          for ($i=0; $i <= 12; $i++) {
            //El punto . concatena:
            echo "<tr>";
            echo "<td>" . $i . "</td>" . "<td>" . "x" ."</td>" . "<td>" . "2" . "</td>" . "<td>" . "=" . "</td>" . "<td>" . $i*2 . "</td>";
            echo "</tr>";
          }
       ?>
    </table>
  </body>
</html>
