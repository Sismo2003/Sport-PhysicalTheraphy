<?php
header('Content-Type: application/json');

require 'conexion.php'; // Asegúrate de que la conexión está bien configurada

try {
    if (isset($_GET['id'])) {
        $pacienteId = intval($_GET['id']);

        $sql = "SELECT * FROM pacientes WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$pacienteId]);
        $paciente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($paciente) {
            echo json_encode(['success' => true, 'paciente' => $paciente]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Paciente no encontrado']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'ID del paciente no proporcionado']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
}
