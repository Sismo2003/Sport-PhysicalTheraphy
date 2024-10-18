<?php
header('Content-Type: application/json');

require 'conexion.php'; // Incluye el archivo de conexión

try {
    $sql = "SELECT * FROM pacientes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Iterar sobre los resultados para verificar si la foto existe
    foreach ($result as &$row) {
        $fotografia = $row["fotografia"];
        if (!file_exists("../../foto/" . $fotografia)) {
            $row["fotografia"] = "http://5.161.211.225/v3/foto/no-photo.jpg";  // Asignar imagen predeterminada
        } else {
            $row["fotografia"] = "http://5.161.211.225/v3/foto/" . $fotografia; // Asignar la ruta completa si existe la imagen
        }
    }

    echo json_encode($result);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
}
