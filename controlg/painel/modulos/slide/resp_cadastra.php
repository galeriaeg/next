<?php
include "session.php";

$nome_arquivo_dsk	=	strtolower(basename($_FILES['arquivoDesktop']['name']));
$nome_arquivo_mob	=	strtolower(basename($_FILES['arquivoMobile']['name']));
$link = $_POST["link"];
$destino = $_POST["destino"];
$status = $_POST["status"];

if (
	(empty($nome_arquivo_dsk)) ||
	(empty($nome_arquivo_mob)) ||
	(empty($link)) ||
	(empty($destino))
) {
	echo "<script>window.location = 'logout.php';</script>";
	exit();
} else {
	$rand = rand(10000, 99999);

	$extensaoDesk = pathinfo($nome_arquivo_dsk, PATHINFO_EXTENSION);
	if (($extensaoDesk != "png") && ($extensaoDesk != "jpg") && ($extensaoDesk != "jpeg")) {
		echo "
			<script>
			alert('Arquivo inválido para desktop!');
			window.location = 'index.php?id=5.1';
			</script>";
	}

	$extensaoMob = pathinfo($nome_arquivo_mob, PATHINFO_EXTENSION);
	if (($extensaoMob != "png") && ($extensaoMob != "jpg") && ($extensaoMob != "jpeg")) {
		echo "
			<script>
			alert('Arquivo inválido para mobile!');
			window.location = 'index.php?id=5.1';
			</script>";
		exit();
	}

	$nome_arquivo_dsk = $rand . "-" . $nome_arquivo_dsk;
	$nome_arquivo_mob = $rand * 4 . "-" . $nome_arquivo_mob;

	$uploaddir = 'files/';
	$uploadfile_dsk = $uploaddir . $nome_arquivo_dsk;
	$uploadfile_mob = $uploaddir . $nome_arquivo_mob;

	//Verifica se o upload foi enviado, caso verdadeito, executa o CADASTRO
	if ((move_uploaded_file($_FILES['arquivoDesktop']['tmp_name'], $uploadfile_dsk)) and
		(move_uploaded_file($_FILES['arquivoMobile']['tmp_name'], $uploadfile_mob))
	) {

		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		$sql = "INSERT INTO tb_slider (img_desk, img_mob, link, destino, status)
		VALUES ('$nome_arquivo_dsk','$nome_arquivo_mob','$link','$destino','$status')";
		$conf = $conexao->query($sql) or die($conexao->error);

		if ($conf) {
			echo "
			<script type='text/javascript'>
			alert('Cadastro realizado com sucesso!');
			window.location = 'index.php?id=5';
			</script>";
		}
	}
}
mysqli_close($conexao);
