<?php
require "session.php";

//$tipoUserSession =  $_SESSION['tipoUsuarioLogado'];

echo $idUserAtual = $_POST['idUsuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "SELECT id, email FROM tb_usuarios WHERE email='$email' AND id <> $idUserAtual";
$res = mysqli_query($conexao, $sql);
$total = mysqli_num_rows($res);

if ($total > 0) {
	// se email ja existe
	echo "
		<script type='text/javascript'>
		alert('Erro! E-mail já cadastrado em nossa base de dados!');
		history.go(-1);
		</script>";
	exit();
} else {

	$sql = "UPDATE tb_usuarios 
		SET nome='$nome', email='$email', login='$login'
		WHERE id = '$idUserAtual' ";
	$update = mysqli_query($conexao, $sql);

	if ($update > 0) {
		echo "
		<script type='text/javascript'>
		alert('Cadastro alterado com  sucesso!');
		window.location.href = 'index.php?id=2'
		</script>";
	}
}
mysqli_close($conexao);
