<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form</title>
  </head>
  <body>
      <form name="form1" action="getForm.php" method="post">
        Ingresa número: <input type="text" name="num" />
        <br>
        <br>
        Elegir acción:
        <select name="operacion">
          <option value="1">Sumar</option>
          <option value="2">Restar</option>
          <option value="3">Multiplicar</option>
        </select>
        <br>
        <br>
        <input type="submit" name="btnEnviar" value="Mostrar tabla" />
      </form>
  </body>
</html>
