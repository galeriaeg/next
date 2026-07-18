<?php
include "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$idArea =	$_POST['idArea'];
$legenda =	$_POST['legenda'];
$texto =	$_POST['texto'];
$nome_arquivo = basename($_FILES['arquivo']['name']);
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

if ((empty($idArea)) || (empty($legenda)) || (empty($texto))) {
	echo "<script>window.location.href = 'logout.php'</script>";
	exit();
} else {

	$update = 0;

	// Se tiver anexo entra na condição
	if (!empty($nome_arquivo)) {

		$validado = 0;

		// Valida altura e largura do arquivo
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
			window.history.back();
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

			//Faz update com anexo
			if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
				$sql = "UPDATE tb_area_atuacao SET legenda='$legenda', mapa='$nome_arquivo', texto='$texto' WHERE id = '$idArea' ";
				$update = mysqli_query($conexao, $sql);
			}
		}
	} else {
		//Faz update sem anexo
		$sql = "UPDATE tb_area_atuacao SET legenda='$legenda', texto='$texto' WHERE id = '$idArea' ";
		$update = mysqli_query($conexao, $sql);
	}

	if ($update > 0) {
		echo "
				<script type='text/javascript'>
				alert('Cadastro realizado com sucesso!');
				window.location.href = 'index.php?id=10';
				</script>";
	}
}
