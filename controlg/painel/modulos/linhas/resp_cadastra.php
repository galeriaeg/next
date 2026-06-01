<?php
	include "session.php";
	
	$titulo = $_POST['linha'];
	$marca = $_POST['marca'];

	
	if((empty($titulo)) || (empty($marca))){
		echo "<script>window.location = 'logout.php';</script>";
		exit();
	}
	else{
		
		include "../conecta.php"; 
		
		$sql="INSERT INTO linha (titulo,idmarca)
		VALUES ('$titulo','$marca')";
		$conf = $conexao->query($sql)or die ($conexao->error);
		
		echo"
		<script>
		alert('Cadastro realizado com sucesso!');
		window.location = 'index.php?id=9';
		</script>";
		
	}
	mysqli_close($conexao);
	
?>