<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar usuario</title>
</head>
<body>
  <form action="registerDB.php" method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br><br>
    
    <label>Apellido:</label>
    <input type="text" name="apellido" required><br><br>

    <select name="id_provincia" required>
      <?php include 'provincias.php'; ?>
    </select>
    
    <button type="submit">Guardar</button>
    
  </form>
</body>
</html>