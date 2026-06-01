<?php
	include "session.php";
	
	$titulo =	$_POST['titulo'];
	$descricao = $_POST['descricao'];
	$nome_arquivo = basename($_FILES['arquivo']['name']);
	$idmarca =	$_POST['idMarca'];
	$idlinha =	$_POST['linha'];
	$status =	$_POST['status'];
	
	
	
	$validaArquivo =  strstr($nome_arquivo, "<");
	
	
	if(!empty($validaArquivo)){
		echo "<script>window.location = 'logout';</script>";
		exit();
	}
	

	
	if(($nome_arquivo=="") or ($titulo=="") or ($descricao=="")){
		echo "<script>window.location = 'logout.php';</script>";
		exit();
	}
	
	
	$ran = rand();
	$nome_arquivo = $ran.$nome_arquivo;
	
	
	//verifica o tipo de arquivo
	$valida = substr($nome_arquivo, -4);
	
	if(($valida<>".jpg")and($valida<>".gif")and($valida<>".png")){
		echo "
		<script type='text/javascript'>
		alert('Erro! O tipo de arquivo não é permitido! ');
		window.history.back();
		</script>
		";
		exit();
	}
	
	
	
	$uploaddir = 'files/';
	$uploadfile = $uploaddir.$nome_arquivo;
	

	
	//Verifica se o upload foi enviado, caso verdadeito, executa o UPDATE
	if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
			
		include "../conecta.php"; 
		
		$sql="INSERT INTO produto (titulo,descricao,foto,idmarca,idlinha,status)
		VALUES ('$titulo','$descricao','$nome_arquivo','$idmarca','$idlinha','$status')";
		$conf = $conexao->query($sql)or die ($conexao->error);
		
		
		echo"
		<script type='text/javascript'>
		alert('Cadastro realizado com sucesso!');
		window.location = 'index.php?id=6';
		</script>";
		
	}
	mysqli_close($conexao);
	
?>