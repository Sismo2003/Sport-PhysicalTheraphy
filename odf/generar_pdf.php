<?php
require_once('TCPDF-main/tcpdf.php');

$host = 'localhost';
$dbname = 'rehabilitacionspt';
$username = 'root';
$password = '123321';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $codigo = $_POST['codigo'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM historial_clinico WHERE codigo = :codigo ORDER BY fecha_hora DESC LIMIT 1");
    $stmt->execute(['codigo' => $codigo]);
    $registro = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle('Historial Clínico PDF');
    $pdf->AddPage();

    $html = "<h1>Último Registro del Historial Clínico</h1>";
    if ($registro) {
        // Aquí agrega los campos del registro
        $html .= "<p><strong>ID:</strong> {$registro['id']}</p>";
        $html .= "<p><strong>Patologicos:</strong> {$registro['patologicos']}</p>";
        // Agrega el resto de los campos...
    } else {
        $html .= "<p>No se encontraron registros para el código especificado.</p>";
    }

    $pdf->writeHTML($html, true, false, true, false, '');

    // Generar PDF y guardarlo en una cadena
    $pdfString = $pdf->Output('', 'S');

    // Devolver el PDF y un mensaje en formato JSON
    header('Content-Type: application/json');
    echo json_encode([
        'pdf' => base64_encode($pdfString), // Codificar el PDF en base64
        'message' => 'PDF generado correctamente'
    ]);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error de conexión: ' . $e->getMessage()]);
}
?>
