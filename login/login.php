<?php
include '../conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT usuario_id, senha FROM usuarios WHERE nome = ?");
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hash);
        $stmt->fetch();

        if (password_verify($senha, $hash)) {
            $_SESSION['usuario_id'] = $id;
            $_SESSION['usuario_nome'] = $nome;

            // Redirecionar para a home
            header("Location: ../index.php");
            exit;
        } else {
            header("Location: index.html?erro=senha");
            exit;
        }
    } else {
        header("Location: index.html?erro=usuario");
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>
