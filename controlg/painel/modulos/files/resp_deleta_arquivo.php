<?php
require "session.php";

$idFile = (int) ($_GET['file'] ?? 0);
$nomeFile = $_GET['nome'];

if ((empty($idFile)) || (empty($nomeFile))
) {
	echo "<script>window.location = 'logout.php';</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	// apaga registro da imagem
	$sql = "DELETE FROM tb_files WHERE id='$idFile'";
	$del = mysqli_query($conexao, $sql);

	// atualiza tb_produto e deleta a mesma imagem
	if ($del > 0) {

		// apaga imagem do servidor
		$file_delete = "files/" . $nomeFile;
		unlink($file_delete);

		// Atualiza tab Produtos
		$sql = "UPDATE tb_produto SET file='', idfile='0' WHERE idfile = '$idFile'";
		$updateProduto = mysqli_query($conexao, $sql);

		// Atualiza tb Noticias
		$sql = "UPDATE tb_noticias SET file='', idfile='0' WHERE idfile = '$idFile'";
		$updateNoticia = mysqli_query($conexao, $sql);

		echo "<script>alert('Arquivo excluido com sucesso!');</script>";
		echo "<script>window.location.href='index.php?id=4'</script>";
	}
}
mysqli_close($conexao);
