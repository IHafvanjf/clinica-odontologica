<?php
header("Content-Type: application/json");

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Erro na conexão com o banco."]);
    exit;
}

//Pega os dais bloqueados da tabela data_bloqueada
$sql = "SELECT data_bloqueada FROM dias_bloqueados";
$result = $conn->query($sql);

$bloqueados = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bloqueados[] = $row['data_bloqueada'];
    }
}

echo json_encode($bloqueados); // formato: ["2025-04-10", "2025-04-15", ...]

$conn->close();
?>

