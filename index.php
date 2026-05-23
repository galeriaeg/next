<?php
// Captura a página atual pela query string (alterado de 'p' para 'url')
$pagina = isset($_GET['url']) ? $_GET['url'] : 'home';

// Define o arquivo que será incluído na main
$arquivo_conteudo = "pages/" . $pagina . ".php";
if (!file_exists($arquivo_conteudo)) {
  $arquivo_conteudo = "pages/erro404.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/css/global.css">
  <link rel="stylesheet" href="./public/css/components.css">
  <title>Next Soluções em Saúde</title>
  <link rel="icon" type="image/png" href="./public/favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./public/favicon/favicon.svg" />
  <link rel="shortcut icon" href="./public/favicon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="./public/favicon/apple-touch-icon.png" />
  <link rel="manifest" href="./public/favicon/site.webmanifest" />
</head>

<body>
  <header><?php require_once "includes/header.php" ?></header>
  <nav><?php require_once "includes/menu.php" ?></nav>
  <main id="conteudo-principal"><?php include($arquivo_conteudo); ?></main>
  <footer><?php require_once "includes/footer.php" ?></footer>
  <!-- controla as rotas-->
  <script src="public/js/router.js"></script>
</body>

</html>