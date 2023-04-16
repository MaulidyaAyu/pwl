<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "travel";

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

try {
    $database = new PDO("mysql:host={$server};dbname={$db}", $user, $pass);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $status = $database->getAttribute(PDO::ATTR_CONNECTION_STATUS);
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
}
?> 