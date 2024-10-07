<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $novaSenha = $_POST['password'];
    $confirmarSenha = $_POST['confirm-password'];

    // Verifica se as senhas coincidem
    if ($novaSenha !== $confirmarSenha) {
        echo "As senhas não coincidem!";
        exit;
    }

    // Verifica o token
    $sql = "SELECT * FROM usuarios WHERE token = '$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

        // Atualiza a senha e remove o token
        $sql = "UPDATE usuarios SET senha = '$senhaHash', token = NULL WHERE token = '$token'";
        if ($conn->query($sql) === TRUE) {
            echo "Senha redefinida com sucesso!";
            header('Location: index.php');
        } else {
            echo "Erro ao atualizar a senha: " . $conn->error;
        }
    } else {
        echo "Token inválido!";
    }

    $conn->close();
}
?>
