// logout.php
<?php
    session_start();
    session_destroy(); // Encerra a sessão atual
    header('Location: ../index.php'); // Redireciona para a página inicial
    exit;
?>
