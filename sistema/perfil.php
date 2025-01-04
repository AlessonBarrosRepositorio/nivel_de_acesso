<?php
     session_start();
        include_once('config.php');
        $perfil = $_POST['perfil'];
        $sql = "SELECT * FROM usuarios WHERE perfil = '$perfil'";

        if($perfil === "administrador"){
            header('Location: administrador.php');
        }
        if($perfil === "profissional"){
            header('Location: profissional.php');
        }
        if($perfil === "cliente"){
            header('Location: cliente.php');
        }
?>