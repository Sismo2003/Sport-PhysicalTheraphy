<?php
// Incluir la conexión a la base de datos
require 'conexion.php';

// Verificar si se recibió el ID del paciente
if (isset($_POST['pacienteId'])) {
    $pacienteId = $_POST['pacienteId'];

    // Preparar la consulta para actualizar el estado del paciente
    $query = "UPDATE pacientes SET estado_e = 0 WHERE id = :id";

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $pacienteId, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "El estado del paciente ha sido actualizado a 0.";
        } else {
            echo "No se encontró el paciente o no se pudo actualizar.";
        }
    } catch (PDOException $e) {
        echo "Error al actualizar el estado: " . $e->getMessage();
    }

    // Cerrar la conexión (opcional)
    $conn = null;
} else {
    echo "No se recibió el ID del paciente.";
}
