<?php
require_once __DIR__ . '/Database.php';

class Provincia {
  private int $id;
  private string $nombre;

  public function __construct(int $id, string $nombre) {
    $this->id = $id;
    $this->nombre = $nombre;
  }

  public function getId(): int { return $this->id; }
  public function getNombre(): string { return $this->nombre; }

  public static function obtenerTodas(): array {
    $sql = "SELECT Id_provincia, Provincia FROM provincias ORDER BY Provincia";
    $res = Database::get()->query($sql);

    if (!$res) {
      throw new RuntimeException("Error al consultar provincias: " . Database::get()->error);
    }

    $provincias = [];
    while ($row = $res->fetch_assoc()) {
      $provincias[] = new Provincia((int)$row['Id_provincia'], $row['Provincia']);
    }
    $res->free();

    return $provincias;
  }

  public static function obtenerIdPorNombre(string $nombre): ?int {
    $sql = "SELECT Id_provincia FROM provincias WHERE Provincia = ?";
    $stmt = Database::get()->prepare($sql);
    if (!$stmt) throw new RuntimeException("Prepare: " . Database::get()->error);
    
    $stmt->bind_param('s', $nombre);
    $stmt->execute();
    $stmt->bind_result($id);
    $ok = $stmt->fetch();
    $stmt->close();

    return $ok ? (int)$id : null;
  }
}


