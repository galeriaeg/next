<?php
	include "session.php";
	
	
	//Recebe dados do formulario de Upload
	$nome_arquivo_dsk	=	basename($_FILES['arquivoDesktop']['name']);
	$nome_arquivo_mob	=	basename($_FILES['arquivoMobile']['name']);
	$link = $_POST["link"];
	$destino = $_POST["destino"];
	$status = $_POST["status"];
	
	
	
	// impede cadastro de codigo no upload de imagem
	$validaArquivo =  strstr($nome_arquivo_dsk, "<");
	$validaArquivoMob =  strstr($nome_arquivo_mob, "<");
	$validaLink =  strstr($link, "<");
	
	
	if((!empty($validaArquivo)) or (!empty($validaArquivoMob)) or (!empty($validaLink )) ){
		echo "<script>window.location = 'logout.php'</script>";
		exit();
	}
	
	
	
	
	if(($nome_arquivo_dsk=="")or($nome_arquivo_mob=="")){
		session_start();
		session_unset();
		session_destroy();
		unset($_SESSION['nome']);
		unset($_SESSION['login']);	
		echo "<script>window.location = '../../index.php'</script>";
		exit();
	}
	
	
	if(
	($nome_arquivo_dsk=="") or 
	($nome_arquivo_mob=="") or
	($link=="http://") or
	($link=="") 
	)
	{
		echo "
		<script type='text/javascript'>
		alert('Erro! Preencha todos os campos!');
		history.go(-1);
		</script>
		";
		exit;
	}
	
	
	
	//gerar numero aleatorio
	//e concatena com nome do arquivo
	$ran = rand();
	$nome_arquivo_dsk = $ran."-".$nome_arquivo_dsk;
	
	//gerar numero aleatorio
	//e concatena com nome do arquivo
	$ran = rand();
	$nome_arquivo_mob = $ran."-".$nome_arquivo_mob;
	
	
	
	//verifica o tipo de arquivo
	$valida = substr($nome_arquivo_dsk, -4);
	//echo $valida;
	//exit;
	if(($valida<>".jpg")and($valida<>".gif")and($valida<>".png")){
		echo "<img src='imgs/erro.png' width='30px' style='margin-left:5px;' align='left'><h3>&nbsp;Aquivo nao permitido!!</3>";
		echo "<br>&nbsp;&nbsp;<a href='index.php?id=9.1' class='txtk'>Voltar</a>"; 
		exit;
	}
	
	
	
	//verifica o tipo de arquivo
	$valida = substr($nome_arquivo_mob, -4);
	//echo $valida;
	//exit;
	if(($valida<>".jpg")and($valida<>".gif")and($valida<>".png")){
		echo "<img src='imgs/erro.png' width='30px' style='margin-left:5px;' align='left'><h3>&nbsp;Aquivo nao permitido!!</3>";
		echo "<br>&nbsp;&nbsp;<a href='index.php?id=9.1' class='txtk'>Voltar</a>"; 
		exit;
	}
	
	
	
	
	
	//FAZ O UPLOAD
	//$uploaddir = 'modulos/uploads/';
	$uploaddir = 'files/';
	$uploadfile_dsk = $uploaddir . $nome_arquivo_dsk;
	$uploadfile_mob = $uploaddir . $nome_arquivo_mob;
	
	//Verifica se o upload foi enviado, caso verdadeito, executa o CADASTRO
	if  ((move_uploaded_file($_FILES['arquivoDesktop']['tmp_name'], $uploadfile_dsk)) and
	(move_uploaded_file($_FILES['arquivoMobile']['tmp_name'], $uploadfile_mob))){
		
		
		// conecat ao banco
		include "../conecta.php"; 
		
		$sql="INSERT INTO slider (foto, foto_mini, link, destino, status)
		VALUES ('$nome_arquivo_dsk','$nome_arquivo_mob','$link','$destino','$status')";
		$conf = $conexao->query($sql)or die ($conexao->error);
		
		if($conf){
			echo"
			<script type='text/javascript'>
			alert('Cadastro realizado com sucesso!');
			window.location = 'index.php?id=5';
			</script>";				
		}

		

		
	}
	mysqli_close($conexao);
	
?>
