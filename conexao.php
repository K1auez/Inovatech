<?php

$conexao = new mysqli("localhost", "root", "", "bd_contato"); // 1 sempre host, 2 sempre root se estiver usando phpmyadmin, 3 sempre senha, 4 sempre nome da pasta de ligacao no phpmyadmin


if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

?>