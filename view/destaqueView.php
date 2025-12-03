<!-- Mostra na tela os produtos em destaque -->
                <article id="noticiadestaque">
                    <img src="<?= $produto['caminho'] ?>" alt="<?= $produto['nome'] ?>" width="600" height="600">
                    <h3><?= $produto['nome'] ?></h3>

                    <!-- Preço e botão de adicionar ao carrinho -->
                    <div class="preco-btnCarrinho">
                        <p class="preco"><b>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></b></p>
                        <a href="./adicionarCarrinho.php?id=<?= $produto['id'] ?>" class="addCarrinho">Adicionar ao carrinho</a>
                    </div>

                    <!-- Descrição com quebras de linha -->
                    <p><?= nl2br($produto['descricao']) ?></p>

                    <!-- Complemento HTML adicional -->
                    <?= $produto['complemento'] ?>
                </article>