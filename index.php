<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       body{
        font-family: Arieal, Helvetica, sans-serif;
        background-attachment: fixed;
        background-image: linear-gradient(45deg, cyan, yellow);
        
        background-image: linear-gradient(to right, #18f, #148 );
       }
       .loginArea{
        background-color: #000a;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        width: 14rem;
        height: 16rem;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 2rem;
        box-shadow: 1px 2px 6px #000;
       } 
       input{
        padding: 0.5rem;
        border-radius: 10px;
        outline: none;
       }
       .loginArea>h1{
        color: #fff;
       }
       .submit{
        padding: 0.5rem;
        width: 50%;
        border-radius: 10px;
        background-color: #1ae;
        color: #fff;
        font-weight: 900;
        
       }
       button:hover{
        background-color: #7ae;
        cursor: pointer;
       }
    </style>
    <link rel="stylesheet" href="reset.css">
</head>
<body>
    <!--<a href="home.php">voltar</a>-->
    <form action="./sistema/permissao.php" method="post">
        <div class="loginArea">
            <h1>Login</h1>
            <input type="text" placeholder="Email" name="email" id="email"><br><br>
            <input type="password" placeholder="Senha" name="senha" id="senha"><br><br>
            <input type="submit" name="submit" value="Enviar" class="submit"><br>
        </div>
    </form>
</body>
</html>