<?php
require_once __DIR__ . '/classes/Usuario.php';

$nombre   = trim($_POST['nombre'] ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$idProv   = (int)($_POST['id_provincia'] ?? 0);

try {
  $usuario = new Usuario($nombre, $apellido, $idProv);
  $usuario->guardar();

  header('Location: login.php?name=' . urlencode($usuario->getNombre()));
  exit;
} catch (Throwable $e) {
  echo "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
}
