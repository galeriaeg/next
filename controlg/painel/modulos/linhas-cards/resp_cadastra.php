<?php
include "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$linha = $_POST['linha'];
$nome_arquivo = basename($_FILES['arquivo']['name']);
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
$status = $_POST['status'];

if ((empty($linha)) || (empty($nome_arquivo))) {
	echo "<script>window.location.href = 'logout.php';</script>";
	exit();
} else {

	$validado = 0;

	// Valida altura e largura do anexo
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
	} else {
		$validado = 1;
	}


	if ($validado == 1) {
		// Valida extensão do arquivo
		$extensaoMob = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
		$extensoesPermitidas = ['png', 'jpg', 'jpeg', 'gif', 'webp', 'svg'];
		if (!in_array($extensaoMob, $extensoesPermitidas)) {
			echo "
			<script>
			alert('Tipo de arquivo inválido!');
			window.location = 'index.php?id=10.1';
			</script>";
			exit();
		} else {
			$validado = 2;
		}
	}

	if ($validado == 2) {
		// Captura titulo da linha
		$sql = "SELECT id,titulo FROM tb_linha WHERE id='$linha'";
		$cons = $conexao->query($sql) or die($conexao->error);
		while ($row = $cons->fetch_array()) {
			$id_linha = $row['id'];
			$titulo_linha	= $row['titulo'];

			$validado = 3;
		}
	}

	if ($validado == 3) {
		// Renomeia arquivo e define path
		$ran = rand(10000, 99999);
		$nome_arquivo = $ran . "-" . $nome_arquivo;
		$uploaddir = 'files/';
		$uploadfile = $uploaddir . $nome_arquivo;

		// Faz upload do arquivo
		if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {

			$sql = "INSERT INTO tb_linhas_cards (idlinha,nome,anexo,status)
		VALUES ('$id_linha','$titulo_linha','$nome_arquivo','$status')";
			$conf = $conexao->query($sql) or die($conexao->error);

			if ($conf > 0) {
				echo "
				<script>
				alert('Cadastro realizado com sucesso!');
				window.location.href = 'index.php?id=12';
				</script>";
				exit();
			}
		}
	}
}
mysqli_close($conexao);
