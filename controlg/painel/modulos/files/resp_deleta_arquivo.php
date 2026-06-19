<?php
require "session.php";

$idFile = $_GET['file'];
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



	// atualiza tb_produto
	if ($del > 0) {
		$sql = "UPDATE tb_produto SET file='',idfile='' WHERE idfile = '$idFile'";
		$update = mysqli_query($conexao, $sql);

		// apaga imagem do servidor
		$file_delete = "files/" . $nomeFile;
		unlink($file_delete);

		if ($update) {
			echo "<script>alert('Arquivo excluido com sucesso!');</script>";
			echo "<script>window.location.href='index.php?id=4'</script>";
		}
	}
}
mysqli_close($conexao);
