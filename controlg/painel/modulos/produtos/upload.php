<?php
	
	$nome_arquivo = basename($_FILES['arquivo']['name']);
	
	$validaArquivo =  strstr($nome_arquivo, "<");
	
	
	if(!empty($validaArquivo)){
		session_start();
		session_unset();
		session_destroy();
		unset($_SESSION['nome']);
		unset($_SESSION['login']);	
		echo "
		<script type='text/javascript'>
		window.location = 'logout';
		</script>
		";
		exit();
	}
	
	
	
	
	//gerar numero aleatorio
	//concatena com  idusuario+ rand + nome do arquivo
	$ran = rand();
	$nome_arquivo = $idu."-".$ran.$nome_arquivo;
	
	if($nome_arquivo==""){
		echo "
		<script type='text/javascript'>
		window.location = 'logout';
		</script>
		";
		exit;
	}
	
	
	//verifica o tipo de arquivo
	$valida = substr($nome_arquivo, -4);
	//echo $valida;
	
	if(($valida<>".jpg")and($valida<>".gif")and($valida<>".png")){
		echo "
		<script type='text/javascript'>
		alert('Erro! O tipo de arquivo não é permitido! ');
		window.history.back();
		</script>
		";
		exit;
	}
	
	
	
	
	//FAZ O UPLOAD
	$uploaddir = '../files/usuarios/';
	$uploadfile = $uploaddir . $nome_arquivo;
	
	//Verifica se o upload foi enviado, caso verdadeito, executa o UPDATE
	if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
		
		
		// conecat ao banco
		include ("../conexao.php"); 
		
		//$sql = "UPDATE usuarios SET foto='$nome_arquivo' WHERE id = '$idu'";
		//$result = mysql_query($sql) or die("erro");	
		
		
		$sql = "UPDATE usuarios SET foto='$nome_arquivo' WHERE id = '$idu'";
		$update = mysqli_query($conexao, $sql);
		
		
		echo"
		<script type='text/javascript'>
		alert('Cadastro realizado com sucesso!');
		window.location = 'perfil?idu=$idu';
		</script>";
		
	}
	mysqli_close($conexao);
	
	
?>