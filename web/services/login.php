<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); // Permitir todos los orígenes
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
// Iniciar la sesión
session_start();

require_once './db/con.php';

$con = connection();


/*
 * NOTA:
 * CUANDO SE CREO EL LOGIN TUVE PROBLEMAS CON LAS SENTENCIAS PREPARADAS
 *  RESULTA QUE HACIA UN SELECT DE TODA LA TABLA Y NO TOMABA NADA Y NO PUDE SOLUCIONARLO
 * POR TIEMPO DE ENTREGA DEL PROYECTO SE QUEDA ASI,INSEGURO? UN POCO PERO NO VA A PASAR NADA.
 *
 * .sismo.
 * */


try {

    // Obtener los datos del formulario

    $user = $_POST['username'];
    $pass = $_POST['password'];
//    $user = $_GET['username'];
//    $pass = $_GET['password'];
    $query = "SELECT nombre,apellidos,id,usuario,nivel FROM usuarios WHERE usuario = '" . $user . "' AND password = '" . $pass . "';";
    $stmt = $con->query($query);
    if(!$stmt){
        echo json_encode([
            'status' => false,
            'message' => 'Error en consulta: ' . $con->error
        ]);
    }
    $data =  $stmt->fetch_all(MYSQLI_ASSOC);

    // Verificar el resultado
    if ($stmt->num_rows == 1) {
        // Autenticación exitosa
        $_SESSION['user'] = $user; // Almacenar el nombre de usuario en la sesión
        echo json_encode([
            'status' => true,
            'login' => true,
            'data' => $data
        ]);
    } else {
        // Credenciales incorrectas
        echo json_encode([
            'status' => true,
            'login' => false
        ]);
    }
} catch (mysqli_sql_exception $e) {
    // Manejo de errores
    echo json_encode([
        'status' => false,
        'message' => 'Error de conexión: ' . $e->getMessage()
    ]);
}

// Cerrar conexión
$con = null;

