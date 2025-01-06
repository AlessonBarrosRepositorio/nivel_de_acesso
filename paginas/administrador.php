<?php
    include_once('../sistema/sessionPerfil.php');

    $categoria = verificarAcesso();

    // Confere se o usuário é administrador
    if ($categoria !== 'administrador') {
        header('Location: ../index.php'); // Redireciona se não for administrador
        exit;
    }

    // Conteúdo da página de administrador
    echo "Bem-vindo, administrador!";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administrador</title>
</head>
<body>
    <a href="../sistema/sair.php">sair</a>
</body>
</html>