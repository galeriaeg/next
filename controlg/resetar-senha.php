<?php

$email = $_POST['email'] ?? '';
$emailLimpo = filter_var($email, FILTER_SANITIZE_EMAIL);

if (!filter_var($emailLimpo, FILTER_VALIDATE_EMAIL)) {
  die("Por favor, insira um e-mail válido!");
  exit();
}

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "SELECT nome, email FROM tb_usuarios WHERE email = ? AND status = 'ATIVO' AND tipo <> 0 LIMIT 1";
$stmt = $conexao->prepare($sql);

if ($stmt) {

  $stmt->bind_param("s", $emailLimpo);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();

    $randNum = rand(1000, 9999);
    $arrLetras = ['Gf4@', 'D8*h', '+Pj3', 'R7f&', 'K%Yf'];
    // Sorteia um índice aleatório do array
    $indiceAleatorio = array_rand($arrLetras);
    $letraSorteada = $arrLetras[$indiceAleatorio];
    $novaSenha = $randNum . $letraSorteada;
    //echo "<div style='font-size:17px;padding:5px 10px;background:#dcffb4;display:inline-table;'>$novaSenha</div>";

    $nomeUsuario = htmlspecialchars($usuario['nome'], ENT_QUOTES, 'UTF-8');
    $emailUsuario = htmlspecialchars($usuario['email'], ENT_QUOTES, 'UTF-8');
    //Criptografa a senha
    $novaSenhaCript = md5($novaSenha);

    // Grava a nova senha na base
    $sql = "UPDATE tb_usuarios SET senha='$novaSenhaCript' 
    WHERE tipo <> 0 
    AND status = 'ATIVO' ";
    $update = mysqli_query($conexao, $sql);
    if ($update > 0) {
      echo "Usuário encontrado. Link de reset enviado! - " . $novaSenha . "-";
      echo $novaSenhaCript;
      // Envia email ao usuário com nova senha
      require "envia-email.php";
    } else {
      echo "Erro inesperado! Não foi possivel recuperar a senha.";
    }
  } else {
    echo "<script>window.location.href='recuperar-senha.php?send=false'</script>";
    exit();
    echo "E-mail bloqueado ou não encontrado no sistema.";
  }
  $stmt->close();
} else {
  echo "Erro na preparação da consulta: " . $conexao->error;
}
mysqli_close($conexao);
