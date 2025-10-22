<?php
class Database {
  private static ?mysqli $conn = null;

  public static function get(): mysqli {
    if (!self::$conn) {
      self::$conn = new mysqli("localhost", "root", "", "usuarios");
      if (self::$conn->connect_error) {
        die("Error de conexión: " . self::$conn->connect_error);
      }
    }
    return self::$conn;
  }
}