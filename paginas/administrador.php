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

<script>
    // Inicializa a data base como a segunda-feira da semana atual
    let dataAtual = new Date();
    dataAtual.setDate(dataAtual.getDate() - dataAtual.getDay() + 1);

    const diasContainer = document.querySelectorAll(".dia");
    const btnEsquerda = document.querySelector(".btnEsquerda");
    const btnDireita = document.querySelector(".btnDireita");
    const elementosMeses = document.querySelectorAll(".mes h1");

    function formatarData(data) {
        const opcoes = { day: '2-digit', month: '2-digit', year: '2-digit' };
        return data.toLocaleDateString('pt-BR', opcoes);
    }

    function destacarMesAtual() {
        const indiceMesAtual = dataAtual.getMonth(); // Índice do mês atual (0-11)
        elementosMeses.forEach((mes, indice) => {
            if (indice === indiceMesAtual) {
                mes.style.backgroundColor = "gray";
                mes.style.color = "white";
            } else {
                mes.style.backgroundColor = "";
                mes.style.color = "";
            }
        });
    }

    function atualizarDiasDaSemana() {
        let dataTemporaria = new Date(dataAtual);

        diasContainer.forEach((dia) => {
            const diaSemana = dataTemporaria.toLocaleDateString('pt-BR', { weekday: 'long' });
            dia.querySelector(".tituloDia").textContent = `${diaSemana.charAt(0).toUpperCase() + diaSemana.slice(1)} ${formatarData(dataTemporaria)}`;
            dataTemporaria.setDate(dataTemporaria.getDate() + 1);
        });

        // Atualiza o destaque do mês
        destacarMesAtual();
    }

    // Avança para a próxima semana
    btnDireita.addEventListener("click", () => {
        dataAtual.setDate(dataAtual.getDate() + 7);
        atualizarDiasDaSemana();
    });

    // Retorna para a semana anterior
    btnEsquerda.addEventListener("click", () => {
        dataAtual.setDate(dataAtual.getDate() - 7);
        atualizarDiasDaSemana();
    });

    // Inicializa a exibição
    atualizarDiasDaSemana();
</script>

</body>
</html>