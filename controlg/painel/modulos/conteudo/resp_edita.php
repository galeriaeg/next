<?php
include "session.php";

$idc =	$_POST['idc'];
$titulo	= $_POST['titulo'];
$texto = $_POST['texto'];
$texto = str_replace(['<p>', '</p>'], '', $texto);
$pagina =	$_POST['pagina'];
$mapa = $_POST['mapa'] ?? '';

//tratamento do Mapa: pega somente src
$iniciaComIframe = (stripos(trim($mapa), '<iframe') === 0);
if ($iniciaComIframe) {
	if (preg_match('/src=["\']([^"\']+)["\']/', $mapa, $matches)) {
		$mapa = $matches[1];
	}
}

if ((empty($titulo)) || (empty($texto)) || (empty($pagina))) {
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
