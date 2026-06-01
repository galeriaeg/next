<?php
	include "session.php";
	
	echo "<h3>$titulo</h3>";
	
	$idArea = $_GET['idArea'];
	$nomeArquivo = $_GET['file'];
 	$conf = $_GET['conf'];
	

	
	if(empty($idArea)){
		echo "<script>window.location = 'logout.php';</script>";
		exit();		
	}
	else{
	
		include "../conecta.php";
		
		if($conf<1){
			echo "<span class='txt'>Deseja realmente excluir este registro? </span><br />";
			echo "<p>";
			echo "<a href='index.php?id=10.3&idArea=$idArea&file=$nomeArquivo&conf=1'><img class='botao-nao-sim' src='imgs/botao-sim.png' border='0'></a> &nbsp;&nbsp;";
			echo "<a href=\"index.php?id=10\"><img src='imgs/botao-nao.png' class='botao-nao-sim' border='0'></a>";
			echo "</p>";
		}
		else{

			if(!empty($nomeArquivo)){
				$file_delete = "files/".$nomeArquivo;
				unlink($file_delete);
			}
			
			
			$sql = "DELETE FROM area_atuacao WHERE id='$idArea'";
			$qry = mysqli_query($conexao,$sql);
			
			
			if($qry>0){
				echo "
				<script>
				alert('Cadastro excluído com  sucesso!');
				window.location.href = 'index.php?id=10'
				</script>";
			}
			
		}
		
		
	}
	mysqli_close($conexao);
?>