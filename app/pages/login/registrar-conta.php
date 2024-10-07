<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    // Verifica se o e-mail já está cadastrado
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // Criptografa a senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Insere o novo usuário no banco de dados
        $sql = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senhaHash')";
        if ($conn->query($sql) === TRUE) {
            echo "Conta criada com sucesso!";
            header('Location: index.php');
        } else {
            echo "Erro ao criar conta: " . $conn->error;
        }
    } else {
        echo "E-mail já cadastrado!";
    }
    $conn->close();
}
?>
