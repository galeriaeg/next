<?php
include "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$celular	= mysqli_real_escape_string($conexao, $_POST['celular'] ?? '');
$email 	=	mysqli_real_escape_string($conexao, $_POST['email'] ?? '');
$email = mb_strtolower($email, 'UTF-8');
$status 	=	isset($_POST['status']) ? $_POST['status'] : '0';


if ((empty($celular)) || (empty($email))) {
	echo "<script>window.location.herf = 'logout.php';</script>";
	exit();
} else {

	$sql = "UPDATE tb_contatos SET celular='$celular', email='$email', status='$status' WHERE dados_default = 'SIM' ";
	$update = mysqli_query($conexao, $sql);

	if ($update > 0) {
		echo "<script>
			alert('Cadastro realizado com sucesso!');
			window.location.href = 'index.php?id=11';
			</script>";
	}
}
mysqli_close($conexao);
