<?php
    session_start();
    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $resultado = $conexao->query($sql);

        if (mysqli_num_rows($resultado) < 1) {
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
    } else {
        header('Location: ../index.php');
    }
?>
