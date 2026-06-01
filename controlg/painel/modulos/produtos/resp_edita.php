<?php
	include "session.php";
	
	$idproduto = $_POST['idp'];
	$marca = $_POST['idmarca'];
	$linha = $_POST['linha'];
	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	$status = $_POST['status'];
	$nome_arquivo = basename($_FILES['arquivo']['name']);
	
	
	if(
	(empty($idproduto)) || 
	(empty($marca))||
	(empty($linha)) || 
	(empty($titulo)) || 
	(empty($descricao))
	){
		echo "
		<script>window.location = 'logout.php'</script>";
		exit();
	}
	else{
	
		include "../conecta.php"; 
		
		if(empty($nome_arquivo)){
			//echo "sem anexo";
			$sql = "UPDATE produto SET titulo='$titulo',descricao='$descricao',idmarca='$marca',idlinha='$linha',status='$status' WHERE id = '$idproduto' ";
			$update = mysqli_query($conexao, $sql);
    		echo"<script>
    		alert('Cadastro realizado com sucesso!');
    		window.location = 'index.php?id=6&m=$marca';
    		</script>";
		}
		else{
		
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
				exit;
			}
			
			$uploaddir = 'files/';
			$uploadfile = $uploaddir.$nome_arquivo;
			
			if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {      
				
				$sql = "UPDATE produto SET titulo='$titulo',descricao='$descricao',foto='$nome_arquivo',idmarca='$marca',idlinha='$linha',status='$status' WHERE id = '$idproduto' ";
				$update = mysqli_query($conexao, $sql);
				echo"
				<script type='text/javascript'>
				alert('Cadastro realizado com sucesso!');
				window.location = 'index.php?id=6&m=$marca';
				</script>";
			}
			
			
		}
	}
	mysqli_close($conexao);
?>				