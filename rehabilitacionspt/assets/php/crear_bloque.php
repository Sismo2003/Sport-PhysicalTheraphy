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

header('Content-Type: application/json');

if (isset($_POST['codigo1'])) {
    $codigo = $_POST['codigo1'];
    $bloque = $_POST['numeroBloqueCampo'];
    $cubiculo = $_POST['cubiculo'] ?? '';
    $gimnasio = $_POST['gimnasio'] ?? '';
    $inicion = $_POST['inicion'] ?? '';
    $final = $_POST['final'] ?? '';
    $notas = $_POST['notas'] ?? '';

    // Primero, obtén el número actual de bloques para el código dado
    $sql = "SELECT COUNT(*) AS total FROM hallazgosClinicos WHERE paciente = :codigo";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $numeroBloques = (int)$row['total'];

        // Calcula el nuevo número de bloque
        $numeroBloque = $numeroBloques + 1;

        // Inserta el nuevo bloque
        $sql = "INSERT INTO hallazgosClinicos (
            paciente, bloque, cubiculo, gimnasio, inicion, final, notas
        ) VALUES (
            :codigo, :bloque, :cubiculo, :gimnasio, :inicion, :final, :notas
        )";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':bloque', $numeroBloque);
        $stmt->bindParam(':cubiculo', $cubiculo);
        $stmt->bindParam(':gimnasio', $gimnasio);
        $stmt->bindParam(':inicion', $inicion);
        $stmt->bindParam(':final', $final);
        $stmt->bindParam(':notas', $notas);

        $success = $stmt->execute();

        if ($success) {
            echo json_encode(['success' => true, 'message' => 'Datos insertados en bloque exitosamente.', 'numeroBloque' => $numeroBloque]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al insertar datos']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error en la consulta: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'codigo1 no fue enviado']);
}
