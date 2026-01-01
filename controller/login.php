<?php
session_start();

// Inclui a conexão com o banco
include_once("../model/ConexaoBD.php");

// Inclui o DAO de usuário
include_once("../model/DAO/UsuarioDAO.php");

// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados enviados pelo formulário
    $usuario = $_POST['usuario'];
    $senha   = $_POST['senha'];

    // Cria a conexão
    $conexao = ConectarBD();

    // Cria o DAO
    $usuarioDAO = new UsuarioDAO($conexao);

    // Busca o usuário no banco
    $dados = $usuarioDAO->buscarUsuario($usuario, $senha);

    // Se encontrou o usuário
    if ($dados) {
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $dados['usuario']; // guarda o nome do usuário
        header("Location: ../controller/indexController.php");
        exit;
    } else {
        echo "Usuário ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="George Gonçalves Miranda">
    <title>Login</title>

    <link rel="stylesheet" href="../css/ecommerce.css">

    <style>
        /* ----- Área de login ----- */
        .container-login {
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
            margin-bottom: 250px;
            /* distanciamento entre o formulario e o footer */

        }

        /* Estilo do formulário */
        .formulario-login {
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
        }

        /* Botão "Cadastrar" como link estilizado */
        .btn-cadastrar {
            display: inline-block;
            /* mantém compacto, não ocupa linha inteira */
            padding: 6px 12px;
            /* tamanho interno do botão */
            background-color: #668ace;
            /* cor de fundo azul */
            color: white;
            /* texto branco */
            border-radius: 6px;
            /* cantos arredondados */
            text-decoration: none;
            /* remove sublinhado */
            font-weight: bold;
            /* texto em negrito */

            /* Margens pequenas para posicionar logo abaixo do formulário */
            margin-top: 8px;
            /* espaço pequeno acima */
            margin-left: 4px;
            /* leve deslocamento à esquerda */
        }

        /* Efeito ao passar o mouse */
        .btn-cadastrar:hover {
            background-color: #4a6fa3;
            /* azul mais escuro */
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

    <!-- Container principal da área de login -->
    <div class="container-login">

        <!-- Formulário de login -->
        <form method="post" class="formulario-login">
            <!-- Campo de usuário -->
            <label>Usuário:</label>
            <input type="text" name="usuario" required>
            <br>

            <!-- Campo de senha -->
            <label>Senha:</label>
            <input type="password" name="senha" required>
            <br>

            <!-- Botão para enviar o formulário -->
            <button type="submit">Entrar</button>
        </form>

        <!-- Link de cadastro, estilizado como botão simples -->
        <a href="cadastrar.php" class="btn-cadastrar">Cadastrar</a>
    </div>

    <?php
    // Incluidndo o arquivo "footer", onde fica o rodapé do site.
    include("../view/footer.php");
    ?>

</body>

</html>