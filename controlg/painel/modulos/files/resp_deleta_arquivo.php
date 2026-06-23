<?php require "session.php"; ?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<?php
$idFile = (int) ($_GET['file'] ?? 0);
$nomeFile = $_GET['nome'];
$confirma = $_GET['conf'];

if ((empty($idFile)) || (empty($nomeFile))) {
	echo "<script>window.location = 'logout.php';</script>";
	exit();
} else {


	if ($confirma < 1) {
		echo "<span class='txt'>Deseja realmente excluir a imagem <b>$nomeFile</b> ? </span><br />";
		echo "<p>";
		echo "<a href=\"index.php?id=4.2&file=$idFile&nome=$nomeFile&conf=1\"><img class='botao-nao-sim' src='imgs/botao-sim.png' border='0'></a> &nbsp;&nbsp;";
		echo "<a href=\"index.php?id=4\"><img src='imgs/botao-nao.png' class='botao-nao-sim' border='0'></a>";
		echo "</p>";
		exit();
	} else {

		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		// apaga registro da imagem
		$sql = "DELETE FROM tb_files WHERE id='$idFile'";
		$del = mysqli_query($conexao, $sql);

		// atualiza tb_produto e deleta a mesma imagem
		if ($del > 0) {

			// apaga imagem do servidor
			$file_delete = "files/" . $nomeFile;
			unlink($file_delete);

			// Atualiza tab Produtos
			$sql = "UPDATE tb_produto SET file='', idfile='0' WHERE idfile = '$idFile'";
			$updateProduto = mysqli_query($conexao, $sql);

			// Atualiza tb Noticias
			$sql = "UPDATE tb_noticias SET file='', idfile='0' WHERE idfile = '$idFile'";
			$updateNoticia = mysqli_query($conexao, $sql);

			echo "<script>alert('Arquivo excluido com sucesso!');</script>";
			echo "<script>window.location.href='index.php?id=4'</script>";
		}
	}
}
mysqli_close($conexao);
