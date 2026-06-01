<?php
include "session.php";

$nome	=	$_POST['nome'];
$email	=	$_POST['email'];
$login	=	$_POST['login'];
$senha	=	$_POST['senha'];

if (($nome == "") or ($email == "") or ($login == "") or ($senha == "")) {
	echo "<script type='text/javascript'>window.location = 'logout.php'</script>";
	exit();
} else {

	$senha_crip = md5($senha);

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "SELECT * FROM tb_usuarios WHERE email='$email'";
	$res = mysqli_query($conexao, $sql);
	$total = mysqli_num_rows($res);

	if ($total > 0) {
		// se email ja existe
		echo "
		<script type='text/javascript'>
		alert('Erro! E-mail já cadastrado em nossa base de dados!');
		history.go(-1);
		</script>";
		exit;
	} else {
		// cadastra administrador
		$sql = "INSERT INTO tb_usuarios (
		nome,
		email,
		tipo,
		login,
		senha
		)
		VALUES (
		'$nome',
		'$email',
		1,
		'$login',
		'$senha_crip'
		)";
		$conf = $conexao->query($sql) or die($conexao->error);

		echo "
		<script type='text/javascript'>
		alert('Cadastro realizado com sucesso!');
		window.location = 'index.php?id=2'
		</script>
		";
	}
}
mysqli_close($conexao);
