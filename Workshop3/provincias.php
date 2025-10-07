<?php
$conn = new mysqli("localhost", "root", "", "usuarios");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

$sql = "SELECT Id_provincia, Provincia FROM provincias";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['Id_provincia']}'>{$row['Provincia']}</option>";
}

$conn->close();
?>

