<?php
header('Content-Type: application/json');

// Configuración de la base de datos
$servername = "5.161.211.225";
$username = "root";
$password = "vicidialnow";
$dbname = "spt";

try {
    // Crear conexión con PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configurar PDO para lanzar excepciones en errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener los datos del formulario
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Consultar la base de datos usando una consulta preparada
    $sql = "SELECT * FROM usuarios WHERE usuario = :username AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':password', $pass);
    $stmt->execute();

    // Verificar el resultado
    if ($stmt->rowCount() > 0) {
        // Autenticación exitosa
        echo json_encode(['success' => true]);
    } else {
        // Credenciales incorrectas
        echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos.']);
    }
} catch (PDOException $e) {
    // Manejo de errores
    echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $e->getMessage()]);
}

// Cerrar conexión
$pdo = null;
