<?php
session_start();

$admin_username = "admin"; // Ganti dengan username admin
$admin_password = "password"; // Ganti dengan password admin

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $admin_username && $password == $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_pengaduan.php");
        exit();
    } else {
        echo "Username atau password salah!";
    }
}
?>
