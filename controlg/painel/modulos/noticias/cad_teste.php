<?php

// Recebe imagem cropada (base64)
$imagem_cropada = $_POST['imagem_cropada'] ?? '';

if (!empty($imagem_cropada)) {
  // Remove prefixo "data:image/jpeg;base64,"
  $base64 = preg_replace('/^data:image\/\w+;base64,/', '', $imagem_cropada);
  $dados  = base64_decode($base64);

  // Gera nome único para o arquivo
  $nome_arquivo = uniqid('noticia_') . '.jpg';
  $uploaddir    = 'files/';
  $uploadfile   = $uploaddir . $nome_arquivo;

  if (file_put_contents($uploadfile, $dados)) {
    // Upload ok — $nome_arquivo disponível para salvar no banco
  } else {
    // Erro ao salvar
  }
}
