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
$codigo = $_POST['codigo-medico'] ?? '';
$nombre = $_POST['nombre-medico'] ?? '';
$apellido = $_POST['apellidos-medico"'] ?? '';
$telefono = $_POST['telefono-medico"'] ?? '';
$celular = $_POST['celular-medico'] ?? '';
$correo = $_POST['orreo-medico'] ?? '';
$direccion_medico = $_POST['direccion-medico'] ?? '';
$colonia_medico = $_POST['colonia-medico'] ?? '';
$ciudad_medico = $_POST['ciudad-medico'] ?? '';
$codigo_postal_medico = $_POST['codigo-postal-medico'] ?? '';
$estado_medico = $_POST['estado-medico'] ?? '';
$especialidad_medico = $_POST['especialidad-medico'] ?? '';
$correo_medico = $_POST['correo-medico'] ?? '';

// Consulta SQL para insertar los datos
$sql = "INSERT INTO terapeutas (codigo, nombre, apellidos, direccion, colonia, ciudad, estado, cp,  telefono, celular, correo_electronico, especialidad, fotografia)
        VALUES (:codigo, :nombre, :apellido, :direccion_medico, :colonia_medico, :ciudad_medico, :estado_medico, :codigo_postal_medico, :telefono, :celular, :correo_medico, :especialidad_medico, '/assets/img/arashmil.jpg')";

try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':codigo', $codigo);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':direccion_medico', $direccion_medico);
    $stmt->bindParam(':colonia_medico', $colonia_medico);
    $stmt->bindParam(':ciudad_medico', $ciudad_medico);
    $stmt->bindParam(':estado_medico', $estado_medico);
    $stmt->bindParam(':codigo_postal_medico', $codigo_postal_medico);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':celular', $celular);
    $stmt->bindParam(':correo_medico', $correo_medico);
    $stmt->bindParam(':especialidad_medico', $especialidad_medico);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al insertar el paciente.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
}
