<?php
    include_once('../sistema/sessionPerfil.php');


    $categoria = verificarAcesso();

    // Confere se o usuário é administrador
    if ($categoria !== 'profissional') {
        header('Location: ../index.php'); // Redireciona se não for administrador
        exit;
    }

    echo "Bem-vindo, profissional!";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profissional</title>
</head>
<body>
    <a href="../sistema/sair.php">sair</a>
    
</body>
</html>