<?php
include "session.php";

$nome_arquivo_dsk	=	strtolower(basename($_FILES['arquivoDesktop']['name']));
echo $nome_arquivo_mob	=	strtolower(basename($_FILES['arquivoMobile']['name']));
$id			=	$_POST['id'];
$link		=	$_POST['link'];
$destino	=	$_POST['destino'];
$status		=	$_POST['status'];


if ((empty($id)) || (empty($link)) || (empty($destino))) {
	echo "<script>window.location.href = 'logout.php'</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$rand = rand(10000, 99999);
	$uploaddir = 'files/';

	if (!empty($nome_arquivo_dsk)) {
		$extensaoDesk = pathinfo($nome_arquivo_dsk, PATHINFO_EXTENSION);
		if (($extensaoDesk != "png") && ($extensaoDesk != "jpg") && ($extensaoDesk != "jpeg")) {
			echo "
			<script>
			alert('Arquivo inválido para desktop!');
			window.location.href = 'index.php?id=5.1';
			</script>";
		}
		$nome_arquivo_dsk = $rand . "-" . $nome_arquivo_dsk;
		$uploadfile_dsk = $uploaddir . $nome_arquivo_dsk;
		if (move_uploaded_file($_FILES['arquivoDesktop']['tmp_name'], $uploadfile_dsk)) {
			$sql = " UPDATE tb_slider SET img_desk='$nome_arquivo_dsk' WHERE id = '$id'  ";
			$update = mysqli_query($conexao, $sql);
		}
	}




	if (!empty($nome_arquivo_mob)) {
		$extensaoMob = pathinfo($nome_arquivo_mob, PATHINFO_EXTENSION);
		if (($extensaoMob != "png") && ($extensaoMob != "jpg") && ($extensaoMob != "jpeg")) {
			echo "
			<script>
			alert('Arquivo inválido para desktop!');
			window.location.href = 'index.php?id=5.1';
			</script>";
		}
		$nome_arquivo_mob = $rand * 4 . "-" . $nome_arquivo_mob;
		$uploadfile_mob = $uploaddir . $nome_arquivo_mob;
		if (move_uploaded_file($_FILES['arquivoMobile']['tmp_name'], $uploadfile_mob)) {
			$sql = " UPDATE tb_slider SET img_mob='$nome_arquivo_mob' WHERE id = '$id'  ";
			$update = mysqli_query($conexao, $sql);
		}
	}



	$sql = " UPDATE tb_slider SET link='$link', destino='$destino', status='$status'  WHERE id = '$id'  ";
	$update = mysqli_query($conexao, $sql);
	if ($update) {
		echo "
			<script>
			alert('Cadastro atualizado com sucesso!');
			window.location.href = 'index.php?id=5'
			</script>";
	}

	mysqli_close($conexao);
}
