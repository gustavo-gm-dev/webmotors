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
        <h1>Nova Senha</h1>
        <form action="atualizar-senha.php" method="POST">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <div class="input-group">
                <label for="password">Nova Senha:</label>
                <input type="password" id="password" name="password" required placeholder="Digite sua nova senha">
            </div>
            <div class="input-group">
                <label for="confirm-password">Confirmar Senha:</label>
                <input type="password" id="confirm-password" name="confirm-password" required placeholder="Confirme sua nova senha">
            </div>
            <button type="submit">Redefinir Senha</button>
        </form>
    </div>
</body>
</html>
