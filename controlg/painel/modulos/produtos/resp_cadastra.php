<?php
include "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$titulo =	$_POST['titulo'];
$descricao = $_POST['descricao'];
$idarquivo = $_POST['id_arquivo'];
$idmarca =	$_POST['marca'];
$idlinha =	$_POST['linha'];
$status =	$_POST['status'];

if (
	(empty($titulo)) ||
	(empty($descricao)) ||
	(empty($idmarca)) ||
	(empty($idlinha))
) {
	echo "<script>window.location = 'logout.php';</script>";
	exit();
} else {

	// pega nome do arquivo na tb_files
	$sql = "SELECT imagem FROM tb_files WHERE id='$idarquivo' ";
	$res = mysqli_query($conexao, $sql);
	while ($row = mysqli_fetch_array($res)) {
		$file = $row['imagem'];
	}

	$sql = "INSERT INTO tb_produto (titulo,descricao,file,idfile,idmarca,idlinha,status)
		VALUES ('$titulo','$descricao','$file','$idarquivo','$idmarca','$idlinha','$status')";
	$conf = $conexao->query($sql) or die($conexao->error);

	if ($conf > 0) {
		echo "<script>
			alert('Cadastro realizado com sucesso!');
			window.location = 'index.php?id=6';
			</script>";
	}
}
mysqli_close($conexao);
