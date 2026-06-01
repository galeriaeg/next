<?php
	include "session.php";
	
	
	
	$id_dsk = $_POST['id_dsk'];
	$id_mob = $_POST['id_mob'];
	
	include "../conecta.php"; 
	
	
	if(empty($id_dsk)){
		
		//Recebe nome do arquivo
		$nome_arquivo = basename($_FILES['arquivo']['name']);
		
		//gerar numero aleatorio e concatena com nome do arquivo
		$ran = rand();
		$nome_arquivo = $ran."-".$nome_arquivo;
		
		
		//verifica o tipo de arquivo
		$valida = substr($nome_arquivo, -4);
		if(($valida<>".jpg")and($valida<>".gif")and($valida<>".png")){
			echo "<img src='imgs/erro.png' width='30px' style='margin-left:5px;' align='left'><h3>&nbsp;Aquivo nao permitido!!</3>";
			echo "<br>&nbsp;&nbsp;<a href='index.php?id=9.1' class='txtk'>Voltar</a>"; 
			exit;
		}
		
		$uploaddir = 'files/';
		$uploadfile = $uploaddir . $nome_arquivo;
		

		
		//Verifica se o upload foi enviado, caso verdadeito, executa o CADASTRO
		if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
			
			$sql = "UPDATE slider SET foto_mini='$nome_arquivo' WHERE id = '$id_mob'";
			$update = mysqli_query($conexao, $sql);
			
			if($update){
				echo"
				<script type='text/javascript'>
				alert('Registro atualizado!');
				window.location = 'index.php?id=5'
				</script>";
			}
			
			
		}
		
	}
	else{
		
		//Recebe dados do formulario de Upload
		echo $nome_arquivo = basename($_FILES['arquivo']['name']);
		
		
		//gerar numero aleatorio e concatena com nome do arquivo
		$ran = rand();
		$nome_arquivo = $ran."-".$nome_arquivo;
		
		
		//verifica o tipo de arquivo
		$valida = substr($nome_arquivo, -4);
		if(($valida<>".jpg")and($valida<>".gif")and($valida<>".png")){
			echo "<img src='imgs/erro.png' width='30px' style='margin-left:5px;' align='left'><h3>&nbsp;Aquivo nao permitido!!</3>";
			echo "<br>&nbsp;&nbsp;<a href='index.php?id=9.1' class='txtk'>Voltar</a>"; 
			exit;
		}
		
		
		
		//FAZ O UPLOAD
		$uploaddir = 'files/';
		$uploadfile = $uploaddir . $nome_arquivo;
		
		
		
		//Verifica se o upload foi enviado, caso verdadeito, executa o CADASTRO
		if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
			
			
			$sql = "UPDATE slider SET foto='$nome_arquivo'  WHERE id = '$id_dsk'";
			$update = mysqli_query($conexao, $sql);
			
			if($update){
				echo"
				<script type='text/javascript'>
				alert('Cadastro realizado com sucesso!');
				window.location = 'index.php?id=5'
				</script>";
			}
			
			
			
		}
	}
	
	mysqli_close($conexao);
	
?>
