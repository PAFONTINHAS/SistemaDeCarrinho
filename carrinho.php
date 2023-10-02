<?php

    include('conexao/banco.php');

// FAZENDO UM SELECT COM JOIN PARA CHAMAR OS DADOS DE DUAS TABELAS

    $query = "SELECT Produto.*, Carrinho.quantidade
    FROM Carrinho
    INNER JOIN Produto ON Carrinho.id_produto = Produto.id
    WHERE Carrinho.id_usuario = 1";
    $result = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <a href="telaProdutos.php">Tela de Produtos</a>
    <h1>Seu Carrinho</h1>
    <table >
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Quantidade</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){

        echo" <tr data-id = ". $row['id']. ">";
        echo " <td>". $row['codigo'] . "</td>";
        echo   "<td>" . $row['nomeProduto'] . "</td>";
        echo  " <td>" . $row['categoria'] . "</td>";
        echo  " <td>" . $row['quantidade'] . "</td>";
        echo  " <td> </td>";
        echo "</tr>";
        }
    }
            ?>
            <!-- Adicione mais linhas conforme necessário -->
        </tbody>
    </table>
</body>
</html>
