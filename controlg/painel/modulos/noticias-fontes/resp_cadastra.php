<?php
	include "session.php";
	
	$titulo =	$_POST['titulo'];
	$nome_arquivo = basename($_FILES['arquivo']['name']);
	
	
	$validaArquivo =  strstr($nome_arquivo, "<");
	
	if(!empty($validaArquivo)){
		session_start();
		session_unset();
		session_destroy();
		unset($_SESSION['nome']);
		unset($_SESSION['login']);	
		echo "
		<script>window.location = 'logout';</script>";
		exit();
	}
	
	
	
	if(($nome_arquivo=="") or ($titulo=="")){
		echo "<script>window.location = 'logout.php';</script>";
		exit;
	}
	
	$ran = rand();
	$nome_arquivo = $ran.$nome_arquivo;
	
	$valida = substr($nome_arquivo, -4);
	
	if(($valida<>".jpg")and($valida<>".gif")and($valida<>".png")){
		echo "
		<script>
		alert('Erro! O tipo de arquivo não é permitido! ');
		window.history.back();
		</script>";
		exit();
	}
	
	
	$uploaddir = 'files/';
	$uploadfile = $uploaddir.$nome_arquivo;
	
	if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
			
		include "../conecta.php"; 
		
		$sql="INSERT INTO fontes (titulo,logomarca)
		VALUES ('$titulo','$nome_arquivo')";
		$conf = $conexao->query($sql)or die ($conexao->error);
		
		
		echo"
		<script>
		alert('Cadastro realizado com sucesso!');
		window.location = 'index.php?id=4';
		</script>";
		exit();
		
	}
	
	mysqli_close($conexao);
	
?>