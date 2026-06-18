<?php
echo $idp = $_GET['idp'];
echo $nfile = $_GET['nfile'];
echo $idmarca = $_GET['idm'];

//exit();

if ((empty($idp)) || (empty($nfile)) || (empty($idmarca))) {
	echo "<script>window.location = 'logout.php';</script>";
	exit();
} else {

	//$file_delete = "files/" . $nfile;

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
	$sql = "UPDATE tb_produto SET foto='' WHERE id = '$idp'";
	$update = mysqli_query($conexao, $sql);
	//unlink($file_delete);

	echo "<script>alert('Imagem removida com sucesso!');</script>";
	echo "<script>window.location.href='index.php?id=6&m=$idmarca'</script>";
}
mysqli_close($conexao);
