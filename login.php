<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleLogin.css">
    <title>Tela de Login - Dev Envolvente</title>
</head>
<body>
    <form class="login" action="validarLogin.php" method="post">
        <h2>Login</h2>
        <div class="box-user">
            <input type="text" name="email" required>
            <label>Email</label>
        </div>
        <div class="box-user">
            <input type="password" name="senha" required>
            <label>Senha</label>
        </div>
        <div>
            <a href="#" class="forget"> Esqueceu a senha?</a>
        </div>
        <input class="btn" type="submit" value="Entrar">
    </form>
</body>
</html>