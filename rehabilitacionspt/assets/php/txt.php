<?php
// archivo: verificar-tx.php
header('Content-Type: application/json');
include 'db_connection.php'; // Incluir el archivo de conexión

$codigo = $_GET['codigo'];

$sql = "SELECT * FROM historial_clinico WHERE codigo = '$codigo'";
$result = $conn->query($sql);

$response = array('tx1' => null);

if ($result->num_rows > 0) {
    $response['tx1'] = $result->fetch_assoc();
}

echo json_encode($response);
