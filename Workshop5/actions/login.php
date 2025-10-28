<?php
session_start();
include('../common/connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        header("Location: /index.php?error=empty_fields");
        exit();
    }

    $sql = "SELECT id, username, password, name, lastName, role, status 
            FROM users 
            WHERE username = ? 
            LIMIT 1";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['status'] !== 'active') {
            header("Location: /index.php?error=inactive");
            exit();
        }


        if (md5($password) === $row['password']) {

            $update = "UPDATE users SET last_login_datetime = NOW() WHERE id = ?";
            $stmtUpdate = mysqli_prepare($conn, $update);
            mysqli_stmt_bind_param($stmtUpdate, "i", $row['id']);
            mysqli_stmt_execute($stmtUpdate);

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstname'] = $row['name'];
            $_SESSION['role'] = $row['role'];

            header("Location: /pages/dashboard.php");
            exit();
        } else {
            header("Location: /index.php?error=bad_credentials");
            exit();
        }
    } else {
        header("Location: /index.php?error=user_not_found");
        exit();
    }

    mysqli_close($conn);
} else {
    header("Location: /index.php");
    exit();
}
?>
