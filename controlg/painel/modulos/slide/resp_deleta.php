<?php include "session.php"; ?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<?php
$idSlide = $_GET['idSlide'];
$nomeFileDsk = $_GET['filedsk'];
$nomeFileMob = $_GET['filemob'];
$conf = $_GET['conf'] ?? 0;

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

if ($conf < 1) {
	echo "<span class='txt'>Deseja realmente excluir o anexo ?</span><br />";
	echo "<p>";
	echo "<a href='index.php?id=5.3&conf=1&idSlide=" . $idSlide . "&filedsk=" . $nomeFileDsk . "&filemob=" . $nomeFileMob . "'><img class='botao-nao-sim' alt='sim' src='imgs/botao-sim.png' border='0'></a>";
	echo "<a href='index.php?id=5'><img src='imgs/botao-nao.png' class='botao-nao-sim' border='0'></a>";
	echo "</p>";
} else {



	if (!empty($nomeFileDsk)) {
		echo "apagou desk";
		unlink("files/" . $nomeFileDsk);
	}

	if (!empty($nomeFileMob)) {
		echo "apagou mob";
		unlink("files/" . $nomeFileMob);
	}

	$sql = "DELETE FROM tb_slider WHERE id='$idSlide'";
	$result = mysqli_query($conexao, $sql);

	if ($result > 0) {
		echo "<script>alert('Cadastro excluído com sucesso.');</script>";
		echo "<script>window.location = 'index.php?id=5'</script>";
	}
}
mysqli_close($conexao);
