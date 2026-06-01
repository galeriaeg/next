<?php
	include "session.php";
	
	$idArea = $_GET['idArea'];
	$nome_arquivo = $_GET['file'];
	

	
	if(
	(empty($idArea))||
	(empty($nome_arquivo))
	){
		echo "<script>window.location = 'logout.php';</script>";
		exit();
	}
	else{
		
		$file_delete = "files/".$nome_arquivo;
		
		include "../conecta.php"; 
		$sql = "UPDATE area_atuacao SET mapa='' WHERE id = '$idArea'";
		$update = mysqli_query($conexao, $sql);
		unlink($file_delete);
		
		echo"<script>alert('Imagem excluida com sucesso!');</script>";
		echo"<script>window.location.href='index.php?id=10.2&idArea=$idArea'</script>";
				
	}
	mysqli_close($conexao);
?>