<?php
include "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$titulo =	$_POST['titulo'];
$descricao = $_POST['descricao'];
//$nome_arquivo = basename($_FILES['arquivo']['name']);
$idmarca =	$_POST['marca'];
$idlinha =	$_POST['linha'];
$status =	$_POST['status'];
echo $imagem_cropada = $_POST['imagem_cropada'] ?? '';
echo $nome_arquivo   = '';

//exit();

if (
	(empty($titulo)) ||
	(empty($descricao)) ||
	(empty($idmarca)) ||
	(empty($idlinha))
) {
	echo "<script>window.location = 'logout.php';</script>";
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

	$sql = "INSERT INTO tb_produto (titulo,descricao,foto,idmarca,idlinha,status)
		VALUES ('$titulo','$descricao','$nome_arquivo','$idmarca','$idlinha','$status')";
	$conf = $conexao->query($sql) or die($conexao->error);

	if ($conf > 0) {
		echo "<script>
			alert('Cadastro realizado com sucesso!');
			window.location = 'index.php?id=6';
			</script>";
	}
}
mysqli_close($conexao);
