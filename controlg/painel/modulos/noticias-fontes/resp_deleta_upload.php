<?php
	include "session.php";
	
	$idFonte = $_GET['idFonte'];
	$nome_arquivo = $_GET['file'];
	
	
	if(($idFonte=="")or($nome_arquivo=="")){
		echo "<script>window.location = 'logout.php';</script>";
		exit();
	}
	else{
		
		$file_delete = "files/".$nome_arquivo;
		
		include "../conecta.php"; 
		$sql = "UPDATE fontes SET logomarca='' WHERE id = '$idFonte'";
		$update = mysqli_query($conexao, $sql);
		unlink($file_delete);
		
		echo"<script>alert('Imagem excluida com sucesso!');</script>";
		echo"<script>window.location.href='index.php?id=4.2&idFonte=$idFonte'</script>";
				
		}
		mysqli_close($conexao);
?>