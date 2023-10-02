<?php

// AQUI CHAMA O ARQUIVO DE CONEXÃO AO BANCO DE DADOS COM O PHP
    include('conexao/banco.php');

// PEGANDO TODOS OS DADOS DA TABELA PRODUTO
    $query = "SELECT * FROM produto";
    $result = $conn->query($query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Document</title>
</head>
<body>
    <h1 class="cabeca">Lista de Produtos</h1>
    <button onclick="location.href='carrinho.php'"><span class='material-symbols-outlined'>shopping_cart</span>
    <p>CARRINHO</p>
</button>
    <table >
        <thead>
            <tr>
                <!-- CRIAÇÃO DA TABELA -->
                <th>Código</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        <?php

    // ARMAZENANDO OS DADOS DO BANCO EM UMA VARIÁVEL E ABRINDO UM LOOP PARA CADA DADO INSERIDO NO BANCO APARECER NA TABELA

        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){

           echo" <tr data-id = ". $row['id']. ">";
           echo " <td>". $row['codigo'] . "</td>";
           echo   "<td>" . $row['nomeProduto'] . "</td>";
           echo  " <td>" . $row['categoria'] . "</td>";?>
          <td> <button onclick="adicionarCarrinho('<?php echo $row['id']?>')">
           <span class='material-symbols-outlined'>shopping_cart</span>
           </button> </td>
           <?php
           echo "</tr>";
            }
        }
            ?>
        </tbody>
    </table>

</body>

<script>

// FUNÇÃO PARA PEGAR O DADO DA COLUNA DO PRODUTO O QUAL O BOTÃO DO CARRINHO FOI APERTADO PARA EVIAR PARA OUTRO ARQUIVO PHP
// FEITO COM AJAX

function adicionarCarrinho(id) {

    var url = "adicionarCarrinho.php?id=" + encodeURIComponent(id);

    fetch(url, {
        method: 'GET'
    })
    .then(function(response) {
        if (!response.ok) {
            throw new Error('Erro na solicitação');
        }
        return response.json(); // Analisa a resposta como JSON
    })
    .then(function(data) {
        // Verifique o status da resposta
        if (data.status === "success") {
            // Exibe um alerta de sucesso
            alert(data.message);
        } else {
            // Exibe um alerta de erro
            alert(data.message);
        }
    })
    .catch(function(error) {
        console.error('Erro:', error);
    });
}

    </script>



</html>
