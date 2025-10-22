<?php
require_once __DIR__ . '/classes/Provincia.php';
$provincias = Provincia::obtenerTodas();

?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="utf-8"><title>Registro</title></head>
<body>
  <h1>Registro de Usuario con POO</h1>

  <form action="RegisterDB.php" method="post">
    <label>Nombre:</label>
    <input name="nombre" required><br><br>

    <label>Apellido:</label>
    <input name="apellido" required><br><br>

    <label>Provincia:</label>
    <select name="id_provincia" required>
      <?php foreach ($provincias as $p): ?>
        <option value="<?= $p->getId() ?>">
          <?= htmlspecialchars($p->getNombre(), ENT_QUOTES, 'UTF-8') ?>
        </option>
      <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Registrar</button>
  </form>
</body>
</html>
