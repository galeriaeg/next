<?php
include "session.php";

$idmarca =	$_POST['marca'];
$legenda =	$_POST['legenda'];
$texto =	$_POST['texto'];
$nome_arquivo = basename($_FILES['arquivo']['name']);
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

if ((empty($idmarca)) || (empty($legenda)) || (empty($texto)) || (empty($nome_arquivo))) {
	echo "<script>window.location.href = 'logout.php';</script>";
	exit();
} else {

	$validado = 0;

	// Valida altura e largura do anexo
	$dimensoes = getimagesize($arquivo_tmp);
	$largura = $dimensoes[0];
	$altura = $dimensoes[1];
	if (($largura != '600') || ($altura != '600')) {
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
			window.location.href = 'index.php?id=10.1';
			</script>";
			exit();
		} else {
			$validado = 2;
		}
	}


	if ($validado == 2) {
		// Renomeia arquivo e define path
		$ran = rand(10000, 99999);
		$nome_arquivo = $ran . "-" . $nome_arquivo;
		$uploaddir = 'files/';
		$uploadfile = $uploaddir . $nome_arquivo;

		// Faz upload do arquivo
		if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {

			include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

			$sql = "INSERT INTO tb_area_atuacao (idmarca,legenda,mapa,texto)
			VALUES ('$idmarca','$legenda','$nome_arquivo','$texto')";
			$conf = $conexao->query($sql) or die($conexao->error);

			if ($conf > 0) {
				echo "
				<script type='text/javascript'>
				alert('Cadastro realizado com sucesso!');
				window.location.href = 'index.php?id=10';
				</script>";
			}
		}
	}
}
mysqli_close($conexao);
