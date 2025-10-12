<?php
header("Content-Type: application/json");

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Erro na conexão com o banco."]);
    exit;
}

$data = isset($_GET['data']) ? $_GET['data'] : null;
if (!$data) {
    echo json_encode(["success" => false, "message" => "Data não informada."]);
    exit;
}

// Agora buscamos também a duração de cada agendamento
$stmt = $conn->prepare("SELECT horario, duracao FROM agendamentos WHERE data_agendamento = ?");
$stmt->bind_param("s", $data);
$stmt->execute();
$result = $stmt->get_result();

$horarios = [];

while ($row = $result->fetch_assoc()) {
    $inicio = strtotime($row['horario']);
    $duracao = (int)$row['duracao']; // duração em minutos
    $fim = $inicio + ($duracao * 60); // em segundos

    // gerar blocos de 30 minutos
    for ($h = $inicio; $h < $fim; $h += 1800) {
        $horarios[] = date("H:i", $h);
    }
}

echo json_encode(["success" => true, "horarios" => array_unique($horarios)]);

$stmt->close();
$conn->close();
?>

