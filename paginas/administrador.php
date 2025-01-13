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
            let currentDate = new Date();
            currentDate.setDate(currentDate.getDate() - currentDate.getDay() + 1);

            const daysContainer = document.querySelectorAll(".dia");
            const btnLeft = document.querySelector(".btnEsquerda");
            const btnRight = document.querySelector(".btnDireita");

            function formatDate(date) {
                const options = { day: '2-digit', month: '2-digit', year: '2-digit' };
                return date.toLocaleDateString('pt-BR', options);
            }

            function updateWeekDays() {
                let tempDate = new Date(currentDate);

                daysContainer.forEach((dia, index) => {
                    const dayOfWeek = tempDate.toLocaleDateString('pt-BR', { weekday: 'long' });
                    dia.querySelector(".tituloDia").textContent = `${dayOfWeek.charAt(0).toUpperCase() + dayOfWeek.slice(1)} ${formatDate(tempDate)}`;
                    tempDate.setDate(tempDate.getDate() + 1);
                });
            }

            // Avança para a próxima semana
            btnRight.addEventListener("click", () => {
                currentDate.setDate(currentDate.getDate() + 7);
                updateWeekDays();
            });

            // Retorna para a semana anterior
            btnLeft.addEventListener("click", () => {
                currentDate.setDate(currentDate.getDate() - 7);
                updateWeekDays();
            });

            // Inicializa a exibição
            updateWeekDays();
        </script>
</body>
</html>