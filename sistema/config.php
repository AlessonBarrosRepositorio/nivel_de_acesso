<?php
    $dbhost = 'localhost';
    $dbUsuario = 'root';
    $dbSenha = '';
    $dbNome = 'nivel_de_acesso';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Ativa relatórios de erro
    $conexao = new mysqli($dbhost, $dbUsuario, $dbSenha, $dbNome);
    $conexao->set_charset("utf8mb4"); // Define o charset para evitar problemas com caracteres especiais
?>
