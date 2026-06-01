<?php
	include "session.php";
	
	$idLinha =	$_POST['idLinha'];
	$idMarca =	$_POST['marca'];
	$titulo =	$_POST['titulo'];
	
	
	if( (empty($idLinha)) || (empty($idMarca)) || (empty($titulo)) ) {
		echo "<script>window.location = 'logout';</script>";
		exit();
	}
	else{
		
		include "../conecta.php"; 
		
		$sql = "UPDATE linha SET titulo='$titulo',idmarca='$idMarca' WHERE id = '$idLinha' ";
		$update = mysqli_query($conexao, $sql);
		
		echo"<script>
		alert('Cadastro realizado com sucesso!');
		window.location = 'index.php?id=9';
		</script>";

	}
	mysqli_close($conexao);
?>				