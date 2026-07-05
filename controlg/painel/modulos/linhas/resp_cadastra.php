<?php
include "session.php";

$titulo = $_POST['linha'];
$marca = $_POST['marca'];

if ((empty($titulo)) || (empty($marca)) || ($marca == 0)) {
	echo "<script>window.location = 'logout.php';</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "INSERT INTO tb_linha (titulo,idmarca)
		VALUES ('$titulo','$marca')";
	$conf = $conexao->query($sql) or die($conexao->error);

	if ($conf) {
		echo "
			<script>
			alert('Cadastro realizado com sucesso!');
			window.location = 'index.php?id=9';
			</script>";
	}
}
mysqli_close($conexao);