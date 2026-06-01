<?php
include "session.php";

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$idNoticia = $_GET['idn'];

if (empty($idNoticia)) {
  echo "<script>window.location = 'logout.php';</script>";
  exit();
} else {

  $sql = "SELECT foto 
  FROM tb_noticias 
  WHERE id='$idNoticia' 
  AND foto IS NOT NULL 
  AND foto <> '' 
  LIMIT 1 ";
  $cons = $conexao->query($sql) or die($conexao->error);
  $resultado = mysqli_query($conexao, $sql);
  $qtde =  mysqli_num_rows($resultado);
  while ($row = $cons->fetch_array()) {
    $fotoNoticia  =  $row['foto'];
  }

  if ($qtde < 1) {
    echo "nao tem foto";
    $ativaInput = "block";
    $displayImagem = "none";
  } else {
    echo "tem foto";
    $ativaInput = "none";
    $displayImagem = "block";
  }


  exit();

  $file_delete = "files/" . $fotoNoticia;

  $sql = "UPDATE tb_noticias SET foto='' WHERE id = '$idNoticia'";
  $update = mysqli_query($conexao, $sql);
  unlink($file_delete);

  echo "<script>alert('Imagem excluida com sucesso!');</script>";
  echo "<script>window.location.href='index.php?id=3.2&not=$idNoticia'</script>";
}
mysqli_close($conexao);
