<?php
header('Content-Type: application/json');

require 'conexion.php'; // Incluye el archivo de conexión a la base de datos

try {
    $sql = "SELECT COUNT(*) as total FROM pacientes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'total_pacientes' => $result['total']]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
}
