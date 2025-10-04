<?php
header("Content-Type: application/json");

include '../conexao.php';
//verifica conexão
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Erro na conexão com o banco de dados."]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true); 

// verifica se os dados foram mandados
if (
    empty($data['nome']) ||
    empty($data['telefone']) ||
    empty($data['data']) ||
    empty($data['horario']) ||
    empty($data['servicos']) ||
    empty($data['profissional'])
) {
    echo json_encode(["success" => false, "message" => "Dados incompletos."]);
    exit;
}

// armazena os dados em variaveis
$nome = $conn->real_escape_string($data['nome']);
$telefone = $conn->real_escape_string($data['telefone']);
$data_agendamento = $conn->real_escape_string($data['data']);
$horario = $conn->real_escape_string($data['horario']);
$servicos = $conn->real_escape_string($data['servicos']);
$profissional = $conn->real_escape_string($data['profissional']);

$quantidadeServicos = count(explode(",", $data['servicos'])); // conta quantos servicos tem
$duracao = $quantidadeServicos * 30; // 30 min por serviço

// inserção de dados no banco de dados
$stmt = $conn->prepare("INSERT INTO agendamentos (nome, telefone, data_agendamento, horario, servicos, profissional, duracao) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssi", $nome, $telefone, $data_agendamento, $horario, $servicos, $profissional, $duracao);

// resposta se deu bom ou não
if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao salvar agendamento."]);
}

$stmt->close();
$conn->close();
?>
