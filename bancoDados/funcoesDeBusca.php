<?php
/**
 * Busca todos os produtos marcados como destaque no banco de dados.
 *
 * Essa função executa uma consulta SQL na tabela "produtos", retornando apenas os registros cujo campo "destaque" esteja definido como "1" (verdadeiro).
 *
 * @param mysqli $conexao Conexão ativa com o banco de dados MySQL/MariaDB.
 *
 * @return array<int,array<string,mixed>> Lista de produtos em destaque.
 * Cada produto é representado por um array associativo com as seguintes chaves:
 * - 'id' (int)            : Identificador único do produto.
 * - 'nome' (string)       : Nome do produto.
 * - 'preco' (float)       : Preço do produto.
 * - 'caminho' (string)    : Caminho relativo da imagem do produto.
 * - 'descricao' (string)  : Texto descritivo do produto.
 * - 'complemento' (string): HTML adicional ou informações complementares.
 * - 'destaque' (int|bool) : Flag indicando se o produto está em destaque (1 ou TRUE).
 *
 * Caso não existam produtos em destaque, retorna um array vazio.
 */
function buscarProdutosEmDestaque($conexao) {
    $sql = "SELECT * FROM produtos WHERE destaque = 1";
    $resultado = mysqli_query($conexao, $sql);

    $produtos = [];
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $produtos[] = $row;
        }
    }
    return $produtos;
}

/**
 * Busca todos os produtos cadastrados no banco de dados.
 *
 * @param mysqli $conexao Conexão ativa com o banco.
 * @return array<int,array<string,mixed>> Lista de todos os produtos.
 * 
 * * Cada produto é representado por um array associativo com as seguintes chaves:
 * - 'id' (int)            : Identificador único do produto.
 * - 'nome' (string)       : Nome do produto.
 * - 'preco' (float)       : Preço do produto.
 * - 'caminho' (string)    : Caminho relativo da imagem do produto.
 * - 'descricao' (string)  : Texto descritivo do produto.
 * - 'complemento' (string): HTML adicional ou informações complementares.
 * - 'destaque' (int|bool) : Flag indicando se o produto está em destaque.
 */
function buscarTodosProdutos($conexao)
{
    $sql = "SELECT * FROM produtos";
    $resultado = mysqli_query($conexao, $sql);

    $produtos = [];
    while ($row = mysqli_fetch_assoc($resultado)) {
        $produtos[] = $row;
    }

    return $produtos;
}

/**
 * Busca um produto pelo ID na tabela produtos.
 *
 * @param mysqli $conexao Conexão aberta com o banco de dados.
 * @param int $id ID do produto que deseja buscar.
 * @return array|null Retorna um array associativo com os dados do produto encontrado.
 * 
 * * Cada produto é representado por um array associativo com as seguintes chaves:
 * - 'id' (int)            : Identificador único do produto.
 * - 'nome' (string)       : Nome do produto.
 * - 'preco' (float)       : Preço do produto.
 * - 'caminho' (string)    : Caminho relativo da imagem do produto.
 * - 'descricao' (string)  : Texto descritivo do produto.
 * - 'complemento' (string): HTML adicional ou informações complementares.
 * - 'destaque' (int|bool) : Flag indicando se o produto está em destaque.
 */
function buscarProdutoPorId($conexao, $id)
{
    // Monta a query simples
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}

/**
 * Fecha a conexão com o banco de dados.
 *
 * @param mysqli $conexao Conexão aberta com o banco de dados.
 * @return void
 */
function fechaBD($conexao) {
    mysqli_close($conexao);
}