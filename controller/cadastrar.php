<?php
// Inclui conexão e classes necessárias
include("../model/ConexaoBD.php");
include("../model/usuario.php");
include("../model/DAO/UsuarioDAO.php");

// Cria conexão
$conexao = conectarBD();

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Cria objeto Usuario
    $usuario = new Usuario();
    $usuario->setUsuario($_POST['usuario']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));

    // Chama o DAO
    $usuarioDAO = new UsuarioDAO($conexao);

    // Redireciona para login se deu certo
    header("Location: ../controller/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="George Gonçalves Miranda">
    <title>Cadastro</title>

    <link rel="stylesheet" href="../css/ecommerce.css">

    <style>
        .container-cadastrar {
            flex: 1;
            /* ocupa espaço disponível */
            display: flex;
            /* ativa flexbox */
            flex-direction: column;
            /* organiza em coluna */
            align-items: center;
            /* centraliza horizontalmente */
            justify-content: center;
            /* centraliza verticalmente */
        }

        /* Estilo do formulário */
        .formulario-cadastrar {
            border: 1px solid #ccc;
            /* borda cinza clara */
            padding: 20px;
            /* espaço interno */
            border-radius: 8px;
            /* cantos arredondados */
            background: #f9f9f9;
            /* fundo claro */
            text-align: left;
            /* labels alinhados à esquerda */
            margin-bottom: 35px;
            /* distanciamento entre o formulario e o footer */
        }
    </style>
</head>


<body>
    <?php
    // Incluindo arquivo "header", onde fica o cabeçalho das páginas.
    include("../view/header.php");

    // Incluindo arquivo "navegacao.php", onde fica a navegação do site.
    include("../view/navegacao.php");
    ?>

    <!-- Container principal da área de cadastro -->
    <div class="container-cadastrar">

        <h2>Cadastre-se</h2>

        <!-- Formulário de cadastro -->
        <form method="post" class="formulario-cadastrar">
            <!-- Campo de usuário -->
            <label>Usuário:</label>
            <input type="text" name="usuario" required>
            <br>

            <!-- Campo de usuário -->
            <label>Email:</label>
            <input type="text" name="email" required>
            <br>

            <!-- Campo de senha -->
            <label>Senha:</label>
            <input type="password" name="senha" required>
            <br>

            <!-- Botão para enviar o formulário -->
            <button type="submit">Cadastrar</button>
        </form>
    </div>
    
    <?php
    // Incluidndo o arquivo "footer", onde fica o rodapé do site.
    include("../view/footer.php");
    ?>
</body>

</html>