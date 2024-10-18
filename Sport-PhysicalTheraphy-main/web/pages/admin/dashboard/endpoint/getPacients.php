<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); // Permitir todos los orígenes
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require 'con.php'; // Incluye el archivo de conexión
$conn = connection();
try {
    $sql = "SELECT * FROM pacientes WHERE estado_e = 1 ORDER BY id DESC;";
    $stmt = $conn->prepare($sql);

    if(!$stmt->execute()){
        echo json_encode([
            'state' => false,
            'message' => 'Error en la ejecutacion de la consulta'
        ]);
    }
    $result = $stmt->get_result();
//    foreach ( $result->fetch_all(MYSQLI_ASSOC) as $key => $value) {
//        echo json_encode($value) . '<br>';
//    }
    if($result->num_rows > 0){
        echo json_encode([
            "state" => true,
            "data" => $result->fetch_all(MYSQLI_ASSOC)
        ]);
    }else{
        echo json_encode([
            'state' => false,
            'message' => 'No se encontraron resultados en la base de datos.'
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'state' => false,
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ]);
}
$conn = null;
?>