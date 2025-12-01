<?php
// Inicia a sessão para poder acessar o carrinho armazenado em $_SESSION
session_start();

// Verifica se veio um parâmetro "id" pela URL
if (isset($_GET['id'])) {
    // Converte o id recebido para inteiro por segurança
    $id = intval($_GET['id']);

    // Percorre todos os itens do carrinho
    foreach ($_SESSION['carrinho'] as $i => $item) {
        // Se o id do item atual for igual ao id recebido
        if ($item['id'] == $id) {
            // Remove o item do carrinho usando unset()
            unset($_SESSION['carrinho'][$i]);

            // Reorganiza os índices do array para não ficarem "buracos"
            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);

            // Como já encontrou e removeu o item, encerra o loop
            break;
        }
    }
}

// Redireciona para a página do carrinho
header("Location: ./carrinho.php");
exit;