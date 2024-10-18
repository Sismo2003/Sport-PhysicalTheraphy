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

    try {
        // Consulta para verificar si existen bloques para el código dado
        $sql = "SELECT COUNT(*) AS total FROM hallazgosClinicos WHERE paciente = :codigo";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $numeroBloques = (int)$row['total'];

        echo json_encode([
            'success' => true,
            'tieneBloques' => $numeroBloques > 0,
            'numeroBloque' => $numeroBloques // Incluye el número de bloques en la respuesta
        ]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error en la consulta: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'codigo1 no fue enviado']);
}
