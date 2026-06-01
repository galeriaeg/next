<?php
	include "session.php";
	
	$idMarca =	$_POST['idMarca'];
	$nome =	$_POST['nome'];
	$site =	$_POST['site'];
	$status =	$_POST['status'];
	$nome_arquivo = basename($_FILES['arquivo']['name']);


	if((empty($idMarca)) || (empty($nome))) {
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
				
				$sql = "UPDATE marca SET nome='$nome',logomarca='$nome_arquivo', status='$status', site='$site' WHERE id = '$idMarca' ";
				$update = mysqli_query($conexao, $sql);
			}
			
		}
		
	
		$sql = "UPDATE marca SET nome='$nome',status='$status', site='$site' WHERE id = '$idMarca' ";
		$update = mysqli_query($conexao, $sql);
		
		echo"
		<script type='text/javascript'>
		alert('Cadastro realizado com sucesso!');
		window.location = 'index.php?id=7';
		</script>";

	}
	
	mysqli_close($conexao);
?>				