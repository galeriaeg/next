<?php
$idp = $_GET['idp'];
$nfile = $_GET['nfile'];
$idmarca = $_GET['idm'];

if ((empty($idp)) || (empty($nfile)) || (empty($idmarca))) {
	echo "<script>window.location.href = 'logout.php';</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
	$sql = "UPDATE tb_produto SET file='',idfile=0 WHERE id = '$idp'";
	$update = mysqli_query($conexao, $sql);

	if ($update > 0) {
		echo "<script>alert('Imagem removida com sucesso!');</script>";
		echo "<script>window.location.href='index.php?id=6.2&m=$idp'</script>";
	}
}
mysqli_close($conexao);
