<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="George Gonçalves Miranda">
    <title>Fale conosco</title>

    <link rel="stylesheet" href="../css/ecommerce.css">
</head>

<body>

    <?php
    // Incluindo arquivo "header", onde fica o cabeçalho das páginas.
    include("../view/header.php");

    // Incluindo arquivo "navegacao.php", onde fica a navegação do site.
    include("../view/navegacao.php");
    ?>

    <main class="container-formulario">
        <h2>Fale conosco</h2>

        <form action="" method="post">
            <fieldset>
                <legend>Envie sua mensagem</legend>

                <div class="div-central-formulario"></div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Fulano da Silva Sauro" required>
                </div>

                <div class="div-central-formulario"></div>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="fulano@outlook.com" required>
                </div>

                <div class="div-central-formulario"></div>
                <label for="assunto">Assunto</label>
                <input type="text" name="assunto" id="assunto" placeholder="Diário">
                </div>

                <div class="div-central-formulario">
                    <label for="sugestoes">Mensagem</label><br>
                    <textarea name="sugestoes" id="sugestoes" rows="7" cols="40" placeholder="Querido diário..."
                        required></textarea>
                </div>

                <button type="submit" class="btn-formulario">Enviar mensagem</button>
            </fieldset>
        </form>
    </main>

    <?php
    // Incluidndo o arquivo "footer", onde fica o rodapé do site.
    include("../view/footer.php");
    ?>

    <script>
        // Adicionando um evento no click do botão com a classe .btn-faleconosco
        document.querySelector('.btn-formulario').addEventListener("click", function verificarPreenchimento(event) {

            // Captura o valor dos campos e remove espaços extras com .trim
            const nome = document.getElementById('nome').value.trim();
            const email = document.getElementById('email').value.trim();
            const assunto = document.getElementById('assunto').value.trim();
            const sugestoes = document.getElementById('sugestoes').value.trim();

            // Verifica se algum campo está vazio
            if (nome == "" || email == "" || assunto == "" || sugestoes == "") {
                // Exibi um alerta para o usuário
                alert("Por favor, preencha todos os campos antes de enviar.");

                // Impede o envio do formulário
                event.preventDefault();
            }
        })
    </script>

</body>

</html>