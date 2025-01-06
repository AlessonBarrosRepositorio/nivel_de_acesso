<?php
    session_start();
    if (!isset($_SESSION['categoria'])) {
        header('Location: ./sistema/index.php'); // Redireciona se não estiver logado
        exit;
    }

    $categoria = $_SESSION['categoria']; // Obtém a categoria da sessão

    if ($categoria === "administrador") {
        header('Location: ../paginas/administrador.php');
    } elseif ($categoria === "profissional") {
        header('Location: ../paginas/profissional.php');
    } elseif ($categoria === "cliente") {
        header('Location: ../paginas/cliente.php');
    } else {
        echo "Categoria inválida.";
    }
?>
