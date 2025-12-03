<article>
    <!-- Imagem do produto -->
    <img src="<?= $produto['caminho'] ?>" alt="<?= $produto['nome'] ?>">

    <!-- Nome do produto -->
    <h3><?= $produto['nome'] ?></h3>

    <!-- Preço formatado -->
    <p class="preco"><b>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></b></p>

    <!-- Botão para adicionar ao carrinho -->
    <a href="../controller/carrinhoController.php?id=<?= $produto['id'] ?>" class="addCarrinho">Adicionar ao carrinho</a>

    <!-- Descrição com quebras de linha -->
    <p><?= nl2br($produto['descricao']) ?></p>

    <!-- Complemento HTML adicional -->
    <?= $produto['complemento'] ?>
</article>