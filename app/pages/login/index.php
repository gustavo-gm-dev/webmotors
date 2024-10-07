<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmotors - login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Digite o seu
        e-mail e senha</h1>
        <form action="validar-login.php" method="POST">
            <div class="input-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required placeholder="Digite seu e-mail">
            </div>
            <div class="input-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required placeholder="Digite sua senha">
            </div>
            <button type="submit">Entrar</button>
            <p><a href="recuperar-senha.php">Esqueci minha senha</a></p>
            <p>Não tem conta? <a href="criar-conta.php">Crie a sua</a></p>
        </form>
    </div>
</body>
</html>
