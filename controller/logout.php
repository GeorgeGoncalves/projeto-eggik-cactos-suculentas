<?php
session_start();      // inicia a sessão
session_unset();      // limpa todas as variáveis da sessão
session_destroy();    // encerra a sessão

// redireciona para a página de login ou inicial
header("Location: indexController.php");
exit;