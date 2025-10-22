<?php
class Saludo {
  private string $nombre;

  public function __construct($nombre) {
    $this->nombre = trim($nombre);
  }

  public function mostrarMensaje(): string {
    if ($this->nombre === '') {
      return "¡Bienvenido, usuario!";
    }
    return "¡Hola, " . htmlspecialchars($this->nombre) . "!";
  }
}