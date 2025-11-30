<?php
// Conectando com o banco de dados
// Obs.: a porta que está sendo utilizada é a 3307 e o padrão do XAMPP é 3306
$conexao = mysqli_connect("localhost", "root", "", "EGGIK", 3307);

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