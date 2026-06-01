<?php
include("session.php");

$dataNoticia =	$_POST['data'];
$tituloNoticia =	$_POST['titulo'];
$textoNoticia =	$_POST['texto'];
$anexoNoticia =	$_POST['anexo'];
$statusNoticia =	$_POST['status'];
$idNoticia =	$_POST['idNoticia'];

if (empty($idNoticia)) {
	echo "
		<script>window.location = 'logout.php'</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "UPDATE tb_noticias SET 
		titulo='$tituloNoticia',
		descricao='$textoNoticia',
		data='$dataNoticia',
		status='$statusNoticia'
		WHERE id = '$idNoticia' ";
	$update = mysqli_query($conexao, $sql);

	if ($update > 0) {
		echo "
			<script>
			alert('Cadastro alterado com  sucesso!');
			window.location.href = 'index.php?id=3'
			</script>";
		exit();
	}
}
mysqli_close($conexao);
