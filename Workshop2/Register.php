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
    
    <label>Correo:</label>
    <input type="email" name="correo" required><br><br>

    <label>Telefono:</label>
    <input type="text" name="telefono" required><br><br>
    
    <button type="submit">Guardar</button>
    
  </form>
</body>
</html>