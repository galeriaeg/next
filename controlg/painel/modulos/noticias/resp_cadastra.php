<?php
include "session.php";

$data =	$_POST['data'];
$titulo =	$_POST['titulo'];
$descricao	=	$_POST['texto'];
$status	=	$_POST['status'];
$nome_arquivo = basename($_FILES['arquivo']['name']);

if ((empty($titulo)) || (empty($descricao)) || (empty($status))) {
	echo "<script>window.location = 'logout.php'</script>";
	exit();
}

$ran = rand(10000, 99999);
$nome_arquivo = $ran . "-" . $nome_arquivo;
$valida = substr($nome_arquivo, -4);
if (($valida != ".jpg") and ($valida != ".gif") and ($valida != ".png")) {
	echo "
			<script>
			alert('Erro! O tipo de arquivo não é permitido! ');
			window.history.back();
			</script>
			";
	exit();
}

$uploaddir = 'files/';
$uploadfile = $uploaddir . $nome_arquivo;

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {

	$sql = "INSERT INTO tb_noticias (
	titulo,foto,descricao,data,status
	)
	VALUES (
	'$titulo','$nome_arquivo','$descricao','$data','$status'
	)";
	$conf = $conexao->query($sql) or die($conexao->error);

	if ($conf > 0) {
		echo "
		<script>
		alert('Cadastro realizado com sucesso!');
		window.location = 'index.php?id=3'
		</script>";
		exit();
	}
}
mysqli_close($conexao);
