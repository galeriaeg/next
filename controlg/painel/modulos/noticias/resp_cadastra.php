<?php
include "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$data				= $_POST['data'];
$titulo			= $_POST['titulo'];
$descricao	= $_POST['texto'];
$id_arquivo	= $_POST['id_arquivo'];
$status     = $_POST['status'];


if ((empty($titulo)) || (empty($descricao)) || (empty($data))) {
	echo "<script>window.location = 'logout.php'</script>";
	exit();
} else {

	// pega nome do arquivo na tb_files
	$sql = "SELECT imagem FROM tb_files WHERE id='$id_arquivo' ";
	$res = mysqli_query($conexao, $sql);
	while ($row = mysqli_fetch_array($res)) {
		echo $file = $row['imagem'];
	}

	$sql  = "INSERT INTO tb_noticias (titulo, file, idfile, descricao, data, status)
         VALUES ('$titulo', '$file','$id_arquivo','$descricao', '$data', '$status')";
	$conf = $conexao->query($sql) or die($conexao->error);

	if ($conf) {
		echo "<script>alert('Cadastro realizado com sucesso!'); window.location = 'index.php?id=3'</script>";
		exit();
	}
}

mysqli_close($conexao);
