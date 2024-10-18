<?php
session_start();
include './conexao.php';

$email = $_POST['username']; 
$senha = $_POST['password'];

// Consulta para verificar se o usuário existe
$sql = "SELECT * FROM cadastro WHERE cadastro_email = ?";
$stmt = $conexao->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifica se a senha está correta
        if (password_verify($senha, $row['cadastro_senha'])) {
            // Iniciar sessão
            $_SESSION["loggedin"] = true;
            $_SESSION['usuario_id'] = $row['cadastro_id'];

            // Redirecionar para a página inicial
            header("Location: ./index.php");
            exit();
        } else {
            // Senha incorreta
            print "<script>alert('Email ou senha incorretos');</script>";
            print "<script>location.href='./login.php';</script>";
            exit();
        }
    } else {
        // E-mail não encontrado
        print "<script>alert('Email ou senha incorretos');</script>";
        print "<script>location.href='./login.php';</script>";
        exit();
    }

} else {
    // Erro ao preparar a consulta
    echo "Erro ao preparar a consulta: " . $conexao->error;
}

$conexao->close();
?>