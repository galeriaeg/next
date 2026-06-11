<?php
include "session.php";

echo "<h3>$titulo</h3>";

$idp = $_GET['idp'];
$conf = $_GET['conf'];
$nomeProduto = $_GET['nomep'];
$idmarca = $_GET['idm'];
$nomeArquivo = $_GET['nome'];


if ((empty($idp)) || (empty($nomeProduto))) {
	echo "<script>window.location.href = 'logout.php'</script>";
	exit();
} else {

	if ($conf < 1) {
		echo "<span class='txt'>Deseja realmente excluir o produto <b>$nomeProduto</b> ? </span><br />";
		echo "<p>";
		echo "<a href=\"index.php?id=6.3&idp=$idp&nome=$nomeArquivo&nomep=$nomeProduto&conf=1\"><img src='imgs/botao-sim.png' class='botao-nao-sim' border='0'></a> &nbsp;&nbsp;";
		echo "<a href=\"index.php?id=6\"><img src='imgs/botao-nao.png' class='botao-nao-sim' border='0'></a>";
		echo "</p>";
	} else {
		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		if (!empty($nomeArquivo)) {
			$file_delete = "files/" . $nomeArquivo;
			unlink($file_delete);
		}

		$sql = "DELETE FROM tb_produto WHERE id='$idp'";
		$result = mysqli_query($conexao, $sql);

		if ($result > 0) {
			echo "
				<script type='text/javascript'>
				alert('Cadastro excluído com  sucesso!');
				window.location.href = 'index.php?id=6'
				</script>";
		}
	}
}

mysqli_close($conexao);
