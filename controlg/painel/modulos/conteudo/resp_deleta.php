<?php
include "session.php";

echo "<h3>$titulo</h3>";

$idCont = $_GET['idCont'];
$nome = $_GET['pagina'];
$conf = $_GET['conf'];

if ($conf < 1) {
	echo "<span class='txt'>Deseja realmente excluir o conteúdo da página <b>$nome</b> ? </span><br />";
	echo "<p>";
	echo "<a href=\"index.php?id=8.3&idCont=$idCont&nome=$nome&conf=1\"><img src='imgs/botao-sim.png' class='botao-nao-sim' border='0'></a> &nbsp;&nbsp;";
	echo "<a href=\"index.php?id=8\"><img src='imgs/botao-nao.png' class='botao-nao-sim' border='0'></a>";
	echo "</p>";
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "DELETE FROM tb_conteudo WHERE id='$idCont'";
	$qry = mysqli_query($conexao, $sql);

	if ($qry > 0) {
		echo "
			<script type='text/javascript'>
			alert('Cadastro excluído com  sucesso!');
			window.location.href = 'index.php?id=8'
			</script>";
	}
	mysqli_close($conexao);
}
