<?php
include 'config.php';

// Obtener los datos de la solicitud
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Verificar si los datos se recibieron correctamente
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(["message" => "Error: JSON data not received correctly"]);
    exit;
}

// Verificar que todos los campos necesarios estén presentes
if (!isset($data['reader_id']) || !isset($data['rfid_code']) || !isset($data['tid']) || !isset($data['antenna']) || !isset($data['timestamp']) || !isset($data['date'])) {
    echo json_encode(["message" => "Error: Missing data in JSON request"]);
    exit;
}

// Asignar variables
$reader_id = $data['reader_id'];
$rfid_code = $data['rfid_code'];
$tid = $data['tid'];
$antenna = $data['antenna'];
$timestamp = $data['timestamp'];
$date = $data['date'];

// SQL para insertar datos
$sql = "INSERT INTO readings (reader_id, rfid_code, tid, antenna, timestamp, date) VALUES ('$reader_id', '$rfid_code', '$tid', '$antenna', '$timestamp', '$date')";

// Ejecutar la consulta y verificar el resultado
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "New record created successfully"]);
} else {
    echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
}

// Cerrar la conexión
$conn->close();
?>
