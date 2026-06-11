<?php
include "session.php";

$idMarca =	$_POST['idMarca'];
$nome =	$_POST['nome'];
$site =	$_POST['site'];
$status =	$_POST['status'];
$nome_arquivo = basename($_FILES['arquivo']['name']);
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

if ((empty($idMarca)) || (empty($nome))) {
	echo "<script>window.location = 'logout.php'</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	// Se tiver anexo entra na condição
	if (!empty($nome_arquivo)) {
		// valida altura e largura
		$dimensoes = getimagesize($arquivo_tmp);
		$largura = $dimensoes[0];
		$altura = $dimensoes[1];
		if (($largura != '300') || ($altura != '155')) {
			echo "Imagem com tamanho fora do padrão.<br />";
			echo "Padrão: altura:300px - Lagura:155px";
			exit();
		}

		$tipo_arquivo = substr($nome_arquivo, -4);
		if (($tipo_arquivo != ".jpg") and ($tipo_arquivo != ".gif") and ($tipo_arquivo != ".png")) {
			echo "
				<script>
				alert('Erro! O tipo de arquivo não é permitido! ');
				window.history.back();
				</script>
				";
			exit();
		}

		// cria sequencia randomica e concatena com nome da imagem;
		$rand = rand(10000, 99999);
		$nome_arquivo = $rand . "-" . $nome_arquivo;
		$uploaddir = 'files/';
		$uploadfile = $uploaddir . $nome_arquivo;

		//Faz update com anexo
		if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
			$sql = "UPDATE tb_marca SET nome='$nome',logomarca='$nome_arquivo', status='$status', site='$site' WHERE id = '$idMarca' ";
			$update = mysqli_query($conexao, $sql);
		}
	}

	//Faz update sem anexo
	$sql = "UPDATE tb_marca SET nome='$nome',status='$status', site='$site' WHERE id = '$idMarca' ";
	$update = mysqli_query($conexao, $sql);

	echo "
		<script>
		alert('Cadastro realizado com sucesso!');
		window.location = 'index.php?id=7';
		</script>";
}

mysqli_close($conexao);
