<?php
include './conexao.php';

// Obtendo os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha']; // Captura a senha do formulário

// Criptografando a senha com password_hash()
$senha_hash = password_hash($senha, PASSWORD_BCRYPT); // Utiliza bcrypt para o hash da senha

// Preparando a query SQL com prepared statements para evitar SQL Injection
$sql = $conexao->prepare("INSERT INTO cadastro (cadastro_nome, cadastro_email, cadastro_senha) VALUES (?, ?, ?)");
$sql->bind_param("sss", $nome, $email, $senha_hash);

// Executa a query
if ($sql->execute()) {
    header("Location: ./login.php"); // Redireciona para a página de login
} else {
    echo "Erro: " . $sql->error;
}

// Fecha a conexão
$sql->close();
$conexao->close();
?>