<?php
header('Content-Type: application/json');

// Iniciar la sesión
session_start();

require_once './db/con.php';
$con =connection();

try {
    // Crear conexión con PDO
    
    // Obtener los datos del formulario
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Consultar la base de datos usando una consulta preparada
    $sql = "SELECT * FROM usuarios WHERE usuario = :username AND password = :password";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':password', $pass);
    $stmt->execute();

    // Verificar el resultado
    if ($stmt->rowCount() > 0) {
        // Autenticación exitosa
        $_SESSION['user'] = $user; // Almacenar el nombre de usuario en la sesión
        echo json_encode(['success' => true]);
    } else {
        // Credenciales incorrectas
        echo json_encode(['error' => false, 'message' => 'Usuario o contraseña incorrectos.']);
    }
} catch (PDOException $e) {
    // Manejo de errores
    echo json_encode(['error' => false, 'message' => 'Error de conexión: ' . $e->getMessage()]);
}

// Cerrar conexión
$con = null;
?>

