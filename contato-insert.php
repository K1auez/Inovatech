<?php
include './conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $assunto = $_POST['assunto'];
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];
    $comoconheceu = $_POST['radio'];

    var_dump($_POST);

    $sql = "INSERT INTO contato (assunto, nome, tipo, email, telefone, mensagem, comoconheceu) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $sql);
    if (!$stmt) {
        die("Erro na preparação da declaração: " . mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $assunto, $nome, $tipo, $email, $telefone, $mensagem, $comoconheceu);

    if (mysqli_stmt_execute($stmt)) {
        header('location: ./index.php#contato');
        exit();
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
    mysqli_stmt_close($stmt);
}
?>
