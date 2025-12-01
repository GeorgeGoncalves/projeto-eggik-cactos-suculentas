<?php
// Iniciando SESSÃO.
session_start();

// Incluindo o arquivo "conexao.php", para conectar ao banco de dados.
include("../BancoDados/conexaoBD.php");

// Incluindo o arquivo "produtoModel.php", para fazer a busca no banco de dados.
include("../BancoDados/funcoesDeBusca.php");

// Verifica se veio um ID pela URL (ex: carrinho.php?id=2).
if (isset($_GET['id'])) {
    // Converte o ID para inteiro por segurança.
    $id = intval($_GET['id']);

    // Busca o produto no banco de dados pelo ID.
    $produto = buscarProdutoPorId($conexao, $id);

    // Se encontrou o produto no banco dados.
    if ($produto) {
        // Se o carrinho ainda não existe na sessão, cria um array vazio.
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        // Flag para saber se o produto já estava no carrinho.
        $encontrado = false;

        // Percorre todos os itens do carrinho.
        foreach ($_SESSION['carrinho'] as $i => $item) {

            // Verifica se o produto que estamos tentando adicionar já existe no carrinho.
            if ($item['id'] == $produto['id']) {

                // Se for o mesmo produto, aumenta a quantidade em 1.
                $_SESSION['carrinho'][$i]['quantidade'] += 1;

                // Marca que encontramos o produto, para não precisar adicionar de novo.
                $encontrado = true;

                // Encerra o loop.
                break;
            }
        }

        // Se não encontrou o produto no carrinho, adiciona como novo
        if (!$encontrado) {
            $_SESSION['carrinho'][] = [
                "id" => $produto["id"],
                "nome" => $produto["nome"],
                "caminho" => $produto["caminho"],
                "preco" => $produto["preco"],
                "quantidade" => 1 // começa com 1 unidade
            ];
        }

        // Redireciona sempre para carrinho.php.
        header("Location: ./carrinho.php");
        exit;
    } else {
        // Caso o produto não exista no banco de dados.
        echo "Produto não encontrado.";
    }
}