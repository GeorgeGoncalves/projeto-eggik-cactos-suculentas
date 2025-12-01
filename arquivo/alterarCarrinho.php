<?php
// Inicia a sessão para poder acessar o carrinho armazenado em $_SESSION
session_start();

// Verifica se vieram os parâmetros necessários pela URL (ação e id do produto)
if (isset($_GET['acao']) && isset($_GET['id'])) {
    // "acao" pode ser "aumentar" ou "diminuir"
    $acao = $_GET['acao'];

    // Converte o id recebido para inteiro por segurança
    $id   = intval($_GET['id']);

    // Percorre todos os itens do carrinho
    foreach ($_SESSION['carrinho'] as $index => $item) {
        // Se o id do item atual for igual ao id recebido
        if ($item['id'] == $id) {

            // Se a ação for aumentar, incrementa a quantidade
            if ($acao === "aumentar") {
                $_SESSION['carrinho'][$index]['quantidade']++;

            // Se a ação for diminuir, reduz a quantidade mas nunca deixa menor que 1
            } elseif ($acao === "diminuir") {
                $q = intval($_SESSION['carrinho'][$index]['quantidade']);
                $_SESSION['carrinho'][$index]['quantidade'] = max(1, $q - 1);
            }

            // Como já encontrou o item, pode encerrar o loop
            break;
        }
    }
}

// Depois de processar a alteração, redireciona de volta para a página do carrinho
header("Location: ./carrinho.php");
exit;