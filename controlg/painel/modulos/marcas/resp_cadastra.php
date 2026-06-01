<?php
	include "session.php";
	
	$titulo =	$_POST['titulo'];
	$site =	$_POST['site'];
	$nome_arquivo = basename($_FILES['arquivo']['name']);
	
	
	if((empty($titulo)) || (empty($nome_arquivo))){
		echo "<script>window.location = 'logout.php';</script>";
		exit();
	}
	else{		
		
		$ran = rand();
		$nome_arquivo = $ran.$nome_arquivo;
		
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

		if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
			
			include "../conecta.php"; 
			
			$sql="INSERT INTO marca (nome,logomarca,site,status)
			VALUES ('$titulo','$nome_arquivo','$site',1)";
			$conf = $conexao->query($sql)or die ($conexao->error);
			
			
			echo"
			<script type='text/javascript'>
			alert('Cadastro realizado com sucesso!');
			window.location = 'index.php?id=7';
			</script>";
			
		}
		
		
		
	}
	mysqli_close($conexao);
	
?>