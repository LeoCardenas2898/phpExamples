<?php
  /* getForm.php */
  //Si esta seleccionado
  if(isset($_POST['btnEnviar'])){
    $num = trim($_POST['num']);
    $operacion = $_POST['operacion'];
    switch($operacion){
      case 1:
        for ($i=0; $i<=12; $i++){
          echo $i . " + " . $num . " = " . ($i+$num) . "<br>";
        }
        break;
      case 2:
        for ($i=0; $i<=12; $i++){
          echo $i . " - " . $num . " = " . ($i-$num) . "<br>";
        }
        break;
      case 3:
        for ($i=0; $i<=12; $i++){
          echo $i . " * " . $num . " = " . ($i*$num) . "<br>";
        }
        break;
    }

  }else{
    echo "Acceso no permitido" . "<br>";
    echo "<a href='form.php'>Acceso Correcto</a>";
  }
 ?>
