<?php
$host = "localhost";
$username = "ufgpujscb7ktm";
$password = "7y7bhomjelzs";
$database = "dbfhrmgelrqpvx";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
