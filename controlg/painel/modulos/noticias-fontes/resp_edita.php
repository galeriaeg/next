<?php
	include "session.php";
	
	$idFonte =	$_POST['idFonte'];
	$titulo =	$_POST['titulo'];
	
	$nome_arquivo = basename($_FILES['arquivo']['name']);

	
	$validaArquivo =  strstr($nome_arquivo, "<");
	if(!empty($validaArquivo)){
		session_start();
		session_unset();
		session_destroy();
		unset($_SESSION['nome']);
		unset($_SESSION['login']);	
		echo "<script>window.location = 'logout.php';</script>";
		exit();
	}
	
	
	if(($idFonte=="") or ($titulo=="")) {
		echo "<script>window.location = 'logout.php'</script>";
		exit();
	}
	else{
		
		include "../conecta.php"; 
		
		
		if(!empty($nome_arquivo)){
		
			$ran = rand();
			$nome_arquivo = $ran.$nome_arquivo;
			$valida = substr($nome_arquivo, -4);
			
			if(($valida<>".jpg")and($valida<>".gif")and($valida<>".png")){
				echo "<script>
				alert('Erro! O tipo de arquivo não é permitido! ');
				window.history.back();
				</script>";
				exit();
			}
			
			$uploaddir = 'files/';
			$uploadfile = $uploaddir.$nome_arquivo;
			

			if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
				
				$sql = "UPDATE fontes SET logomarca='$nome_arquivo' WHERE id = '$idFonte' ";
				$update = mysqli_query($conexao, $sql);
			}
			
		}
		
		$sql = "UPDATE fontes SET titulo='$titulo' WHERE id = '$idFonte' ";
		$update = mysqli_query($conexao, $sql);
		
		echo"
		<script type='text/javascript'>
		alert('Cadastro realizado com sucesso!');
		window.location = 'index.php?id=4';
		</script>";

	}
	mysqli_close($conexao);
?>				