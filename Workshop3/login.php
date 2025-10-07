<?php
$nombre = isset($_GET['name']) ? $_GET['name'] : 'Usuario';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>login</title>
</head>
<body>
  <div class="container">
    <h1>Bienvenido</h1>
    <p><?php echo htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'); ?> !</p>
    <br>
    <button>Iniciar sesión</button>
  </div>
  </form>
</body>
</html>