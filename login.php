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
<h1>Bem-vindo(a) de volta</h1>

<form action="./loginProcesso.php" method="post">
    <p>Entre com seu email e senha</p>
    <input type="text" id="username" name="username" placeholder="Endereço de email">
    <input type="password" id="password" name="password" placeholder="Senha">
    <button type="submit">Continuar</button>
</form>
<a href="redefinir.php">Esqueceu a senha? <span>Clique aqui</span></a>
<a href="cadastro.php">Não tem uma conta? <span>Clique aqui</span></a>
</div>
</body>
</html>