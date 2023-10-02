<?php
    
    include("conexao/banco.php");
    if(isset($_POST['botao'])){
        if(!empty($_POST['CPF']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])){

        $CPF = $_POST['CPF'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        
        // Prepare the SQL statement
        $sql = "INSERT INTO usuario (CPF, nome, email, senha) VALUES (?, ?, ?, ?)";

        // Create a prepared statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters to the statement
        $stmt->bind_param("ssss", $CPF, $nome, $email, $senha);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Usuario cadastrado com sucesso";
            header("Location: index.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();

        // Close the connection
        $conn->close();
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
    <h1>Tela de cadastro</h1>
    <h4>Cadastre a sua conta</h4>

    <form action="cadastrar.php" method="post">
        
        <label for="CPF">Insira seu CPF</label>
        <input type="text" name="CPF">
        <label for="nome">Insira seu Nome</label>
        <input type="text" name="nome">
        <label for="email">Insira seu Email</label>
        <input type="email" name="email">
        <label for="senha">Insira sua Senha</label>
        <input type="password" name="senha">

        <button type="submit" name="botao">Cadastrar</button>
    
    </form>
</body>
</html>