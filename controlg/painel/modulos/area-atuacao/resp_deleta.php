<?php
include "session.php";
?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<?php
$idArea = $_GET['idArea'];
$conf = $_GET['conf'] ?? 0;

if (empty($idArea)) {
	echo "<script>window.location.href = 'logout.php';</script>";
	exit();
} else {

	if ($conf < 1) {
		echo "<span class='txt'>Deseja realmente excluir este registro? </span><br />";
		echo "<p>";
		echo "<a href='index.php?id=10.3&idArea=$idArea&conf=1'><img class='botao-nao-sim' src='imgs/botao-sim.png' border='0'></a> &nbsp;&nbsp;";
		echo "<a href='index.php?id=10'><img src='imgs/botao-nao.png' class='botao-nao-sim' border='0'></a>";
		echo "</p>";
	} else {

		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		// Se exiir anexo deleta do servidor
		$sql = "SELECT mapa FROM tb_area_atuacao WHERE id=$idArea";
		$cons = $conexao->query($sql) or die($conexao->error);
		while ($row = $cons->fetch_array()) {
			$anexo	=	$row['mapa'];
		}
		if (!empty($anexo)) {
			$file_delete = "files/" . $anexo;
			unlink($file_delete);
		}

		$sql = "DELETE FROM tb_area_atuacao WHERE id='$idArea'";
		$qry = mysqli_query($conexao, $sql);
		if ($qry > 0) {
			echo "
			<script>
				alert('Cadastro excluído com  sucesso!');
				window.location.href = 'index.php?id=10'
			</script>";
		}
	}
}
mysqli_close($conexao);
