<?php
include "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

// Proteção contra SQL Injection e captura limpa dos dados
$idNoticia     = mysqli_real_escape_string($conexao, $_POST['idNoticia'] ?? '');
$dataNoticia   = mysqli_real_escape_string($conexao, $_POST['data'] ?? '');
$tituloNoticia = mysqli_real_escape_string($conexao, $_POST['titulo'] ?? '');
$textoNoticia  = mysqli_real_escape_string($conexao, $_POST['texto'] ?? '');
$statusNoticia = mysqli_real_escape_string($conexao, $_POST['status'] ?? '');
$id_arquivo = mysqli_real_escape_string($conexao, $_POST['id_arquivo'] ?? '');

// Verifica se o arquivo foi enviado
//$nome_arquivo = isset($_FILES['arquivo']) ? basename($_FILES['arquivo']['name']) : '';

if (
	(empty($idNoticia)) ||
	(empty($dataNoticia)) ||
	(empty($tituloNoticia)) ||
	(empty($textoNoticia)) ||
	(empty($statusNoticia))
) {
	echo "<script>window.location = 'logout.php'</script>";
	exit();
}

// Se o usuário enviou anexo
if (!empty($id_arquivo)) {

	// pega nome do arquivo na tb_files
	$sql = "SELECT imagem FROM tb_files WHERE id='$id_arquivo' ";
	$res = mysqli_query($conexao, $sql);
	while ($row = mysqli_fetch_array($res)) {
		echo $nome_arquivo = $row['imagem'];
	}

	if (!empty($nome_arquivo)) {
		// atualiza registro
		$sql = "UPDATE tb_noticias SET 
            titulo='$tituloNoticia',
						file='$nome_arquivo',
						idfile='$id_arquivo',
            descricao='$textoNoticia',
            data='$dataNoticia',
            status='$statusNoticia'
            WHERE id = '$idNoticia'";
		$update = mysqli_query($conexao, $sql);
	}
} else {
	$sql = "UPDATE tb_noticias SET 
            titulo='$tituloNoticia',
            descricao='$textoNoticia',
            data='$dataNoticia',
            status='$statusNoticia'
            WHERE id = '$idNoticia'";
	$update = mysqli_query($conexao, $sql);
}

if ($update > 0) {
	echo "<script>
            alert('Cadastro alterado com sucesso!');
            window.location.href = 'index.php?id=3';
          </script>";
	exit();
} else {
	// Caso dê algum erro no banco de dados (ex: coluna com nome errado)
	echo "Erro ao atualizar registro: " . mysqli_error($conexao);
}

mysqli_close($conexao);
