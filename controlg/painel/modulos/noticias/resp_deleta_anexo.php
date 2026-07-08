<?php
include "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$idNoticia = $_GET['idn'];

if (empty($idNoticia)) {
  echo "<script>window.location.href = 'logout.php';</script>";
  exit();
} else {

  $sql = "UPDATE tb_noticias SET file='',idfile=0 WHERE id = '$idNoticia'";
  $update = mysqli_query($conexao, $sql);

  if ($update > 0) {
    echo "<script>window.location.href='index.php?id=3.2&not=$idNoticia'</script>";
  }
}
mysqli_close($conexao);
