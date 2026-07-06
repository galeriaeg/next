<?php include "session.php"; ?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<?php
$idCard = $_GET['idCard'];
$nome_arquivo = $_GET['nome_arquivo'];
$conf = $_GET['conf'];

if (empty($idCard)) {
	echo "<script>window.location.href = 'logout.php';</script>";
	exit();
} else {

	if ($conf < 1) {
		echo "<span class='txt'>Deseja realmente excluir este registro? </span><br />";
		echo "<p>";
		echo "<a href=\"index.php?id=12.3&idCard=$idCard&nome_arquivo=$nome_arquivo&conf=1\"><img src='imgs/botao-sim.png' class='botao-nao-sim' border='0'></a> &nbsp;&nbsp;";
		echo "<a href=\"index.php?id=12\"><img src='imgs/botao-nao.png' class='botao-nao-sim' 1border='0'></a>";
		echo "</p>";
	} else {

		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		// Remove anexo do servidor
		if (!empty($nome_arquivo)) {
			$file_delete = "files/" . $nome_arquivo;
			unlink($file_delete);
		}

		// Deleta registro
		$sql = "DELETE FROM tb_linhas_cards WHERE id='$idCard'";
		$qry = mysqli_query($conexao, $sql);
		if ($qry > 0) {
			echo "
				<script>
				alert('Cadastro excluído com  sucesso!');
				window.location.href = 'index.php?id=12'
				</script>";
		}
	}
}
mysqli_close($conexao);
