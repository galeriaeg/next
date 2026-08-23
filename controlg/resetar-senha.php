<?php

$email = $_POST['email'] ?? '';
$emailLimpo = filter_var($email, FILTER_SANITIZE_EMAIL);

if (!filter_var($emailLimpo, FILTER_VALIDATE_EMAIL)) {
  die("Por favor, insira um e-mail válido!");
  exit();
}

//===== PEGA DATA E HORA ATUAL =====//
date_default_timezone_set('America/Sao_Paulo');
$data_atual = date('d/m/Y');
$hora_atual = date('H:i');

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

//===== CONSULTA USUARIO NO BANCO =====//
$sql = "SELECT nome, email 
FROM tb_usuarios WHERE email = ? AND status = 'ATIVO' AND tipo <> 0 LIMIT 1";
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


    $nomeUsuario = htmlspecialchars($usuario['nome'], ENT_QUOTES, 'UTF-8');
    $emailUsuario = htmlspecialchars($usuario['email'], ENT_QUOTES, 'UTF-8');

    //Criptografa a nova senha
    $novaSenhaCript = md5($novaSenha);

    //===== GRAVA SENHA TEMPORARIA NA BASE =====//
    $sql = "UPDATE tb_usuarios 
    SET senha='$novaSenhaCript' 
    WHERE tipo <> 0 
    AND email = '$emailLimpo'
    AND status = 'ATIVO' ";
    $update = mysqli_query($conexao, $sql);
    if ($update > 0) {
      echo "Usuário encontrado. Senha temporaria enviada!";
      //===== GRAVA NA tb_cron =====//
      //salva na t_cron: email, data atual, hora atual,tipo_senha
      $sql = "INSERT INTO tb_cron (email,dt_senha_gerada,hr_senha_gerada,tipo_senha,dt_senha_alterada,hr_senha_alterada,senha_expirada)
      VALUES ('$emailLimpo','$data_atual','$hora_atual','GERADA','NULL','NULL','FALSE')";
      $conf = $conexao->query($sql) or die($conexao->error);

      if ($conf) {
        //===== ENVIA EMAIL AO USUARIO LOCALHOST =====//
        require_once "send.php";

        //===== ENVIA EMAIL AO USUARIO NA PRODUÇÃO =====//
        //require "envia-email.php";
      }
    } else {
      echo "Erro inesperado! Não foi possivel recuperar a senha.";
    }
  } else {
    echo "<script>window.location.href='recuperar-senha.php?send=false'</script>";
    echo "E-mail bloqueado ou não encontrado no sistema.";
    exit();
  }
  $stmt->close();
} else {
  echo "Erro na preparação da consulta: " . $conexao->error;
}
mysqli_close($conexao);
