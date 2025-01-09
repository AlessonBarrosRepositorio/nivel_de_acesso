<?php
    include_once('../sistema/sessionPerfil.php');

    $categoria = verificarAcesso();

    // Confere se o usuário é administrador
    if ($categoria !== 'cliente') {
        header('Location: ../index.php'); // Redireciona se não for administrador
        exit;
    };

    echo "Bem-vindo, $categoria";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cliente</title>
    <link rel="stylesheet" href="../estilo/reset.css">
</head>
<body>
    <a href="../sistema/sair.php">sair</a>
    
</body>
</html>