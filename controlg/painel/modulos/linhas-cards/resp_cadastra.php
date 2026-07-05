<?php
include "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$linha = $_POST['linha'];
$nome_arquivo = basename($_FILES['arquivo']['name']);
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

if ((empty($linha)) || (empty($nome_arquivo))) {
	echo "<script>window.location = 'logout.php';</script>";
	exit();
} else {

	// Valida altura e largura
	$dimensoes = getimagesize($arquivo_tmp);
	$largura = $dimensoes[0];
	$altura = $dimensoes[1];
	if (($largura != '300') || ($altura != '300')) {
		echo "
			<script>
			alert('Imagem com tamanho fora do padrão.');
			window.history.back();
			</script>
			";
		exit();
	}

	$rand = rand(1000, 99999);
	$nome_arquivo = $rand . "-" . $nome_arquivo;
	$extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
	$permitidos = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
	if (!in_array($extensao, $permitidos)) {
		echo "
    <script>
        alert('Erro! O tipo de arquivo não é permitido! Permite apenas: " . implode(', ', $permitidos) . "');
        window.location.href='index.php?id=12.1';
    </script>
    ";
		exit();
	}

	// Captura titulo da linha
	$sql = "SELECT id,titulo FROM tb_linha WHERE id='$linha'";
	$cons = $conexao->query($sql) or die($conexao->error);
	while ($row = $cons->fetch_array()) {
		echo $id_linha = $row['id'];
		echo $titulo_linha	= $row['titulo'];
	}


	$uploaddir = 'files/';
	$uploadfile = $uploaddir . $nome_arquivo;
	if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {

		$sql = "INSERT INTO tb_linhas_cards (idlinha,nome,anexo,status)
		VALUES ('$id_linha','$titulo_linha','$nome_arquivo',1)";
		$conf = $conexao->query($sql) or die($conexao->error);

		echo "
			<script>
			alert('Cadastro realizado com sucesso!');
			window.location = 'index.php?id=12';
			</script>";
		exit();
	}
}
mysqli_close($conexao);
