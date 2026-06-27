<?php
include "session.php";

echo $nome_arquivo_dsk	=	strtolower(basename($_FILES['arquivoDesktop']['name']));
echo $nome_arquivo_mob	=	strtolower(basename($_FILES['arquivoMobile']['name']));
echo $id			=	$_POST['id'];
echo $link		=	$_POST['link'];
echo $destino	=	$_POST['destino'];
echo $status		=	$_POST['status'];



if ((empty($id)) || (empty($link)) || (empty($destino))) {
	echo "<script>window.location = 'logout.php'</script>";
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
			window.location = 'index.php?id=5.1';
			</script>";
		}
		$nome_arquivo_dsk = $rand . "-" . $nome_arquivo_dsk;
		$uploadfile_dsk = $uploaddir . $nome_arquivo_dsk;
		if (move_uploaded_file($_FILES['arquivoDesktop']['tmp_name'], $uploadfile_dsk)) {
			$sql = "INSERT INTO tb_slider (img_desk, img_mob, link, destino, status)
		VALUES ('$nome_arquivo_dsk','$nome_arquivo_mob','$link','$destino','$status')";
			$conf = $conexao->query($sql) or die($conexao->error);
		}
		$sql = " UPDATE tb_slider SET img_desk='$nome_arquivo_dsk', link='$link', destino='$destino', status='$status'  WHERE id = '$id'  ";
		$update = mysqli_query($conexao, $sql);
	}



	if (!empty($nome_arquivo_mob)) {
		$extensaoMob = pathinfo($nome_arquivo_mob, PATHINFO_EXTENSION);
		if (($extensaoMob != "png") && ($extensaoMob != "jpg") && ($extensaoMob != "jpeg")) {
			echo "
			<script>
			alert('Arquivo inválido para mobile!');
			window.location = 'index.php?id=5.1';
			</script>";
			exit();
		}
		$nome_arquivo_mob = $rand * 4 . "-" . $nome_arquivo_mob;
		$uploadfile_mob = $uploaddir . $nome_arquivo_mob;
		$sql = " UPDATE tb_slider SET img_mob='$nome_arquivo_mob', link='$link', destino='$destino', status='$status'  WHERE id = '$id'  ";
		$update = mysqli_query($conexao, $sql);
	}

	$sql = " UPDATE tb_slider SET link='$link', destino='$destino', status='$status'  WHERE id = '$id'  ";
	$update = mysqli_query($conexao, $sql);
	if ($update) {
		echo "
			<script>
			alert('Cadastro atualizado com sucesso!');
			window.location = 'index.php?id=5'
			</script>";
	}

	mysqli_close($conexao);
}
