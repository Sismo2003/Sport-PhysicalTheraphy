<?php
$servername = "5.161.211.225";
$username = "root";
$password = "vicidialnow";
$database = "spt";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Conexión fallida: ' . $e->getMessage()]);
    exit();
}
