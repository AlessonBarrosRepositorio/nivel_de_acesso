<?php
    session_start();
    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Prepara a consulta com placeholders
        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $email, $senha); // "ss" indica dois parâmetros do tipo string
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows < 1) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ../index.php');
        } else {
            $usuario = $resultado->fetch_assoc(); // Recupera o registro do usuário
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['categoria'] = $usuario['categoria']; // Armazena a categoria na sessão
            header('Location: perfil.php');
        }
        $stmt->close(); // Fecha a consulta
    } else {
        header('Location: ../index.php');
    }
?>
