<?php
// Habilitar la visualización de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de configuración para la conexión a la base de datos
require 'conexion.php'; // Incluye el archivo de conexión


// Obtener el valor de codigo1 del request
$codigo1 = isset($_POST['codigo1']) ? $_POST['codigo1'] : '';

if (empty($codigo1)) {
    echo json_encode(['success' => false, 'message' => 'El código no puede estar vacío.']);
    exit();
}

try {
    // Preparar la consulta para verificar si el archivo con el codigo1 existe
    $stmt = $pdo->prepare("SELECT id FROM historial_clinico WHERE codigo = :codigo1 LIMIT 1");
    $stmt->bindParam(':codigo1', $codigo1);
    $stmt->execute();

    // Verificar si se encontró un registro
    if ($stmt->rowCount() > 0) {
        // Obtener el ID del archivo
        $archivo = $stmt->fetch(PDO::FETCH_ASSOC);
        $idArchivo = $archivo['id'];

        // Devolver el ID del archivo
        echo json_encode(['success' => true, 'idArchivo' => $idArchivo]);
    } else {
        // No se encontró ningún archivo con el código proporcionado
        echo json_encode(['success' => false, 'message' => 'No se encontró ningún archivo con el código proporcionado.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error al consultar la base de datos.']);
}
