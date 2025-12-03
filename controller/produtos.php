<?php
// Inclui o arquivo de conexão com o banco de dados
include("../model/conexaoBD.php");

// Incluindo arquivo "funcoes.php", onde fica as funções para busca no banco de dados.
include("../model/funcoesDeBusca.php");

// Função que busca todos os produtos
$todosProdutos = buscarTodosProdutos($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="George Gonçalves Miranda">
    <title>Produtos</title>

    <link rel="stylesheet" href="../css/ecommerce.css">
</head>

<body>

    <?php
    // Incluindo arquivo "header", onde fica o cabeçalho das páginas.
    include("../view/header.php");

    // Incluindo arquivo "navegacao.php", onde fica a navegação do site.
    include("../view/navegacao.php");
    ?>

    <main>
        <h2>Produtos para compras</h2>

        <div class="flex-container-produtos">
            <?php
            // Percorre todos os produtos
            foreach ($todosProdutos as $produto) {
                include("../view/produtoView.php");
            }
            ?>
        </div>
    </main>

    <?php
    // Incluidndo o arquivo "footer", onde fica o rodapé do site.
    include("../view/footer.php");

    // fecha conexão
    fechaBD($conexao);
    ?>
</body>

</html>