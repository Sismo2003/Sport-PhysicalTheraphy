
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
$codigo1 = $_POST['codigo-codigo1'] ?? '';
$fecha_hora = date('Y-m-d');
$comentario = $_POST['comentario'] ?? '';


// Consulta SQL para insertar los datos
$sql = "INSERT INTO comentarios (codigo, fecha_hora, comentario) VALUES (:codigo1, :fecha_hora, :comentario)";

try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':codigo1', $codigo1);
    $stmt->bindParam(':fecha_hora', $fecha_hora);
    $stmt->bindParam(':comentario', $comentario);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al insertar el paciente.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
}
