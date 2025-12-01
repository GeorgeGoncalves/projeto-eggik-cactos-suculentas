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

                                <!-- Apenas exibe a quantidade -->
                                <p>Quantidade: <output><?= $item['quantidade'] ?></output></p>

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

    <footer>
        <p><b>Criador: </b>Página desenvolvida por aluno do curso de TI da Instituição Newton Paiva - MG</p>

        <p><b>Nome: </b>George Gonçalves Miranda <b>Telefone: </b>
            (31) 99345-4571 <b>E-mail: </b><a href="">georgeggmiranda@gmail.com</a>
        </p>
    </footer>
</body>

</html>