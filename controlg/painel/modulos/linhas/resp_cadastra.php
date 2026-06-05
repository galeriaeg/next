<?php
include "session.php";

echo $titulo = $_POST['linha'];
echo $marca = $_POST['marca'];

//exit();

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
