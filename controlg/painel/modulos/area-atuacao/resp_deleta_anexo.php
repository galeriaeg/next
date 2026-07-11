<?php
include "session.php";

$idArea = $_GET['idArea'];
$nome_arquivo = $_GET['file'];

if (
	(empty($idArea)) ||
	(empty($nome_arquivo))
) {
	echo "<script>window.location.href = 'logout.php';</script>";
	exit();
} else {

	$file_delete = "files/" . $nome_arquivo;
	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
	$sql = "UPDATE tb_area_atuacao SET mapa='' WHERE id = '$idArea'";
	$update = mysqli_query($conexao, $sql);
	unlink($file_delete);

	echo "<script>alert('Imagem removida com sucesso!');</script>";
	echo "<script>window.location.href='index.php?id=10.2&idArea=$idArea'</script>";
}
mysqli_close($conexao);
