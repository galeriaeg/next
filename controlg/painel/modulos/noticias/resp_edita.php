<?php
include("session.php");

// conecta ao banco
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

// Proteção contra SQL Injection e captura limpa dos dados
$idNoticia     = mysqli_real_escape_string($conexao, $_POST['idNoticia'] ?? '');
$dataNoticia   = mysqli_real_escape_string($conexao, $_POST['data'] ?? '');
$tituloNoticia = mysqli_real_escape_string($conexao, $_POST['titulo'] ?? '');
$textoNoticia  = mysqli_real_escape_string($conexao, $_POST['texto'] ?? '');
$statusNoticia = mysqli_real_escape_string($conexao, $_POST['status'] ?? '');

// Verifica se o arquivo foi enviado
$nome_arquivo = isset($_FILES['arquivo']) ? basename($_FILES['arquivo']['name']) : '';

if (empty($idNoticia)) {
	echo "<script>window.location = 'logout.php'</script>";
	exit();
}

// Se o usuário enviou uma nova foto
if (!empty($nome_arquivo)) {

	$ran = rand(10000, 99999);
	$nome_arquivo = $ran . "-" . $nome_arquivo;

	$extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
	$extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];

	if (!in_array($extensao, $extensoes_permitidas)) {
		echo "<script>
          	alert('Erro! O tipo de arquivo não é permitido! Use .PNG, .JPG ou .GIF');
            window.history.back();
          </script>";
		exit();
	}

	$uploaddir = 'files/';
	// Cria a pasta caso ela não exista por algum motivo
	if (!is_dir($uploaddir)) {
		mkdir($uploaddir, 0755, true);
	}

	$uploadfile = $uploaddir . $nome_arquivo;

	if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
		// SQL com a nova foto
		$sql = "UPDATE tb_noticias SET 
                titulo='$tituloNoticia',
                foto='$nome_arquivo',
                descricao='$textoNoticia',
                data='$dataNoticia',
                status='$statusNoticia'
                WHERE id = '$idNoticia'";
	} else {
		// CORRIGIDO: Se der erro no upload, para o script aqui e avisa o usuário
		echo "<script>
                alert('Erro ao fazer o upload da imagem. Tente novamente.');
                window.history.back();
              </script>";
		exit();
	}
} else {
	// SQL sem mexer na foto atual
	$sql = "UPDATE tb_noticias SET 
            titulo='$tituloNoticia',
            descricao='$textoNoticia',
            data='$dataNoticia',
            status='$statusNoticia'
            WHERE id = '$idNoticia'";
}

// Executa a Query
$update = mysqli_query($conexao, $sql);

// CORRIGIDO: Verifica se a query rodou com sucesso
if ($update) {
	echo "<script>
            alert('Cadastro alterado com sucesso!');
            window.location.href = 'index.php?id=3';
          </script>";
	exit();
} else {
	// Caso dê algum erro no banco de dados (ex: coluna com nome errado)
	echo "Erro ao atualizar no banco de dados: " . mysqli_error($conexao);
}

mysqli_close($conexao);
