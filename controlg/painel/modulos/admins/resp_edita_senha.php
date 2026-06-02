<?php

require "session.php";

// CONTROLE DE ACESSO
$idUserAtual = $_POST['u'];
//require_once("controle.php");

$senha = $_POST['senha'];

$senha_crip = md5($senha);

if (($idUserAtual == "") || ($senha == "")) {
	session_unset();
	session_destroy();
	unset($_SESSION['nome']);
	unset($_SESSION['login']);
	echo "<script type='text/javascript'>
		window.location = 'logout.php'
		</script>";
} else {
	$tamanho = mb_strlen($senha);
	if ($tamanho < 8) {
		echo "<script>alert('Erro! Sua senha deve ter no mínimo 8 caracteres!');</script>";
		echo "<script>window.location.href = 'index.php?id=2.2&u=$idUserAtual'</script>";
	}

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = " UPDATE tb_usuarios SET senha='$senha_crip' WHERE id = '$idUserAtual' ";
	$update = mysqli_query($conexao, $sql);

	if ($update > 0) {
		echo "<script>alert('Senha alterada com sucesso!');</script>";
		echo "<script>window.location.href = 'index.php?id=2.2&u=$idUserAtual'</script>";
	}
}



mysqli_close($conexao);
