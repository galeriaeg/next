<?php
session_start();

// TESTA SE O USUARIO CLICOU NO SUBMIT
$btnLogin = filter_input(INPUT_POST, 'btnLogin');

if ($btnLogin) {
  $login = filter_input(INPUT_POST, 'login');
  $senha = filter_input(INPUT_POST, 'senha');
} else {
  header("Location: index.php");
  exit();
}

if ((empty($login)) or (empty($senha))) {
  echo "<script>this.location='index.php';</script>";
  exit();
} else {

  $senha = md5($senha);

  include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

  // trata as variáveis com "?" (placeholders)
  $sql = "SELECT id, nome, email, login, tipo FROM tb_usuarios 
          WHERE login = ? 
          AND senha = ? 
          AND tipo <> 0
          AND status = 'ATIVO'";

  // Prepara a execução no banco de dados
  $stmt = mysqli_prepare($conexao, $sql);

  if ($stmt) {
    // Vincula os parâmetros com segurança ("ss" significa que ambos são Strings)
    // O MySQLi vai blindar o $login e o $senha aqui contra SQL Injection
    mysqli_stmt_bind_param($stmt, "ss", $login, $senha);

    // Executa a query de forma segura
    mysqli_stmt_execute($stmt);

    // Pega o resultado da execução
    $res = mysqli_stmt_get_result($stmt);
    $total = mysqli_num_rows($res);

    // puxa os dados limpos
    while ($row = mysqli_fetch_array($res)) {
      $idu    = $row['id'];
      $nomeu  = $row['nome'];
      $emailu = $row['email'];
      $loginu = $row['login'];
      $tipou  = $row['tipo'];
    }

    // Fecha o statement após o uso
    mysqli_stmt_close($stmt);
  } else {
    // Caso ocorra algum erro na preparação da query
    echo "<script>this.location='index.php?aut=erro_sistema';</script>";
    exit();
  }

  // Validação do Login
  if ($total > 0) {

    //==== Verifica se usuario tem senha EXPIRADA ====/
    $sql = "SELECT id 
    FROM tb_cron 
    WHERE email='$emailu' 
    AND tipo_senha='EXPIRADA' 
    AND senha_expirada = 'TRUE' ";
    $cons = $conexao->query($sql) or die($conexao->error);
    $totalCron = mysqli_num_rows($cons);
    while ($row = $cons->fetch_array()) {
      $id_usuario_bloqueado  =  $row['id'];
    }
    if ($totalCron > 0) {
      //"Usuario expirado";
      echo "<script>this.location.href='index.php?blocked=true';</script>";
      exit();
    }


    $_SESSION["idUsuarioLogado"]    = $idu;
    $_SESSION["nomeUsuarioLogado"]  = $nomeu;
    $_SESSION["loginUsuarioLogado"] = $loginu;
    $_SESSION["tipoUsuarioLogado"]  = $tipou;

    echo "<script>this.location = 'painel/index.php';</script>";
  } else {
    echo "<script>this.location.href='index.php?aut=false';</script>";
    exit();
  }
}

// Fecha a conexão obtida pelo seu include
mysqli_close($conexao);
