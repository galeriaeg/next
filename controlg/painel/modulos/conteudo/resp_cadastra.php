<?php
include("session.php");

$titulo =	$_POST['titulo'];
$texto	=	$_POST['texto'];
$texto = str_replace(['<p>', '</p>'], '', $texto);
$tipo	=	$_POST['tipo'];
$mapaIframe = $_POST['mapa'] ?? '';

$pos = explode(':', $tipo);
$tipoCont = $pos[0];
$pagina = $pos[1];


if (($titulo == "") or ($texto == "") or ($tipo == "")) {
	echo "
		<script type='text/javascript'>
		window.location = 'logout.php'
		</script>
		";
	exit();
}

//tratamento do Mapa: pega somente src
$mapa = "";
$iniciaComIframe = (stripos(trim($mapaIframe), '<iframe') === 0);
if ($iniciaComIframe) {
	if (preg_match('/src=["\']([^"\']+)["\']/', $mapaIframe, $matches)) {
		$mapa = $matches[1];
	}
}

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "INSERT INTO tb_conteudo (
	pagina,titulo,texto,tipo,plus
	)
	VALUES (
	'$pagina','$titulo','$texto','$tipoCont','$mapa'
	)";
$conf = $conexao->query($sql) or die($conexao->error);



if ($conf > 0) {
	echo "
		<script type='text/javascript'>
		alert('Cadastro realizado com sucesso!');
		window.location = 'index.php?id=8'
		</script>";
}
mysqli_close($conexao);
