<?php
$servername = "MYSQL5050.site4now.net";
$username = "a629ef_dbrfid";
$password = "Barcode123";
$dbname = "db_a629ef_dbrfid";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
