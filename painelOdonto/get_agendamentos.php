<?php
header('Content-Type: application/json; charset=utf-8');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
  $conn = new mysqli($host, $user, $password, $database);
  $conn->set_charset('utf8mb4');

  $data = $_GET['data'] ?? '';
  $prof = $_GET['profissional'] ?? '';
  if ($data === '' || $prof === '') {
    echo json_encode(['success'=>false, 'message'=>'Dados incompletos']); exit;
  }

  $sql = "SELECT 
            agendamento_id AS id,
            nome,
            telefone,
            TIME_FORMAT(horario, '%H:%i') AS horario,
            servicos,
            duracao
          FROM agendamentos
          WHERE data_agendamento = ? AND profissional = ?
          ORDER BY horario";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ss', $data, $prof);
  $stmt->execute();
  $result = $stmt->get_result();
  $rows = $result->fetch_all(MYSQLI_ASSOC);

  echo json_encode(['success'=>true, 'agendamentos'=>$rows], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success'=>false, 'message'=>'Erro no servidor', 'detalhe'=>$e->getMessage()]);
} finally {
  if (isset($stmt)) $stmt->close();
  if (isset($conn)) $conn->close();
}

