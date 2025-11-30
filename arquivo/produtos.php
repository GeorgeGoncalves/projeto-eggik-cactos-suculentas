<?php
// Inclui o arquivo "bandoDados.php", arquivo responsavel por atividades no banco de dados.
include("../bancoDados/conexaoBD.php");

// Incluindo arquivo "funcoes.php", onde fica as funções para busca no banco de dados.
include("../bancoDados/funcoes.php");

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
    <header>
        <img src="../imagem/LogoEGGIK.png" alt="Logo da loja EGGIK" width="100" height="130">
        <h1>EGGIK Cactos e Suculentas</h1>
    </header>

    <nav>
        <!-- Classe criada especialmente para customizar os botões de navegação. -->
        <ul class="cabecalho-btn">
            <li><a href="index.php">Página principal</a></li>
            <li><a href="produtos.php">Mais Produtos</a></li>
            <li><a href="fale-conosco.php">Fale conosco</a></li>
            <li><a href="carrinho.php">Carrinho</a></li>
        </ul>
    </nav>

    <main>
        <h2>Produtos para compras</h2>

        <div class="flex-container-produtos">

            <!-- Pega somente o index[2] do array -->
            <?php $produto = $todosProdutos[2]; ?>

            <article>
                <!-- Imagem do produto -->
                <img src="<?= $produto['caminho'] ?>" alt="<?= $produto['nome'] ?>">

                <!-- Nome do produto -->
                <h3><?= $produto['nome'] ?></h3>

                <!-- Preço formatado -->
                <p class="preco"><b>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></b></p>

                <!-- Botão para adicionar ao carrinho -->
                <a href="../controller/adicionarCarrinho.php?id=<?= $produto['id'] ?>" class="addCarrinho">Adicionar ao carrinho</a>

                <!-- Descrição com quebras de linha -->
                <p><?= nl2br($produto['descricao']) ?></p>

                <!-- Complemento HTML adicional -->
                <?= $produto['complemento'] ?>
            </article>

            <!-- Pega somente o index[3] do array -->
            <?php $produto = $todosProdutos[3]; ?>

            <article>
                <!-- Imagem do produto -->
                <img src="<?= $produto['caminho'] ?>" alt="<?= $produto['nome'] ?>">

                <!-- Nome do produto -->
                <h3><?= $produto['nome'] ?></h3>

                <!-- Preço formatado -->
                <p class="preco"><b>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></b></p>

                <!-- Botão para adicionar ao carrinho -->
                <a href="../controller/adicionarCarrinho.php?id=<?= $produto['id'] ?>" class="addCarrinho">Adicionar ao carrinho</a>

                <!-- Descrição com quebras de linha -->
                <p><?= nl2br($produto['descricao']) ?></p>

                <!-- Complemento HTML adicional -->
                <?= $produto['complemento'] ?>
            </article>

            <!-- Pega somente o index[4] do array -->
            <?php $produto = $todosProdutos[4]; ?>

            <article>
                <!-- Imagem do produto -->
                <img src="<?= $produto['caminho'] ?>" alt="<?= $produto['nome'] ?>">

                <!-- Nome do produto -->
                <h3><?= $produto['nome'] ?></h3>

                <!-- Preço formatado -->
                <p class="preco"><b>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></b></p>

                <!-- Botão para adicionar ao carrinho -->
                <a href="../controller/adicionarCarrinho.php?id=<?= $produto['id'] ?>" class="addCarrinho">Adicionar ao carrinho</a>

                <!-- Descrição com quebras de linha -->
                <p><?= nl2br($produto['descricao']) ?></p>

                <!-- Complemento HTML adicional -->
                <?= $produto['complemento'] ?>
            </article>

            <!-- Pega somente o index[5] do array -->
            <?php $produto = $todosProdutos[5]; ?>

            <article>
                <!-- Imagem do produto -->
                <img src="<?= $produto['caminho'] ?>" alt="<?= $produto['nome'] ?>">

                <!-- Nome do produto -->
                <h3><?= $produto['nome'] ?></h3>

                <!-- Preço formatado -->
                <p class="preco"><b>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></b></p>

                <!-- Botão para adicionar ao carrinho -->
                <a href="../controller/adicionarCarrinho.php?id=<?= $produto['id'] ?>" class="addCarrinho">Adicionar ao carrinho</a>

                <!-- Descrição com quebras de linha -->
                <p><?= nl2br($produto['descricao']) ?></p>

                <!-- Complemento HTML adicional -->
                <?= $produto['complemento'] ?>
            </article>

            <!-- Pega somente o index[6] do array -->
            <?php $produto = $todosProdutos[6]; ?>

            <article>
                <!-- Imagem do produto -->
                <img src="<?= $produto['caminho'] ?>" alt="<?= $produto['nome'] ?>">

                <!-- Nome do produto -->
                <h3><?= $produto['nome'] ?></h3>

                <!-- Preço formatado -->
                <p class="preco"><b>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></b></p>

                <!-- Botão para adicionar ao carrinho -->
                <a href="../controller/adicionarCarrinho.php?id=<?= $produto['id'] ?>" class="addCarrinho">Adicionar ao carrinho</a>

                <!-- Descrição com quebras de linha -->
                <p><?= nl2br($produto['descricao']) ?></p>

                <!-- Complemento HTML adicional -->
                <?= $produto['complemento'] ?>
            </article>
        </div>
    </main>

    <footer>
        <p><b>Criador: </b>Página desenvolvida por aluno do curso de TI da Instituição Newton Paiva - MG</p>

        <p><b>Nome: </b>George Gonçalves Miranda <b>Telefone: </b>
            (31) 99345-4571 <b>E-mail: </b><a href="">georgeggmiranda@gmail.com</a>
        </p>
    </footer>

    <?php
    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
    ?>
</body>

</html>