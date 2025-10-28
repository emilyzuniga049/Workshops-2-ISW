<?php
include('../common/connection.php');

$hours = (int)($argv[1] ?? 0);

if ($hours <= 0) {
    echo "Uso correcto: php validateActiveSessions.php [horas]\n";
    exit;
}

$sql = "
    UPDATE users
    SET status = 'inactive'
    WHERE status = 'active'
      AND last_login_datetime IS NOT NULL
      AND TIMESTAMPDIFF(HOUR, last_login_datetime, NOW()) >= $hours
";

if (mysqli_query($conn, $sql)) {
    echo "Usuarios inactivos actualizados correctamente.\n";
    echo "Total afectados: " . mysqli_affected_rows($conn) . "\n";
} else {
    echo "Error: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);
?>
