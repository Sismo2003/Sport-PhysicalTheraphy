<?php
require 'conexion.php';

// Obtener el ID del paciente
$pacienteId = $_POST['codigo1'] ?? null;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar si se proporcionó un ID
if (!$pacienteId) {
    echo json_encode(['success' => false, 'message' => 'ID de paciente no proporcionado.']);
    exit();
}
// Crear un array con los datos proporcionados en el formulario
$campos = [
    'quirurgicos' => $_POST['antecedentes-quirurgicos'] ?? null,
    'patologicos' => $_POST['antecedentes-patologicos'] ?? null,
    'alcohol' => $_POST['alcohol'] ?? null,
    'fuma' => $_POST['fuma'] ?? null,
    'estupefaciente' => $_POST['estupefaciente'] ?? null,
    'medicamentos' => $_POST['medicamentos'] ?? null,
    'sintomas' => $_POST['sintomas'] ?? null,
    'mecanismo' => $_POST['mecanismo'] ?? null,
    'estudios' => $_POST['estudios'] ?? null,
    'hallazgos' => $_POST['hallazgos'] ?? null,
    'diagnostico' => $_POST['diagnostico'] ?? null,
    'tx_cubiculo_1' => $_POST['tx-cubiculo'] ?? null,
    'tx_cubiculo_2' => $_POST['tx-cubiculo-2'] ?? null,
    'tx_cubiculo_3' => $_POST['tx-cubiculo-3'] ?? null,
    'tx_cubiculo_4' => $_POST['tx-cubiculo-4'] ?? null,
    'tx_gym_1' => $_POST['tx-gym'] ?? null,
    'tx_gym_2' => $_POST['tx-gym-2'] ?? null,
    'tx_gym_3' => $_POST['tx-gym-3'] ?? null,
    'tx_gym_4' => $_POST['tx-gym-4'] ?? null,
    'tx_otros_1' => $_POST['tx-otros'] ?? null,
    'tx_otros_2' => $_POST['tx-otros-2'] ?? null,
    'tx_otros_3' => $_POST['tx-otros-3'] ?? null,
    'tx_otros_4' => $_POST['tx-otros-4'] ?? null,
    'rodilla' => $_POST['rodilla'] ?? null,
    'hombro' => $_POST['hombro'] ?? null,
    'pie' => $_POST['pie'] ?? null,
    'mano' => $_POST['mano'] ?? null,
    'codo' => $_POST['codo'] ?? null,
    'espalda' => $_POST['espalda'] ?? null,
    'gluteo' => $_POST['gluteo'] ?? null,
    'cuadriceps' => $_POST['cuadriceps'] ?? null,
    'ingle' => $_POST['ingle'] ?? null,
    'aductor' => $_POST['aductor'] ?? null,
    'cervical' => $_POST['cervical'] ?? null,
    'bicep' => $_POST['bicep'] ?? null,
    'otros' => $_POST['otros'] ?? null,
    'otros_txt' => $_POST['otros_txt'] ?? null,
    'tobillo' => $_POST['tobillo'] ?? null,
    'dorsal' => $_POST['dorsal'] ?? null,
    'pectoral' => $_POST['pectoral'] ?? null,
    'fecha_inicio' => $_POST['fecha_inicio'] ?? null,
    'fecha_primera_consulta' => $_POST['fecha_primera_consulta'] ?? null,
    'fecha_diagnostico' => $_POST['fecha_diagnostico'] ?? null,
    'enfermedad_1' => $_POST['enfermedad_1'] ?? null,
    'accidente_1' => $_POST['accidente_1'] ?? null,
    'descripcion_tratamiento' => $_POST['descripcion_tratamiento'] ?? null,
    'congenito' => $_POST['congenito'] ?? null,
    'adquirido' => $_POST['adquirido'] ?? null,
    'agudo' => $_POST['agudo'] ?? null,
    'cronico' => $_POST['cronico'] ?? null
];



// Filtrar campos nulos y vacíos
$campos = array_filter($campos, function ($value) {
    return $value !== null && $value !== '';
});



// Si no hay campos para actualizar, retornar error
if (empty($campos)) {
    echo json_encode(['success' => false, 'message' => 'No hay datos para actualizar.']);
    exit();
}



// Construir la consulta SQL dinámicamente
$set = [];
foreach ($campos as $campo => $valor) {
    if ($campo !== 'codigo') {  // Excluir el campo de código de la actualización
        $set[] = "$campo = :$campo";
    }
}

$sql = "UPDATE historial_clinico SET " . implode(', ', $set) . " WHERE codigo = :pacienteId ";

try {
    $stmt = $conn->prepare($sql);

    // Agregar el ID del paciente a los parámetros
    $campos['pacienteId'] = $pacienteId;

    // Ejecutar la consulta
    $stmt->execute($campos);

    // Verificar si se actualizó algún registro
    if ($stmt->rowCount()) {
        echo json_encode(['success' => true, 'message' => 'Archivo actualizado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se actualizó ningún campo.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
}
