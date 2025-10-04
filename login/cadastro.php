<?php
include '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Verifica se já existe o e-mail cadastrado
    $check = $conn->prepare("SELECT usuario_id FROM usuarios WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        header("Location: index.html?erro=email");
        exit;
    } else {
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $senha);

        if ($stmt->execute()) {
            header("Location: index.html?cadastro=sucesso");
            exit;
        } else {
            header("Location: index.html?erro=cadastro");
            exit;
        }

        $stmt->close();
    }

    $check->close();
    $conn->close();
}
?>
