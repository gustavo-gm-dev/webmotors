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
        <h1>Digite seu e-mail para redefinir
        sua senha:</h1>
        <form action="enviar-email.php" method="POST">
            <div class="input-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required placeholder="Digite seu e-mail">
            </div>
            <button type="submit">Recuperar Senha</button>
            <button type="button" onclick="window.location.href='index.php';" class="cancel-button">Cancelar</button>
            <p><a href="index.php">Voltar ao Login</a></p>
        </form>
    </div>
</body>
</html>
