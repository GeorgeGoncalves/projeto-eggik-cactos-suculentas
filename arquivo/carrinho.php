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
    <style>
        /* BOTÕES DO +/- E DELETE DA PÁGINA CARRINHO */
        .quantidade-controle a {
            text-decoration: none;      /* remove o sublinhado */
            background-color: #529decff;    /* cor de fundo azul */
            color: #fff;    /* texto branco */
            padding: 5px 10px;     /* espaço interno */
            border-radius: 4px;    /* cantos arredondados */
            margin: 0 5px;   /* espaço entre botões */
            display: inline-block;    /* faz parecer botão */
            font-weight: bold;    /* deixa o texto mais forte */
        }

        .quantidade-controle a:hover {
            background-color: #027afcff;   /* azul mais escuro */
        }

        a.delete {
            background-color: #e48a8aff;   /* fundo vermelho */
        }

        a.delete:hover {
            background-color: #e61313ff;   /* vermelho mais escuro */
        }

        .div-central-formulario {
            display: block;    /* mantém o bloco normal */
        }

        /* Alinha imagem e nome lado a lado */
        .div-central-formulario .linha-nome {
            display: flex;
            align-items: center;
            gap: 10px;   /* espaço entre imagem e nome */
        }
    </style>
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

    <footer>
        <p><b>Criador: </b>Página desenvolvida por aluno do curso de TI da Instituição Newton Paiva - MG</p>

        <p><b>Nome: </b>George Gonçalves Miranda <b>Telefone: </b>
            (31) 99345-4571 <b>E-mail: </b><a href="">georgeggmiranda@gmail.com</a>
        </p>
    </footer>
</body>

</html>