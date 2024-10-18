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

// Obtener datos del formulario
$id = $_POST['id'] ?? '';
$codigo = $_POST['codigo1'] ?? '';
$fecha_hora = date('Y-m-d');
$quirurgicos = $_POST['antecedentes-quirurgicos'] ?? '';
$patologicos = $_POST['antecedentes-patologicos'] ?? '';
$alcohol = $_POST['alcohol'] ?? '';
$fuma = $_POST['fuma'] ?? '';
$estupefaciente = $_POST['estupefaciente'] ?? '';
$medicamentos = $_POST['medicamentos'] ?? '';
$sintomas = $_POST['sintomas'] ?? '';
$mecanismo = $_POST['mecanismo'] ?? '';
$estudios = $_POST['estudios'] ?? '';
$hallazgos = $_POST['hallazgos'] ?? '';
$diagnostico = $_POST['diagnostico'] ?? '';
$tx_cubiculo_1 = $_POST['tx_cubiculo_1'] ?? '';
$tx_cubiculo_2 = $_POST['tx_cubiculo_2'] ?? '';
$tx_cubiculo_3 = $_POST['tx_cubiculo_3'] ?? '';
$tx_cubiculo_4 = $_POST['tx_cubiculo_4'] ?? '';
$tx_gym_1 = $_POST['tx_gym_1'] ?? '';
$tx_gym_2 = $_POST['tx_gym_2'] ?? '';
$tx_gym_3 = $_POST['tx_gym_3'] ?? '';
$tx_gym_4 = $_POST['tx_gym_4'] ?? '';
$tx_otros_1 = $_POST['tx_otros_1'] ?? '';
$tx_otros_2 = $_POST['tx_otros_2'] ?? '';
$tx_otros_3 = $_POST['tx_otros_3'] ?? '';
$tx_otros_4 = $_POST['tx_otros_4'] ?? '';
$rodilla = $_POST['rodilla'] ?? '';
$hombro = $_POST['hombro'] ?? '';
$pie = $_POST['pie'] ?? '';
$mano = $_POST['mano'] ?? '';
$codo = $_POST['codo'] ?? '';
$espalda = $_POST['espalda'] ?? '';
$gluteo = $_POST['gluteo'] ?? '';
$cuadriceps = $_POST['cuadriceps'] ?? '';
$ingle = $_POST['ingle'] ?? '';
$aductor = $_POST['aductor'] ?? '';
$cervical = $_POST['cervical'] ?? '';
$bicep = $_POST['bicep'] ?? '';
$otros = $_POST['otros'] ?? '';
$otros_txt = $_POST['otros_txt'] ?? '';
$tobillo = $_POST['tobillo'] ?? '';
$dorsal = $_POST['dorsal'] ?? '';
$pectoral = $_POST['pectoral'] ?? '';
$fecha_inicio = $_POST['fecha_inicio'] ?? '';
$fecha_primera_consulta = $_POST['fecha_primera_consulta'] ?? '';
$fecha_diagnostico = $_POST['fecha_diagnostico'] ?? '';
$enfermedad_1 = $_POST['enfermedad_1'] ?? '';
$accidente_1 = $_POST['accidente_1'] ?? '';
$descripcion_tratamiento = $_POST['descripcion_tratamiento'] ?? '';
$congenito = $_POST['congenito'] ?? '';
$adquirido = $_POST['adquirido'] ?? '';
$agudo = $_POST['agudo'] ?? '';
$cronico = $_POST['cronico'] ?? '';


// Consulta SQL para insertar los datos
$sql = "INSERT INTO historial_clinico (
    id, codigo, fecha_hora, quirurgicos, patologicos, alcohol, fuma, estupefaciente, medicamentos, sintomas, mecanismo, estudios, hallazgos, diagnostico,
    tx_cubiculo_1, tx_cubiculo_2, tx_cubiculo_3, tx_cubiculo_4, tx_gym_1, tx_gym_2, tx_gym_3, tx_gym_4, tx_otros_1, tx_otros_2, tx_otros_3, tx_otros_4,
    rodilla, hombro, pie, mano, codo, espalda, gluteo, cuadriceps, ingle, aductor, cervical, bicep, otros, otros_txt, tobillo, dorsal, pectoral,
    fecha_inicio, fecha_primera_consulta, fecha_diagnostico, enfermedad_1, accidente_1, descripcion_tratamiento, congenito, adquirido, agudo, cronico
) VALUES (
    :id, :codigo, :fecha_hora, :quirurgicos, :patologicos, :alcohol, :fuma, :estupefaciente, :medicamentos, :sintomas, :mecanismo, :estudios, :hallazgos, :diagnostico,
    :tx_cubiculo_1, :tx_cubiculo_2, :tx_cubiculo_3, :tx_cubiculo_4, :tx_gym_1, :tx_gym_2, :tx_gym_3, :tx_gym_4, :tx_otros_1, :tx_otros_2, :tx_otros_3, :tx_otros_4,
    :rodilla, :hombro, :pie, :mano, :codo, :espalda, :gluteo, :cuadriceps, :ingle, :aductor, :cervical, :bicep, :otros, :otros_txt, :tobillo, :dorsal, :pectoral,
    :fecha_inicio, :fecha_primera_consulta, :fecha_diagnostico, :enfermedad_1, :accidente_1, :descripcion_tratamiento, :congenito, :adquirido, :agudo, :cronico
)";

