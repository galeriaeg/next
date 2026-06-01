<?php
	$idp = $_GET['idp'];
	$nfile = $_GET['nfile'];
	$idmarca = $_GET['idm'];
	

	if((empty($idp))|| (empty($nfile))){
		echo "<script>window.location = 'logout.php';</script>";
		exit();
	}
	else{
		
		$file_delete = "files/".$nfile;
		
		include "../conecta.php"; 
		$sql = "UPDATE produto SET foto='' WHERE id = '$idp'";
		$update = mysqli_query($conexao, $sql);
		unlink($file_delete);
		
		echo"<script>alert('Imagem excluida com sucesso!');</script>";
		echo"<script>window.location.href='index.php?id=6&m=$idmarca'</script>";
				
		}
		mysqli_close($conexao);
?>