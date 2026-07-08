<?php
include "session.php";

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$idCard =	$_POST['idCard'];
$idLinha =	$_POST['linha'];
$nome_arquivo = basename($_FILES['arquivo']['name'] ?? '');
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
$status =	$_POST['status'];

if ((empty($idCard)) || (empty($idLinha))) {
	echo "<script>window.location.href = 'logout.php';</script>";
	exit();
} else {

	// Captura titulo da linha
	$sql = "SELECT id,titulo FROM tb_linha WHERE id='$idLinha'";
	$cons = $conexao->query($sql) or die($conexao->error);
	while ($row = $cons->fetch_array()) {
		$id_linha = $row['id'];
		$titulo_linha	= $row['titulo'];
	}

	$update = false;

	// Valida altura e largura da imagem
	if (!empty($nome_arquivo)) {
		$dimensoes = getimagesize($arquivo_tmp);
		$largura = $dimensoes[0];
		$altura = $dimensoes[1];
		if (($largura != '300') || ($altura != '300')) {
			echo "
				<script>
				alert('Imagem com tamanho fora do padrão.');
				window.history.back();
				</script>
				";
			exit();
		}

		// Valida extensão do arquivo
		$extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
		$permitidos = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
		if (!in_array($extensao, $permitidos)) {
			echo "
			<script>
					alert('Erro! O tipo de arquivo não é permitido! Permite apenas: " . implode(', ', $permitidos) . "');
					window.location.href='index.php?id=12.1';
			</script>
			";
			exit();
		}

		// Cria prefixo randomino e concatena ao nome do arquivo
		$rand = rand(10000, 99999);
		$nome_arquivo = $rand . "-" . $nome_arquivo;
		$uploaddir = 'files/';
		$uploadfile = $uploaddir . $nome_arquivo;

		//Faz Upload
		if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
			echo "entrou";
			$sql = "UPDATE tb_linhas_cards SET idlinha='$id_linha', nome='$titulo_linha', anexo='$nome_arquivo' WHERE id = '$idCard' ";
			$update = mysqli_query($conexao, $sql);
		}
	} else {
		$sql = "UPDATE tb_linhas_cards SET idlinha='$id_linha',nome='$titulo_linha', status='$status' WHERE id = '$idCard' ";
		$update = mysqli_query($conexao, $sql);
	}

	if ($update) {
		echo "<script>
			alert('Cadastro realizado com sucesso!');
			window.location.href = 'index.php?id=12';
			</script>";
	}
}
mysqli_close($conexao);
