<?php
	include "session.php";
	
	$idMarca = $_GET['idMarca'];
	$nome_arquivo = $_GET['file'];
	
	
	if(
	(empty($idMarca))||
	(empty($nome_arquivo))
	){
		echo "<script>window.location = 'logout.php';</script>";
		exit();
	}
	else{
		
		$file_delete = "files/".$nome_arquivo;
		
		include "../conecta.php"; 
		$sql = "UPDATE marca SET logomarca='' WHERE id = '$idMarca'";
		$update = mysqli_query($conexao, $sql);
		unlink($file_delete);
		
		echo"<script>alert('Imagem excluida com sucesso!');</script>";
		echo"<script>window.location.href='index.php?id=7.2&idMarca=$idMarca'</script>";
				
	}
	mysqli_close($conexao);
?>