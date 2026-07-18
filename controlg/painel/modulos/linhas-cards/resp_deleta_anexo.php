<?php
include "session.php";

$idCard = $_GET['idCard'];
$nome_arquivo = $_GET['file'];

if ((empty($idCard)) || (empty($nome_arquivo))) {
	echo "<script>window.location.href = 'logout.php';</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "UPDATE tb_linhas_cards SET anexo='' WHERE id = '$idCard'";
	$update = mysqli_query($conexao, $sql);

	$file_delete = "files/" . $nome_arquivo;
	unlink($file_delete);

	echo "<script>alert('Imagem excluida com sucesso!');</script>";
	echo "<script>window.location.href='index.php?id=12.2&idCard=$idCard'</script>";
}
mysqli_close($conexao);
