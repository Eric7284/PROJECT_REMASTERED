<?php
header('Content-Type: application/json');
require_once '../config/db_connection.php';

$conn = new mysqli('localhost', 'root', '', 'anime');
$result = $conn->query("SELECT * FROM anime WHERE genre = ?");
$data = [];
while($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
$conn->close();
?>