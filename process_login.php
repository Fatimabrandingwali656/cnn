<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === "admin" && $password === "admin123") {
    $_SESSION['loggedin'] = true;
    header("Location: dashboard.php");
} else {
    echo "Invalid credentials.";
}
?>
