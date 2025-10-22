<?php
require_once __DIR__ . '/classes/Saludo.php';

$nombre = $_GET['name'] ?? '';
$saludo = new Saludo($nombre);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="utf-8"><title>Login</title></head>
<body>
  <h1><?= $saludo->mostrarMensaje(); ?></h1>
  <button>Iniciar sesión</button>
</body>
</html>
