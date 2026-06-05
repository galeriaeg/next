<?php
include "session.php";

$titulo =	$_POST['titulo'];
$site =	$_POST['site'];
$nome_arquivo = basename($_FILES['arquivo']['name']);
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

if ((empty($titulo)) || (empty($nome_arquivo))) {
	echo "<script>window.location = 'logout.php';</script>";
	exit();
} else {

	// valida altura e largura
	$dimensoes = getimagesize($arquivo_tmp);
	$largura = $dimensoes[0];
	$altura = $dimensoes[1];
	if (($largura != '300') || ($altura != '155')) {
		echo "
			<script>
			alert('Imagem com tamanho fora do padrão.');
			window.history.back();
			</script>
			";
		echo "Imagem com tamanho fora do padrão.<br />";
		echo "Padrão: Lagura:300px - altura:155px";
		exit();
	}

	$ran = rand(1000, 99999);
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

	if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {

		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		$sql = "INSERT INTO tb_marca (nome,logomarca,site,status)
			VALUES ('$titulo','$nome_arquivo','$site',1)";
		$conf = $conexao->query($sql) or die($conexao->error);


		echo "
			<script type='text/javascript'>
			alert('Cadastro realizado com sucesso!');
			window.location = 'index.php?id=7';
			</script>";
	}
}
mysqli_close($conexao);
