<?php
session_start();

// Usuário e senha fixos só para exemplo
$usuario = "admin";
$senha   = "123";

// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['usuario'] === $usuario && $_POST['senha'] === $senha) {
        $_SESSION['logado'] = true;
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

    <style>
        
    </style>

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