<?php
header("Content-Type: application/json");

$host = "localhost:3308";
$user = "root";
$password = "13579012";
$database = "odonto";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Erro de conexão"]);
    exit;
}

$id = $_POST['id'] ?? null;
if (!$id) {
    echo json_encode(["success" => false, "message" => "ID não informado"]);
    exit;
}

$stmt = $conn->prepare("DELETE FROM agendamentos WHERE id = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao excluir"]);
}

$stmt->close();
$conn->close();
?>
