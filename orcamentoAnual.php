<?php
session_start();
include './conexao.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $_SESSION['mensagem'] = "Você precisa estar logado para realizar um orçamento.";
    header('location: ./index.php#planos_pagamento');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados do formulário
    $lucro_bruto = $_POST['lucro2'];
    $arquivo_nome = $_FILES['file2']['name'];
    $arquivo_tipo = $_FILES['file2']['type'];
    $arquivo_conteudo = file_get_contents($_FILES['file2']['tmp_name']);
    $usuario_id = $_SESSION['usuario_id']; // Pegar o ID do usuário logado

    // Calcular 2% do lucro bruto
    $valor_anual = $lucro_bruto * 0.02;

    // Inserir dados na tabela, incluindo o valor mensal calculado e o ID do usuário
    $stmt = $conexao->prepare("INSERT INTO formulario_lucro_anual (lucro_bruto, arquivo_nome, arquivo_tipo, arquivo_conteudo, valor_anual, usuario_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("dsssdi", $lucro_bruto, $arquivo_nome, $arquivo_tipo, $arquivo_conteudo, $valor_anual, $usuario_id);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Dados enviados com sucesso.";
        header('location: ./assinaturaAnual.php');
        exit();
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }

    // Fechar a conexão do statement
    mysqli_stmt_close($stmt);
}

$conexao->close();
?>