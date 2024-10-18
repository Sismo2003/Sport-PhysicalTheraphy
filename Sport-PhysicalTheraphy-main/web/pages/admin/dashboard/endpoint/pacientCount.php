<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); // Permitir todos los orígenes
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require 'con.php'; // Incluye el archivo de conexión a la base de datos
$con = connection();
function expedientes($con){
    // Consulta para contar el total de expedientes en historial_clinico
    $sqlExpedientes = "SELECT COUNT(id) as total_expedientes FROM historial_clinico";
    $stmtExpedientes = $con->prepare($sqlExpedientes);
    $stmtExpedientes->execute();
     return $stmtExpedientes->fetch(PDO::FETCH_ASSOC);
}

function pacientes($con){
    // Consulta para contar los pacientes registrados en los últimos 4 meses, agrupados por mes
    $sqlPacientesPorMes = "SELECT 
                                COUNT(*) AS total_pacientes
                            FROM 
                                pacientes
                            WHERE 
                                fecha_alta >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
                            GROUP BY 
                                DATE_FORMAT(fecha_alta, '%Y-%m')
                            ORDER BY 
                                DATE_FORMAT(fecha_alta, '%Y-%m');";

    $stmtPacientesPorMes = $con->prepare($sqlPacientesPorMes);
    $stmtPacientesPorMes->execute();
    return  $stmtPacientesPorMes->fetchAll(PDO::FETCH_COLUMN); // Obtener solo la columna de totales

}
function totalPacientes($con)
{
    $sqlPacientesUltimosDias = "SELECT 
                                    DATE(fechacita) AS fecha,
                                    COUNT(*) AS total_pacientes
                                FROM 
                                    consulta
                                WHERE 
                                    DATE(fechacita) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) 
                                GROUP BY 
                                    DATE(fechacita)
                                ORDER BY 
                                    fecha;"; // Ordenar por fecha

    $stmtPacientesUltimosDias = $con->prepare($sqlPacientesUltimosDias);
    $stmtPacientesUltimosDias->execute();

    // Obtener todos los resultados de los últimos 7 días
    $resultPacientesUltimosDias = $stmtPacientesUltimosDias->fetchAll(PDO::FETCH_ASSOC);

    // Crear un arreglo para almacenar los totales de los últimos 7 días
    $totalesUltimosDias = array_fill(0, 7, 0); // Inicializa un arreglo de 7 elementos con valor 0

    // Mapear los resultados a un arreglo simple
    foreach ($resultPacientesUltimosDias as $row) {
        // Calcular la diferencia de días con respecto a hoy
        $diff = (strtotime(date('Y-m-d')) - strtotime($row['fecha'])) / (60 * 60 * 24);

        if ($diff >= 0 && $diff < 7) {
            $totalesUltimosDias[$diff] = $row['total_pacientes'];
        }
    }
    return $totalesUltimosDias;
}

try {
    // Consulta para contar el total de pacientes
    $sqlPacientes = "SELECT COUNT(*) as total FROM pacientes";
    $stmtPacientes = $con->prepare($sqlPacientes);
    $stmtPacientes->execute();
    $resultPacientes = $stmtPacientes->fetch();




    // Consulta para contar el total de pacientes en los últimos 7 días


    // Devolver los resultados en formato JSON
    echo json_encode([
        'success' => true,
        'total_pacientes' => $resultPacientes['total'],
        'total_expedientes' => expedientes($con),
        'data_por_mes' => pacientes($con), // Agregar los totales por mes
        'data_ultimos_dias' => totalPacientes($con) // Datos totales para los últimos 7 días
    ]);
} catch (PDOException $e) {
    // Devolver un error si ocurre un problema con la consulta
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
}
$con->close();


