<?php
require 'conexion.php';

// Obtener el ID del paciente
$pacienteId = $_POST['paciente_id'] ?? null;

// Verificar si se proporcionó un ID
if (!$pacienteId) {
    echo json_encode(['success' => false, 'message' => 'ID de paciente no proporcionado.']);
    exit();
}

// Crear un array con los datos proporcionados en el formulario
$campos = [
    'codigo' => $_POST['codigo'] ?? null,
    'nombre' => $_POST['nombre'] ?? null,
    'apellidos' => $_POST['apellidos'] ?? null,
    'edad' => $_POST['edad'] ?? null,
    'direccion' => $_POST['direccion'] ?? null,
    'colonia' => $_POST['colonia'] ?? null,
    'ciudad' => $_POST['ciudad'] ?? null,
    'estado' => $_POST['estado'] ?? null,
    'cp' => $_POST['cp'] ?? null,
    'telefono' => $_POST['telefono'] ?? null,
    'celular' => $_POST['celular'] ?? null,
    'correo_electronico' => $_POST['correo_electronico'] ?? null,
    'comentarios' => $_POST['comentarios'] ?? null,
    'rfc' => $_POST['rfc'] ?? null,
    'razon_social' => $_POST['razon_social'] ?? null,
    'dom_fiscal' => $_POST['dom_fiscal'] ?? null,
    'col_fiscal' => $_POST['col_fiscal'] ?? null,
    'cd_fiscal' => $_POST['cd_fiscal'] ?? null,
    'edo_fiscal' => $_POST['edo_fiscal'] ?? null,
    'cp_fiscal' => $_POST['cp_fiscal'] ?? null,
    'correo_fiscal' => $_POST['correo_fiscal'] ?? null,
    'medico' => $_POST['medico'] ?? null,
    'aseguradora' => $_POST['aseguradora'] ?? null
];

// Filtrar campos nulos
$campos = array_filter($campos);

// Si no hay campos para actualizar, retornar error
if (empty($campos)) {
    echo json_encode(['success' => false, 'message' => 'No hay datos para actualizar.']);
    exit();
}

// Construir la consulta SQL dinámicamente
$set = [];
foreach ($campos as $campo => $valor) {
    $set[] = "$campo = :$campo";
}

$sql = "UPDATE pacientes SET " . implode(', ', $set) . " WHERE id = :paciente_id";

try {
    $stmt = $conn->prepare($sql);
    $campos['paciente_id'] = $pacienteId;
    $stmt->execute($campos);

    if ($stmt->rowCount()) {
        echo json_encode(['success' => true, 'message' => 'Paciente actualizado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se actualizó ningún campo.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
}