try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':codigo', $codigo);
    $stmt->bindParam(':fecha_hora', $fecha_hora);
    $stmt->bindParam(':quirurgicos', $quirurgicos);
    $stmt->bindParam(':patologicos', $patologicos);
    $stmt->bindParam(':alcohol', $alcohol);
    $stmt->bindParam(':fuma', $fuma);
    $stmt->bindParam(':estupefaciente', $estupefaciente);
    $stmt->bindParam(':medicamentos', $medicamentos);
    $stmt->bindParam(':sintomas', $sintomas);
    $stmt->bindParam(':mecanismo', $mecanismo);
    $stmt->bindParam(':estudios', $estudios);
    $stmt->bindParam(':hallazgos', $hallazgos);
    $stmt->bindParam(':diagnostico', $diagnostico);
    $stmt->bindParam(':tx_cubiculo_1', $tx_cubiculo_1);
    $stmt->bindParam(':tx_cubiculo_2', $tx_cubiculo_2);
    $stmt->bindParam(':tx_cubiculo_3', $tx_cubiculo_3);
    $stmt->bindParam(':tx_cubiculo_4', $tx_cubiculo_4);
    $stmt->bindParam(':tx_gym_1', $tx_gym_1);
    $stmt->bindParam(':tx_gym_2', $tx_gym_2);
    $stmt->bindParam(':tx_gym_3', $tx_gym_3);
    $stmt->bindParam(':tx_gym_4', $tx_gym_4);
    $stmt->bindParam(':tx_otros_1', $tx_otros_1);
    $stmt->bindParam(':tx_otros_2', $tx_otros_2);
    $stmt->bindParam(':tx_otros_3', $tx_otros_3);
    $stmt->bindParam(':tx_otros_4', $tx_otros_4);
    $stmt->bindParam(':rodilla', $rodilla);
    $stmt->bindParam(':hombro', $hombro);
    $stmt->bindParam(':pie', $pie);
    $stmt->bindParam(':mano', $mano);
    $stmt->bindParam(':codo', $codo);
    $stmt->bindParam(':espalda', $espalda);
    $stmt->bindParam(':gluteo', $gluteo);
    $stmt->bindParam(':cuadriceps', $cuadriceps);
    $stmt->bindParam(':ingle', $ingle);
    $stmt->bindParam(':aductor', $aductor);
    $stmt->bindParam(':cervical', $cervical);
    $stmt->bindParam(':bicep', $bicep);
    $stmt->bindParam(':otros', $otros);
    $stmt->bindParam(':otros_txt', $otros_txt);
    $stmt->bindParam(':tobillo', $tobillo);
    $stmt->bindParam(':dorsal', $dorsal);
    $stmt->bindParam(':pectoral', $pectoral);
    $stmt->bindParam(':fecha_inicio', $fecha_inicio);
    $stmt->bindParam(':fecha_primera_consulta', $fecha_primera_consulta);
    $stmt->bindParam(':fecha_diagnostico', $fecha_diagnostico);
    $stmt->bindParam(':enfermedad_1', $enfermedad_1);
    $stmt->bindParam(':accidente_1', $accidente_1);
    $stmt->bindParam(':descripcion_tratamiento', $descripcion_tratamiento);
    $stmt->bindParam(':congenito', $congenito);
    $stmt->bindParam(':adquirido', $adquirido);
    $stmt->bindParam(':agudo', $agudo);
    $stmt->bindParam(':cronico', $cronico);

    // Ejecutar la consulta
    $stmt->execute();
    echo json_encode(['success' => true, 'message' => 'Datos insertados exitosamente.']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error al insertar datos: ' . $e->getMessage()]);
}
