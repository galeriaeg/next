<?php
session_start();

// TESTA SE O USUARIO CLICOU NO SUBMIT
$btnLogin = filter_input(INPUT_POST, 'btnLogin');

if ($btnLogin) {
	$login = filter_input(INPUT_POST, 'login');
	$senha = filter_input(INPUT_POST, 'senha');
} else {
	header("Location: index.php");
	exit();
}

if ((empty($login)) or (empty($senha))) {
	echo "<script>this.location='index.php';</script>";
	exit();
} else {

	$senha = md5($senha);

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "SELECT * FROM tb_usuarios 
		WHERE login = '$login' 
		AND senha = '$senha' 
		AND tipo <> 0
		AND status <> 'INATIVO'";
	$res = mysqli_query($conexao, $sql);
	$total = mysqli_num_rows($res);
	while ($row = mysqli_fetch_array($res)) {
		$idu		= $row['id'];
		$nomeu	= $row['nome'];
		$emailu	= $row['email'];
		$loginu	= $row['login'];
		$tipou	= $row['tipo'];
	}

	if ($total > 0) {

		$_SESSION["idUsuarioLogado"]		= $idu;
		$_SESSION["nomeUsuarioLogado"]	= $nomeu;
		$_SESSION["loginUsuarioLogado"]	= $loginu;
		$_SESSION["tipoUsuarioLogado"]	= $tipou;

		echo "<script>this.location = 'painel/index.php';</script>";
	} else {
		echo "<script>this.location.href='index.php?aut=erro';</script>";
		exit();
	}
}

mysqli_close($conexao);
