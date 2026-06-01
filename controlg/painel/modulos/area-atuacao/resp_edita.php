<?php
	include "session.php";
	
	$idArea =	$_POST['idArea'];
	$legenda =	$_POST['legenda'];
	$obs =	$_POST['obs'];
	echo $nome_arquivo = basename($_FILES['arquivo']['name']);


	if((empty($idArea)) || (empty($legenda))) {
		echo "<script>window.location = 'logout.php'</script>";
		exit();
	}
	else{
		
		include "../conecta.php"; 
		
		if(!empty($nome_arquivo)){
		
			$ran = rand(1111,9999);
			$nome_arquivo = $ran.'-'.$nome_arquivo;
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
				
				$sql = "UPDATE area_atuacao SET mapa='$nome_arquivo' WHERE id = '$idArea' ";
				$update = mysqli_query($conexao, $sql);
			}
			
		}
		
	
		$sql = "UPDATE area_atuacao SET legenda='$legenda',obs='$obs'  WHERE id = '$idArea' ";
		$update = mysqli_query($conexao, $sql);
		
		echo"
		<script type='text/javascript'>
		alert('Cadastro realizado com sucesso!');
		window.location = 'index.php?id=10';
		</script>";

	}
	
	mysqli_close($conexao);
?>				