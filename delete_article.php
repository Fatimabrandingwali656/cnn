<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin.php");
    exit;
}

include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM articles WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . $conn->error;
}
?>
