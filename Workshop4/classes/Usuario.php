<?php
require_once __DIR__ . '/Database.php';

class Usuario {
  private string $nombre;
  private string $apellido;
  private int $idProvincia;

  public function __construct($nombre, $apellido, $idProvincia) {
    $this->nombre = trim($nombre);
    $this->apellido = trim($apellido);
    $this->idProvincia = (int)$idProvincia;
  }

  public function getNombre() { return $this->nombre; }
  public function getApellido() { return $this->apellido; }
  public function getIdProvincia() { return $this->idProvincia; }


  public function guardar(): bool {
    $sql = "INSERT INTO usuario (Nombre, Apellido, id_provincia) VALUES (?, ?, ?)";
    $conn = Database::get();
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('ssi', $this->nombre, $this->apellido, $this->idProvincia);

    $ok = $stmt->execute();
    if (!$ok) {
      $error = $stmt->error;
      $stmt->close();
      throw new RuntimeException("Error al guardar usuario: " . $error);
    }

    $stmt->close();
    return true;
  }
}
