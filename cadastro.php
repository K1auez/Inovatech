<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/autenticacao.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" href="./img/logo-foguete.png" type="image/x-icon">
    <title>InovaTech</title>
</head>
<body>
<div class="autenticacao-container">

<img src="./img/logosemfoguete.png">
<h1>Olá! Crie sua conta</h1>

<form action="./cadastroProcesso.php" method="post">
    <p>Registre-se abaixo</p>
    <input type="text" name="nome" placeholder="Nome de usuário">
    <input type="email" name="email" placeholder="Endereço de email">
    <input type="password" name="senha" placeholder="Senha">
    <button type="submit">Continuar</button>
</form>

<a href="./login.php">Já tem uma conta? <span>Clique aqui</span></a>
</div>
</body>
</html>