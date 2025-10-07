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
    $provincia = $_POST['id_provincia']; 


    $sql = "INSERT INTO usuario (Nombre, Apellido, id_provincia) VALUES ('$nombre', '$apellido', '$provincia')";

    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $conn->error;
    }else{
      header("Location: login.php?name=$nombre");
      exit();
    }
}

$conn->close();
?>