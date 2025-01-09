<?php
    include_once('../sistema/sessionPerfil.php');

    $categoria = verificarAcesso();

    // Confere se o usuário é administrador
    if ($categoria !== 'administrador') {
        header('Location: ../index.php'); // Redireciona se não for administrador
        exit;
    }

    // Conteúdo da página de administrador
    //echo "Bem-vindo, $categoria";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administrador</title>
    <link rel="stylesheet" href="../estilo/reset.css">

</head>
<body>
    <a href="../sistema/sair.php">sair</a>
        <?php
            // Caminho para o arquivo HTML
            $paginaHtml = '../global/paginas/paginaInicial.html';

            // Verifica se o arquivo existe antes de tentar carregá-lo
            if (file_exists($paginaHtml)) {
                // Carrega o conteúdo do HTML e insere na página
                echo file_get_contents($paginaHtml);
            } else {
                echo '<p>Erro: Página não encontrada.</p>';
            }
        ?>
</body>
</html>