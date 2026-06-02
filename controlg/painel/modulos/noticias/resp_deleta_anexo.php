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

  if ($qtde > 0) {
    //echo "tem foto";
    $file_delete = "files/" . $fotoNoticia; // apaga arquivo no servidor
    $sql = "UPDATE tb_noticias SET foto='' WHERE id = '$idNoticia'"; // apaga anexo na base
    $update = mysqli_query($conexao, $sql);
    unlink($file_delete);
    //echo "<script>alert('Imagem excluida com sucesso!');</script>";
    echo "<script>window.location.href='index.php?id=3.2&not=$idNoticia'</script>";
  }
}
mysqli_close($conexao);
