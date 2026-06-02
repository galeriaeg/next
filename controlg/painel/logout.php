<?php
// 1. Inicia a sessão para ter acesso a ela
session_start();
// 2. Limpa todas as variáveis de sessão salvas
session_unset();
// 3. Destrói a sessão ativa no servidor
session_destroy();

// Impede o navegador de armazenar a página no cache
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// 4. Redireciona de forma nativa e segura para a index
header("Location: ../index.php");
// 5. Garante que o script pare de ser executado aqui
exit();
