<?php
session_start();

// Inclui a conexão com o banco
include_once("../model/ConexaoBD.php");

// Inclui o DAO de usuário
include_once("../model/UsuarioDAO.php");

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
</head>

<body>
    <?php
    // Incluindo arquivo "header", onde fica o cabeçalho das páginas.
    include("../view/header.php");

    // Incluindo arquivo "navegacao.php", onde fica a navegação do site.
    include("../view/navegacao.php");
    ?>

    <div class="container-login">
        <form method="post" class="formulario-login">
            <label>Usuário:</label>
            <input type="text" name="usuario" required>
            <br>
            <label>Senha:</label>
            <input type="password" name="senha" required>
            <br>
            <button type="submit">Entrar</button>
        </form>
    </div>

    <?php
    // Incluidndo o arquivo "footer", onde fica o rodapé do site.
    include("../view/footer.php");
    ?>

</body>

</html>