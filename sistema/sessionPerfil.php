
<?php
session_start();

function verificarAcesso() {
    // Perfis válidos disponíveis no sistema
    $perfisValidos = ['administrador', 'profissional', 'cliente'];
    if (!isset($_SESSION['categoria']) || !in_array($_SESSION['categoria'], $perfisValidos)) {
        header('Location: ../index.php'); // Redireciona para a página de login
        exit;
    }

    // Retorna a categoria atual do usuário
    return $_SESSION['categoria'];
}
?>
