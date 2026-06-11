<?php
include "session.php";

$data           = $_POST['data'];
$titulo         = $_POST['titulo'];
$descricao      = $_POST['texto'];
$status         = $_POST['status'];
$imagem_cropada = $_POST['imagem_cropada'] ?? '';
$nome_arquivo   = '';

// conecta ao banco
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

if ((empty($titulo)) || (empty($descricao)) || (empty($data))) {
	echo "<script>window.location = 'logout.php'</script>";
	exit();
} else {

	if (!empty($imagem_cropada)) {
		$base64        = preg_replace('/^data:image\/\w+;base64,/', '', $imagem_cropada);
		$dados         = base64_decode($base64);
		$rand          = rand(100000, 999999);
		$nome_original = pathinfo($_FILES['arquivo']['name'], PATHINFO_FILENAME);
		$nome_original = preg_replace('/[^a-zA-Z0-9_-]/', '', $nome_original);
		$nome_arquivo  = $rand . '-' . $nome_original . '.jpg';
		$uploadfile    = 'files/' . $nome_arquivo;

		if (!file_put_contents($uploadfile, $dados)) {
			echo "<script>alert('Erro ao salvar arquivo!'); window.history.back();</script>";
			exit();
		}
	}

	$sql  = "INSERT INTO tb_noticias (titulo, foto, descricao, data, status)
         VALUES ('$titulo', '$nome_arquivo', '$descricao', '$data', '$status')";
	$conf = $conexao->query($sql) or die($conexao->error);

	if ($conf) {
		echo "<script>alert('Cadastro realizado com sucesso!'); window.location = 'index.php?id=3'</script>";
		exit();
	}
}

mysqli_close($conexao);
