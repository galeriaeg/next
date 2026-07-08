<?php
include "session.php";

$idproduto = $_POST['idp'];
$marca = $_POST['marca'];
$linha = $_POST['linha'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$status = $_POST['status'];
$idarquivo = $_POST['id_arquivo'];

if (
	(empty($idproduto)) ||
	(empty($marca)) ||
	(empty($linha)) ||
	(empty($titulo)) ||
	(empty($descricao))
) {
	echo "
		<script>window.location.href = 'logout.php'</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	if (empty($idarquivo)) {
		//Atualiza sem anexo
		$sql = "UPDATE tb_produto SET titulo='$titulo',descricao='$descricao',idmarca='$marca',idlinha='$linha',status='$status' WHERE id = '$idproduto' ";
		$update = mysqli_query($conexao, $sql);
		echo "<script>
    		alert('Cadastro realizado com sucesso!');
    		window.location.href = 'index.php?id=6&m=$marca';
    		</script>";
	} else {
		//Atualiza com anexo

		// pega nome do arquivo
		$sql = "SELECT imagem FROM tb_files WHERE id='$idarquivo' ";
		$res = mysqli_query($conexao, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$file = $row['imagem'];
		}

		// atualiza com novo arquivo
		$sql = "UPDATE tb_produto SET titulo='$titulo',descricao='$descricao',file='$file',idfile='$idarquivo',idmarca='$marca',idlinha='$linha',status='$status' WHERE id = '$idproduto' ";
		$update = mysqli_query($conexao, $sql);

		if ($file > 0) {
			echo "
					<script type='text/javascript'>
					alert('Cadastro realizado com sucesso!');
					window.location.href = 'index.php?id=6&m=$marca';
					</script>";
		}
	}
}
mysqli_close($conexao);
