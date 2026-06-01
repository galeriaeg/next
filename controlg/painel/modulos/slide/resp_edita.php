<?php
	include "session.php";
	
	$id			=	$_POST['id'];
	$link		=	$_POST['link'];
	$destino	=	$_POST['destino'];
	$status		=	$_POST['status'];
	
	
	if(($id=="")or($link=="")or($status=="")or($destino=="")){
		session_start();
		session_unset();
		session_destroy();
		unset($_SESSION['nome']);
		unset($_SESSION['login']);	
		echo "<script>window.location = 'index.php'</script>";
		exit();
	}
	else{
		include "../conecta.php"; 

		$sql = " UPDATE slider SET id='$id', link='$link', destino='$destino', status='$status'  WHERE id = '$id'  ";
		$update = mysqli_query($conexao, $sql); 
		
		if($update){
			echo"
			<script>
			alert('Cadastro realizado com sucesso!');
			window.location = 'index.php?id=5'
			</script>";	
		}

		mysqli_close($conexao);
	}
?>