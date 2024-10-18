<?php
// Configuración de la conexión a la base de datos
$host = '5.161.211.225'; // Reemplaza con tu host de base de datos
$dbname = 'spt'; // Reemplaza con el nombre de tu base de datos
$username = 'root'; // Reemplaza con tu nombre de usuario de la base de datos
$password = 'vicidialnow'; // Reemplaza con tu contraseña

try {
    // Crear una nueva conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurar PDO para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar que la solicitud sea POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos enviados desde la solicitud AJAX
        $telefono = $_POST['telefono'];
        $celular = $_POST['celular'];
        $correo_electronico = $_POST['correo_electronico'];
        $comentarios = $_POST['comentarios'];
        $id_paciente = $_POST['id_paciente'];
        $fechacita = $_POST['fechacita'];
        $horacita = $_POST['horacita'];
        $categoria = $_POST['categoria'];
        $notasconsulta = $_POST['notasconsulta'];

        // Validar que los datos requeridos no estén vacíos
        if (empty($id_paciente) || empty($fechacita) || empty($horacita) || empty($categoria)) {
            echo json_encode([
                'success' => false,
                'message' => 'Faltan datos obligatorios'
            ]);
            exit;
        }

        // Preparar la consulta SQL para insertar los datos de la cita
        $sql = "INSERT INTO consulta (telefono, celular, correo, comentarios, id_paciente, fechacita, horacita, categoria, notasconsulta)
                VALUES (:telefono, :celular, :correo, :comentarios , :id_paciente, :fechacita, :horacita, :categoria, :notasconsulta)";

        // Preparar la declaración
        $stmt = $pdo->prepare($sql);

        // Ejecutar la declaración con los parámetros correspondientes
        $stmt->execute([
            ':telefono' => $telefono,
            ':celular' => $celular,
            ':correo' => $correo,
            ':comentarios' => $comentarios,
            ':id_paciente' => $id_paciente,
            ':fechacita' => $fechacita,
            ':horacita' => $horacita,
            ':categoria' => $categoria,
            ':notasconsulta' => $notasconsulta
        ]);

        // Devolver una respuesta exitosa
        echo json_encode([
            'success' => true,
            'message' => 'Cita creada exitosamente'
        ]);
    } else {
        // Si la solicitud no es POST, devolver un error
        echo json_encode([
            'success' => false,
            'message' => 'Solicitud no válida'
        ]);
    }
} catch (PDOException $e) {
    // Manejo de errores de la base de datos
    echo json_encode([
        'success' => false,
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ]);
}
