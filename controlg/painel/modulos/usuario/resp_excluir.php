<?php
require "session.php";

$idUserAtual = $_GET['u'];
$tipo = $_GET['t'];

if ($tipo > 0) {
  $status = "ATIVO";
} else {
  $status = "INATIVO";
}

if (empty($idUserAtual)) {
  echo "<script>window.location.href = 'logout.php'</script>";
  exit();
} else {
  include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
  $sql = "UPDATE tb_usuarios SET tipo='$tipo', status='$status' WHERE id = '$idUserAtual' ";
  $update = mysqli_query($conexao, $sql);
  if ($update) {
    //echo "<script>alert('Usuário excluído com sucesso.');</script>";
    echo "<script>window.location.href = 'index.php?id=2'</script>";
  }
}
mysqli_close($conexao);
