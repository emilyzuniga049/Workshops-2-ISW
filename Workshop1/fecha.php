<?php
  // Definir zona horaria (ejemplo: Costa Rica)
  date_default_timezone_set("America/Costa_Rica");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Fecha y Hora con PHP</title>
</head>
<body>
  <h1>Fecha y Hora actuales</h1>
  <p>
    <?php
      echo "Hoy es " . date("d/m/Y") . " y la hora actual es " . date("H:i:s");
    ?>
  </p>
</body>
</html>