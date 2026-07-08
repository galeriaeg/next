<?php
include "session.php";

$titulo =	strtolower($_POST['titulo']); // converte para minusculo
$imagem_cropada = $_POST['imagem_cropada'] ?? '';

// Define data e hora atual
date_default_timezone_set('America/Sao_Paulo');
$dataHoraAtual = date('d/m/Y H:i:s');


if ((empty($titulo)) || (empty($imagem_cropada))) {
	echo "<script>window.location.href = 'logout.php';</script>";
	exit();
} else {

	$base64 = preg_replace('/^data:image\/\w+;base64,/', '', $imagem_cropada);
	$dados = base64_decode($base64);

	$titulo_limpo = preg_replace('/[^a-zA-Z0-9_-]/', '-', $titulo);
	$titulo_limpo = preg_replace('/-+/', '-', $titulo_limpo);

	$nome_arquivo = rand(10000, 99999) . '-' . strtolower($titulo_limpo)  . '.jpg';

	if (file_put_contents('files/' . $nome_arquivo, $dados)) {

		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		$sql = "INSERT INTO tb_files
                (imagem,nome,data_cadastro)
                VALUES
                ('$nome_arquivo','$titulo','$dataHoraAtual')";

		$conexao->query($sql);

		echo "<script>
                alert('Cadastro realizado com sucesso!');
                window.location.href='index.php?id=4';
              </script>";
	}
}
mysqli_close($conexao);
