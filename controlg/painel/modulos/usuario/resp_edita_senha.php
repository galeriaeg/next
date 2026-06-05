<?php

require "session.php";

$idUserAtual = $_POST['idUsuario'];
$senha = $_POST['senha'];

$senha_crip = md5($senha);

if ((empty($idUserAtual)) || (empty($senha))) {
	echo "<script>window.location = 'logout.php'</script>";
	exit();
} else {
	$tamanho = mb_strlen($senha);
	if ($tamanho < 8) {
		echo "<script>alert('Erro! Sua senha deve ter no mínimo 8 caracteres!');</script>";
		echo "<script>window.location.href = 'index.php?id=2.2&u=$idUserAtual'</script>";
		exit();
	}

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = " UPDATE tb_usuarios SET senha='$senha_crip' WHERE id = '$idUserAtual' ";
	$update = mysqli_query($conexao, $sql);

	if ($update > 0) {
		echo "<script>alert('Senha alterada com sucesso! Faça login novamente.');</script>";
		//echo "<script>window.location.href = 'index.php?id=2.2&u=$idUserAtual'</script>";
		echo "<script>window.location = 'logout.php'</script>";
		exit();
	}
}

mysqli_close($conexao);
