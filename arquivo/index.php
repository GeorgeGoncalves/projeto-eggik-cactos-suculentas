<?php
// Inclui o arquivo "bandoDados.php", arquivo responsavel por atividades no banco de dados.
include("../bancoDados/conexaoBD.php");

// Incluindo arquivo "funcoes.php", onde fica as funções para busca no banco de dados.
include("../bancoDados/funcoesDeBusca.php");

// Atribuindo a função a "$buscarProdutosEmDestaque" e já guardando o array dos produtos destaques.
$produtosDestaque = buscarProdutosEmDestaque($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="George Gonçalves Miranda">
    <title>Index</title>

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
        <!-- Conteiner criado para melhor trabalhar o layout da página inicial. -->
        <div class="flex-container">

            <section>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta ea praesentium nam corporis laborum
                    reiciendis voluptatum sed officiis illum pariatur, quisquam debitis at repellat architecto ut
                    nostrum quia fuga dolor magni error earum nesciunt. Ipsa reiciendis consectetur error aliquid
                    blanditiis officia mollitia, praesentium natus maiores similique eos! Sapiente expedita enim
                    necessitatibus, nobis, quidem repudiandae atque dolores laboriosam tempore voluptatem temporibus ab
                    incidunt sint rem nemo est! Reiciendis nobis minima rem possimus doloribus unde doloremque magnam
                    omnis laudantium atque reprehenderit repudiandae fugit quidem illo vitae quo nemo, tempora, adipisci
                    error. Velit fugiat maiores, necessitatibus dolores sequi mollitia veniam. Exercitationem distinctio
                    velit eveniet perspiciatis incidunt, natus illo maiores dolores animi nemo reiciendis modi nobis
                    aliquid molestias temporibus eius omnis impedit veritatis non facere dignissimos dolorem vitae iste.
                    Totam ab odit nemo natus a delectus quo dolore illum ratione reiciendis aut, earum dolorem
                    praesentium quae animi sapiente necessitatibus vel quis pariatur quod laudantium? Ipsa voluptatum,
                    saepe vero nesciunt nisi dolorem consequatur adipisci, sunt perferendis, magnam atque ea. Distinctio
                    ullam dolore fuga est, fugiat nobis obcaecati? Mollitia, delectus. Minus nobis id aliquid, sit
                    praesentium excepturi omnis molestiae aliquam. Cum labore nemo possimus officiis at. Maiores placeat
                    iste nulla hic nostrum saepe quod sapiente sint, doloribus nisi sunt sed nam, nemo facere corrupti.
                    Earum itaque, corrupti perspiciatis deleniti eos est provident repellendus veritatis dolor porro
                    natus voluptatum facere molestiae repellat maxime. Veritatis consequatur ex assumenda ratione
                    doloremque, inventore quis sit cumque non aspernatur eligendi et voluptates sint reprehenderit
                    minima at. Nam quos facere perferendis, doloremque impedit sapiente rem, qui minima quaerat
                    molestias veniam tenetur ut ab recusandae officia nobis consectetur quibusdam officiis perspiciatis
                    sunt rerum obcaecati quisquam laboriosam? Nobis, iusto, quasi quibusdam error nemo beatae tempora
                    blanditiis qui, eveniet maiores doloribus omnis? Est aliquam sit ut corporis. Tempora dolorem ex
                    repellendus velit culpa ullam, eum cupiditate. Optio nesciunt, natus repudiandae eveniet tempore
                    dolorem molestiae consequuntur enim accusantium? Perspiciatis laboriosam eius provident eveniet
                    ratione laborum. Error unde ducimus eum omnis dolores, maiores tenetur autem facere recusandae quis
                    tempora totam asperiores? Quisquam debitis ullam porro impedit consectetur dolorum laboriosam et
                    voluptate repellendus quia. Voluptate neque unde atque cum maiores impedit quam quaerat cupiditate
                    recusandae voluptatem numquam dolor molestias quae delectus iusto ex inventore officiis, aliquid
                    nostrum rerum porro commodi tempore? Nemo explicabo ratione corrupti. Ducimus doloribus, voluptas
                    consequuntur quia dolorum expedita alias quidem sequi at in deleniti minus aspernatur dignissimos
                    reiciendis quasi nulla nisi, voluptatem ullam incidunt harum. Labore officiis commodi consequuntur
                    amet, ad dignissimos excepturi dolore, consequatur quod assumenda eius placeat nobis rerum earum.
                    Officiis asperiores exercitationem mollitia enim aut deleniti illum, cupiditate iusto sequi
                    architecto, hic, pariatur dicta placeat veritatis? Molestias aliquam dolores eos ipsa facilis
                    eveniet sapiente dolorem, aperiam, facere, eius fugit impedit sequi modi quod nemo. Nesciunt veniam
                    possimus deserunt laborum impedit cumque non explicabo quasi amet! Sapiente commodi ad corporis
                    dolorum, ducimus illo est totam ipsam similique, culpa debitis quis, deserunt ea possimus omnis!
                    Tempora nihil, nulla corrupti, accusantium architecto soluta omnis veniam non voluptas quo
                    repudiandae eveniet alias adipisci vero sunt?</p>
            </section>

            <!-- Classe criada para o main de outras páginas não serem afetados. -->
            <main class="main-index">

                <h2>SEJA BEM-VINDO ao melhor lugar para você comprar e aprender sobre suculentas e cactos!</h2>

                <?php
                // Percorre todos os produtos em destaque
                foreach ($produtosDestaque as $produto) {
                    include("../view/destaqueView.php");
                }
                ?>

                <div class="mapa">
                    <h4>Venha nos visitar</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3751.438891107452!2d-43.966141224950505!3d-19.905901681477104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa690cb2fad5a37%3A0xcb14f7c2f55fe281!2sNewton%20Paiva%20-%20Unidade%20Carlos%20Luz%20-%20Wyden!5e0!3m2!1spt-BR!2sbr!4v1758469831469!5m2!1spt-BR!2sbr"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </main>

            <section>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta ea praesentium nam corporis laborum
                    reiciendis voluptatum sed officiis illum pariatur, quisquam debitis at repellat architecto ut
                    nostrum quia fuga dolor magni error earum nesciunt. Ipsa reiciendis consectetur error aliquid
                    blanditiis officia mollitia, praesentium natus maiores similique eos! Sapiente expedita enim
                    necessitatibus, nobis, quidem repudiandae atque dolores laboriosam tempore voluptatem temporibus ab
                    incidunt sint rem nemo est! Reiciendis nobis minima rem possimus doloribus unde doloremque magnam
                    omnis laudantium atque reprehenderit repudiandae fugit quidem illo vitae quo nemo, tempora, adipisci
                    error. Velit fugiat maiores, necessitatibus dolores sequi mollitia veniam. Exercitationem distinctio
                    velit eveniet perspiciatis incidunt, natus illo maiores dolores animi nemo reiciendis modi nobis
                    aliquid molestias temporibus eius omnis impedit veritatis non facere dignissimos dolorem vitae iste.
                    Totam ab odit nemo natus a delectus quo dolore illum ratione reiciendis aut, earum dolorem
                    praesentium quae animi sapiente necessitatibus vel quis pariatur quod laudantium? Ipsa voluptatum,
                    saepe vero nesciunt nisi dolorem consequatur adipisci, sunt perferendis, magnam atque ea. Distinctio
                    ullam dolore fuga est, fugiat nobis obcaecati? Mollitia, delectus. Minus nobis id aliquid, sit
                    praesentium excepturi omnis molestiae aliquam. Cum labore nemo possimus officiis at. Maiores placeat
                    iste nulla hic nostrum saepe quod sapiente sint, doloribus nisi sunt sed nam, nemo facere corrupti.
                    Earum itaque, corrupti perspiciatis deleniti eos est provident repellendus veritatis dolor porro
                    natus voluptatum facere molestiae repellat maxime. Veritatis consequatur ex assumenda ratione
                    doloremque, inventore quis sit cumque non aspernatur eligendi et voluptates sint reprehenderit
                    minima at. Nam quos facere perferendis, doloremque impedit sapiente rem, qui minima quaerat
                    molestias veniam tenetur ut ab recusandae officia nobis consectetur quibusdam officiis perspiciatis
                    sunt rerum obcaecati quisquam laboriosam? Nobis, iusto, quasi quibusdam error nemo beatae tempora
                    blanditiis qui, eveniet maiores doloribus omnis? Est aliquam sit ut corporis. Tempora dolorem ex
                    repellendus velit culpa ullam, eum cupiditate. Optio nesciunt, natus repudiandae eveniet tempore
                    dolorem molestiae consequuntur enim accusantium? Perspiciatis laboriosam eius provident eveniet
                    ratione laborum. Error unde ducimus eum omnis dolores, maiores tenetur autem facere recusandae quis
                    tempora totam asperiores? Quisquam debitis ullam porro impedit consectetur dolorum laboriosam et
                    voluptate repellendus quia. Voluptate neque unde atque cum maiores impedit quam quaerat cupiditate
                    recusandae voluptatem numquam dolor molestias quae delectus iusto ex inventore officiis, aliquid
                    nostrum rerum porro commodi tempore? Nemo explicabo ratione corrupti. Ducimus doloribus, voluptas
                    consequuntur quia dolorum expedita alias quidem sequi at in deleniti minus aspernatur dignissimos
                    reiciendis quasi nulla nisi, voluptatem ullam incidunt harum. Labore officiis commodi consequuntur
                    amet, ad dignissimos excepturi dolore, consequatur quod assumenda eius placeat nobis rerum earum.
                    Officiis asperiores exercitationem mollitia enim aut deleniti illum, cupiditate iusto sequi
                    architecto, hic, pariatur dicta placeat veritatis? Molestias aliquam dolores eos ipsa facilis
                    eveniet sapiente dolorem, aperiam, facere, eius fugit impedit sequi modi quod nemo. Nesciunt veniam
                    possimus deserunt laborum impedit cumque non explicabo quasi amet! Sapiente commodi ad corporis
                    dolorum, ducimus illo est totam ipsam similique, culpa debitis quis, deserunt ea possimus omnis!
                    Tempora nihil, nulla corrupti, accusantium architecto soluta omnis veniam non voluptas quo
                    repudiandae eveniet alias adipisci vero sunt?</p>
            </section>

        </div>

        <?php
        // Incluidndo o arquivo "footer", onde fica o rodapé do site.
        include("../view/footer.php");

        // fecha conexão
        fechaBD($conexao);
        ?>
</body>

</html>