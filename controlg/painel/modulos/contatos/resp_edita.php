<?php
	include "session.php";
	
	$celular =	$_POST['celular'];
	$email =	$_POST['email'];
	$senha =	$_POST['senha'];
	
	//echo $senha = base64_decode($senha); 
	
	if( (empty($celular)) || (empty($email)) ) {
		echo "<script>window.location = 'logout.php';</script>";
		exit();
	}
	else{
		echo "foi";
		include "../conecta.php"; 
		
		if(empty($senha)){
		
			$sql = "UPDATE contatos SET celular='$celular', email='$email' WHERE tipo = 'default' ";
			$update = mysqli_query($conexao, $sql);			
			
		}
		else{
			
			$senha = base64_encode($senha);
		
			$sql = "UPDATE contatos SET celular='$celular', email='$email', senha_email='$senha' WHERE tipo = 'default' ";
			$update = mysqli_query($conexao, $sql);			
			
		}
		

		echo"<script>
		alert('Cadastro realizado com sucesso!');
		window.location = 'index.php?id=11';
		</script>";

	}
	mysqli_close($conexao);
?>				