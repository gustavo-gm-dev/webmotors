<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Verifica se o e-mail existe
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Gerar token único
        $token = bin2hex(random_bytes(50));

        // Armazena o token no banco de dados
        $sql = "UPDATE usuarios SET token = '$token' WHERE email = '$email'";
        if ($conn->query($sql) === TRUE) {
            // Enviar o e-mail
            $link = "http://seu_dominio.com/nova-senha.php?token=" . $token;

            $assunto = "Recuperação de Senha";
            $mensagem = "Clique no link abaixo para redefinir sua senha:\n\n$link";
            $headers = "From: no-reply@seudominio.com";

            if (mail($email, $assunto, $mensagem, $headers)) {
                echo "E-mail de recuperação enviado com sucesso!";
            } else {
                echo "Erro ao enviar o e-mail.";
            }
        }
    } else {
        echo "E-mail não encontrado.";
    }

    $conn->close();
}
?>
