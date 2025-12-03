<?php
// Iniciando SESSÃO.
session_start();

// Incluindo o arquivo "conexao.php", para conectar ao banco de dados.
include("../model/conexaoBD.php");

// Incluindo o arquivo "produtoModel.php", para fazer a busca no banco de dados.
include("../model/funcoesDeBusca.php");

/**
 * Adiciona um produto ao carrinho de compras.
 *
 * Este método verifica se existe um ID de produto na URL, busca o produto
 * no banco de dados e adiciona ao carrinho na sessão. Caso o produto já
 * esteja no carrinho, apenas incrementa a quantidade.
 *
 * @param mysqli $conexao Conexão ativa com o banco de dados.
 * @return void
 */
function adicionarProdutoAoCarrinho($conexao) {
    // Verifica se veio um ID pela URL
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

            // Se não encontrou o produto no carrinho, adiciona como novo item.
            if (!$encontrado) {
                $_SESSION['carrinho'][] = [
                    'id' => $produto['id'],
                    'nome' => $produto['nome'],
                    'caminho' => $produto['caminho'],
                    'preco' => $produto['preco'],
                    'quantidade' => 1
                ];
            }
        }
    }

    // Redireciona para a página do carrinho
    header("Location: ../view/carrinho.php");
    exit;
}

/**
 * Atualiza a quantidade de um produto no carrinho de compras.
 *
 * Esta função verifica se os parâmetros necessários vieram pela URL
 * (`acao` e `id`), identifica o produto correspondente no carrinho
 * e ajusta sua quantidade conforme a ação solicitada:
 * - "aumentar": incrementa a quantidade em 1
 * - "diminuir": reduz a quantidade em 1, mas nunca abaixo de 1
 *
 * @param array  $_SESSION['carrinho'] Carrinho de compras armazenado na sessão.
 * @param string $_GET['acao']         A ação desejada ("aumentar" ou "diminuir").
 * @param int    $_GET['id']           ID do produto a ser atualizado.
 *
 * @return void
 */
function atualizarQuantidadeCarrinho() {
    // Verifica se vieram os parâmetros necessários pela URL (ação e id do produto)
    if (isset($_GET['acao']) && isset($_GET['id'])) {
        // "acao" pode ser "aumentar" ou "diminuir"
        $acao = $_GET['acao'];

        // Converte o id recebido para inteiro por segurança
        $id = intval($_GET['id']);

        // Percorre todos os itens do carrinho
        foreach ($_SESSION['carrinho'] as $index => $item) {
            // Se o id do item atual for igual ao id recebido
            if ($item['id'] == $id) {

                // Se a ação for aumentar, incrementa a quantidade
                if ($acao === "aumentar") {
                    $_SESSION['carrinho'][$index]['quantidade']++;

                    // Se a ação for diminuir, reduz a quantidade mas nunca deixa menor que 1
                } elseif ($acao === "diminuir") {
                    $q = intval($_SESSION['carrinho'][$index]['quantidade']);
                    $_SESSION['carrinho'][$index]['quantidade'] = max(1, $q - 1);
                }

                // Como já encontrou o item, pode encerrar o loop
                break;
            }
        }
    }

    // Redireciona para a página do carrinho
    header("Location: ../view/carrinho.php");
    exit;
}

/**
 * Remove um produto do carrinho de compras e redireciona para a página do carrinho.
 *
 * Esta função verifica se veio um parâmetro "id" pela URL, percorre os itens do carrinho
 * armazenado na sessão e remove o produto correspondente. Após a remoção, reorganiza os
 * índices do array para evitar buracos e redireciona o usuário para a página do carrinho.
 *
 * @param array  $_SESSION['carrinho'] Carrinho de compras armazenado na sessão.
 * @param int    $_GET['id']           ID do produto a ser removido.
 *
 * @return void
 */
function removerProdutoDoCarrinho() {
    // Verifica se veio um parâmetro "id" pela URL
    if (isset($_GET['id'])) {
        // Converte o id recebido para inteiro por segurança
        $id = intval($_GET['id']);

        // Percorre todos os itens do carrinho
        foreach ($_SESSION['carrinho'] as $i => $item) {
            // Se o id do item atual for igual ao id recebido
            if ($item['id'] == $id) {
                // Remove o item do carrinho usando unset()
                unset($_SESSION['carrinho'][$i]);

                // Reorganiza os índices do array para não ficarem "buracos"
                $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);

                // Como já encontrou e removeu o item, encerra o loop
                break;
            }
        }
    }

    // Redireciona para a página do carrinho
    header("Location: ../view/carrinho.php");
    exit;
}

// Dispatcher: decide qual ação executar
if (isset($_GET['acao'])) {
    if ($_GET['acao'] === "aumentar" || $_GET['acao'] === "diminuir") {
        atualizarQuantidadeCarrinho();
    } elseif ($_GET['acao'] === "remover") {
        removerProdutoDoCarrinho();
    }
} elseif (isset($_GET['id'])) {
    // Se só veio o ID, significa adicionar ao carrinho
    adicionarProdutoAoCarrinho($conexao);
}