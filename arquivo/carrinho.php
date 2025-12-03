<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="George Gonçalves Miranda">
    <title>Carrinho</title>

    <link rel="stylesheet" href="../css/ecommerce.css">
</head>

<body>
    <?php
    // Incluindo arquivo "header", onde fica o cabeçalho das páginas.
    include("../view/header.php");

    // Incluindo arquivo "navegacao.php", onde fica a navegação do site.
    include("../view/navegacao.php");
    ?>

    <!-- Classe criada para faciltita o trabalho e reutilizada nos formulários do fale conosco. -->
    <main class="container-formulario">

        <h2>Carrinho</h2>

        <!-- O formulário agora envia para a própria página carrinho.php -->
        <form action="" method="get">
            <fieldset>
                <legend>Produtos selecionados</legend>

                <?php
                $total = 0;
                if (!empty($_SESSION['carrinho'])) {
                    foreach ($_SESSION['carrinho'] as $item) {
                ?>
                        <fieldset>
                            <div class="div-central-formulario">
                                <!-- ID oculto para identificar o produto -->
                                <input type="hidden" name="id[]" value="<?= $item['id'] ?>">

                                <div class="linha-nome">
                                    <!-- Imagem do produto -->
                                    <img src="<?= $item['caminho'] ?>" alt="<?= $item['nome'] ?>" width="50" height="50">

                                    <!-- Nome ao lado da imagem -->
                                    <p><?= $item['nome'] ?></p>
                                </div>

                                <!-- Valor unitário do produto -->
                                <p>Valor: R$ <?= number_format($item['preco'], 2, ',', '.') ?></p>

                                <!-- Controle de quantidade -->
                                <div class="quantidade-controle">
                                    <!-- Botão diminuir -->
                                    <a href="./alterarCarrinho.php?acao=diminuir&id=<?= $item['id'] ?>">-</a>

                                    <!-- Apenas exibe a quantidade -->
                                    <output>Quantidade: <?= $item['quantidade'] ?></output>

                                    <!-- Botão aumentar -->
                                    <a href="./alterarCarrinho.php?acao=aumentar&id=<?= $item['id'] ?>">+</a>

                                    <!-- Link para excluir -->
                                    <a href="./removerCarrinho.php?id=<?= $item['id'] ?>" class="delete">Delete</a>
                                </div>
                                <!-- Subtotal do item -->
                                <p>Subtotal: R$ <?= number_format($item['preco'] * $item['quantidade'], 2, ',', '.') ?></p>
                            </div>
                        </fieldset>
                <?php
                        // Soma o subtotal de cada item ao total
                        $total += $item['preco'] * $item['quantidade'];
                    }

                    // Exibe o total geral do carrinho
                    echo "<h3>Total do carrinho: R$ " . number_format($total, 2, ',', '.') . "</h3>";
                } else {
                    echo "<p>Carrinho vazio.</p>";
                }
                ?>
            </fieldset>

            <!-- Botão para finalizar a compra -->
            <button type="submit">Finalizar</button>
        </form>

    </main>

    <?php
    // Incluidndo o arquivo "footer", onde fica o rodapé do site.
    include("../view/footer.php");
    ?>
</body>

</html>