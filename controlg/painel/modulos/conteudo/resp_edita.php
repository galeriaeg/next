<?php
include "session.php";

$idc =	$_POST['idc'];
$titulo	= $_POST['titulo'];
$texto = $_POST['texto'];
$texto = str_replace(['<p>', '</p>'], '', $texto);
$pagina =	$_POST['pagina'];
$mapaIframe = $_POST['mapa'] ?? '';

//tratamento do Mapa: pega somente src
$iniciaComIframe = (stripos(trim($mapaIframe), '<iframe') === 0);
if ($iniciaComIframe) {
	if (preg_match('/src=["\']([^"\']+)["\']/', $mapaIframe, $matches)) {
		$mapa = $matches[1];
	}
}


if (($titulo == "") or ($texto == "") or ($pagina == "")) {
	echo "<script>window.location = 'logout.php'</script>";
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "UPDATE tb_conteudo SET titulo='$titulo', texto='$texto', plus='$mapa' WHERE id = '$idc' ";
	$update = mysqli_query($conexao, $sql);

	if ($update > 0) {
		echo "
			<script>
			alert('Cadastro alterado com  sucesso!');
			window.location.href = 'index.php?id=8'
			</script>";
		exit();
	}
}
mysqli_close($conexao);
