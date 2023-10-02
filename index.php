<?php

    include('conexao/banco.php');

    if(isset($_POST['botao']) && !empty($_POST['email']) && !empty($_POST['senha'])){

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        

        if($usuario['email'] == $email && password_verify($senha, $usuario['senha'])){

            session_start();

            $_SESSION['usuario'] = $usuario['id'];
            header('Location:telaProdutos.php');
            exit();

        }
        elseif($usuario['email'] != $email){
            $mensagem_erro = "Email não encontrado";
        }
        elseif($usuario['senha']){
            $mensagem_erro = "Senha incorreta";

        }
        elseif($usuario['id'] < 1){
            $mensagem_erro = "Nenhum usuario ainda cadastrado";
        }


    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tela de Login</h1>
    <h4>Acesse a sua conta</h4>
    <form action="index.php" method = "POST">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">

        <button type="submit" name="botao">Entrar</button>

        <?php
        
            if(isset($mensagem_erro)){
                echo "<p>". $mensagem_erro ."</p>";
            }
        
        ?>

    </form>
    <a href="cadastrar.php">Novo por aqui? Cadastre sua conta</a>
</body>
</html>