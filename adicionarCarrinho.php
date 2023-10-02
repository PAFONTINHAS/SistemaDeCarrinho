<?php
    include('conexao/banco.php');
    if($_SERVER["REQUEST_METHOD"] === "GET"){

        if(isset($_GET['id']) && !empty($_GET['id'])){


        // Armazenando o dado do AJAX em uma variável php
            $id = $_GET['id'];

        // Definindo uma variável de quantidade para a execução da procedure
            $qtd = 1;

        // Executando a procedure
            $sql = "CALL atualizarQuantidade($qtd, $id, 1)";
            $exec = $conn->query($sql);


        // Verificando se o produto foi adicionado com sucesso
            if($exec == true){

                //NÃO FUNCIONA AINDA
                $response = array("status" => "success", "message" => "Produto adicionado ao carrinho com sucesso!");
            }
            else{

                //NÃO FUNCIONA AINDA
                $response = array("status" => "error", "message" => "Erro ao adicionar o produto ao carrinho.");

            }

            //NÃO FUNCIONA AINDA
            echo json_encode($response);

    }

}

