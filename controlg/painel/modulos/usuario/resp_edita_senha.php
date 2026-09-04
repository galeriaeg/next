<?php

require "session.php";

//===== PEGA DATA E HORA ATUAL =====//
date_default_timezone_set('America/Sao_Paulo');
$data_atual = date('d/m/Y');
$hora_atual = date('H:i');

$idUserAtual = $_POST['idUsuario'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);

if ((empty($idUserAtual)) || (empty($senha))) {
	echo "<script>window.location.href = 'logout.php'</script>";
	exit();
} else {
	$tamanho = mb_strlen($senha);
	if ($tamanho < 8) {
		echo "<script>alert('Erro! Sua senha deve ter no mínimo 8 caracteres!');</script>";
		echo "<script>window.location.href = 'index.php?id=2.2&u=$idUserAtual'</script>";
		exit();
	}

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	//PEGA EMAIL DO USUARIO LOGADO
	$sql = "SELECT email FROM tb_usuarios WHERE id='$idUserAtual'";
	$cons = $conexao->query($sql) or die($conexao->error);
	while ($row = $cons->fetch_array()) {
		$email_usuario_logado = $row['email'];
	}
	$sql = " UPDATE tb_cron 
	SET tipo_senha='ALTERADA', dt_senha_alterada='$data_atual', hr_senha_alterada ='$hora_atual' 
	WHERE email = '$email_usuario_logado' AND  tipo_senha='GERADA' AND senha_expirada='FALSE'";
	$updateCron = mysqli_query($conexao, $sql);

	if ($updateCron > 0) {
		$sql = " UPDATE tb_usuarios SET senha='$senha_crip' WHERE id = '$idUserAtual' ";
		$updateUser = mysqli_query($conexao, $sql);

		if ($updateUser > 0) {
			echo "<script>alert('Senha alterada com sucesso! Faça login novamente.');</script>";
			echo "<script>window.location.href = 'logout.php'</script>";
			exit();
		}
	}
}

mysqli_close($conexao);
