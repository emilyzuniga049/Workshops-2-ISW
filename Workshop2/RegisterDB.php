<?php
$host = "localhost";   
$user = "root";        
$pass = "";            
$db   = "usuarios";    

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono   = $_POST['telefono'];

    $sql = "INSERT INTO usuarios (Nombre, Apellido, Correo, Telefono) VALUES ('$nombre', '$apellido', '$correo', '$telefono')";

    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $conn->error;
    }else{
       header("Location: Register.php");
      exit();
    }
}

$conn->close();
?>