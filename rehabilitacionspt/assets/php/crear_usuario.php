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
$fecha_alta = date('Y-m-d');
$codigo_paciente = $_POST['codigo-paciente'] ?? '';
$nombre = $_POST['nombre-paciente'] ?? '';
$apellidos = $_POST['apellidos-paciente'] ?? '';
$telefono = $_POST['telefono-paciente'] ?? '';
$celular = $_POST['celular-paciente'] ?? '';
$edad = $_POST['edad-paciente'] ?? '';
$correo = $_POST['correo-paciente'] ?? '';
$direccion_paciente = $_POST['direccion-paciente'] ?? '';
$colonia_paciente = $_POST['colonia-paciente'] ?? '';
$ciudad_paciente = $_POST['ciudad-paciente'] ?? '';
$codigo_postal_paciente = $_POST['codigo-postal-paciente'] ?? '';
$estado_paciente = $_POST['estado-paciente'] ?? '';
$aseguradora_paciente = $_POST['aseguradora-paciente'] ?? '';
$medico_tratante_paciente = $_POST['medico-Tratante-paciente'] ?? '';
$comentarios_paciente = $_POST['comment'] ?? '';
$rfc = $_POST['rfc'] ?? '';
$razon_social = $_POST['razon-social'] ?? '';
$direccion_dos = $_POST['direccion_dos'] ?? '';
$colonia_dos = $_POST['colonia_dos'] ?? '';
$codigo_postal_dos = $_POST['codigo_postal_dos'] ?? '';
$correo_fiscal = $_POST['correo_fiscal'] ?? '';
$ciudad_dos = $_POST['ciudad_dos'] ?? '';
$estado_dos = $_POST['estado_dos'] ?? '';

// Consulta SQL para insertar los datos
$sql = "INSERT INTO pacientes (fecha_alta, codigo, nombre, apellidos, edad, direccion, colonia, ciudad, estado, cp,  telefono, celular, correo_electronico, comentarios, rfc, razon_social, dom_fiscal, col_fiscal, cd_fiscal, edo_fiscal, cp_fiscal, correo_fiscal,  fotografia, medico, aseguradora)
        VALUES (:fecha_alta, :codigo_paciente, :nombre, :apellidos, :edad, :direccion_paciente, :colonia_paciente, :ciudad_paciente, :estado_paciente, :codigo_postal_paciente, :telefono, :celular, :correo, :comentarios_paciente, :rfc, :razon_social, :direccion_dos, :colonia_dos, :ciudad_dos, :estado_dos, :codigo_postal_dos, :correo_fiscal,  '/assets/img/arashmil.jpg', :medico_tratante_paciente, :aseguradora_paciente)";

try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fecha_alta', $fecha_alta);
    $stmt->bindParam(':codigo_paciente', $codigo_paciente);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':celular', $celular);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':direccion_paciente', $direccion_paciente);
    $stmt->bindParam(':colonia_paciente', $colonia_paciente);
    $stmt->bindParam(':ciudad_paciente', $ciudad_paciente);
    $stmt->bindParam(':codigo_postal_paciente', $codigo_postal_paciente);
    $stmt->bindParam(':estado_paciente', $estado_paciente);
    $stmt->bindParam(':aseguradora_paciente', $aseguradora_paciente);
    $stmt->bindParam(':medico_tratante_paciente', $medico_tratante_paciente);
    $stmt->bindParam(':comentarios_paciente', $comentarios_paciente);
    $stmt->bindParam(':rfc', $rfc);
    $stmt->bindParam(':razon_social', $razon_social);
    $stmt->bindParam(':direccion_dos', $direccion_dos);
    $stmt->bindParam(':colonia_dos', $colonia_dos);
    $stmt->bindParam(':codigo_postal_dos', $codigo_postal_dos);
    $stmt->bindParam(':correo_fiscal', $correo_fiscal);
    $stmt->bindParam(':ciudad_dos', $ciudad_dos);
    $stmt->bindParam(':estado_dos', $estado_dos);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al insertar el paciente.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
}
