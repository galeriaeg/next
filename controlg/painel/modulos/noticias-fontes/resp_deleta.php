<?php
	include "session.php";
	
	echo "<h3>$titulo</h3>";
	
	$idFonte = $_GET['idFonte'];
	$nome = $_GET['nome'];
	$nomeArquivo = $_GET['nome_arquivo'];
	$conf = $_GET['conf'];
	

	
	if($conf<1){
		echo "<span class='txt'>Deseja realmente excluir a fonte <b>$nome</b> ? </span><br />";
		echo "<p>";
		echo "<a href=\"index.php?id=4.3&idFonte=$idFonte&nome=$nome&nome_arquivo=$nomeArquivo&conf=1\"><img class='botao-nao-sim' src='imgs/botao-sim.png' border='0'></a> &nbsp;&nbsp;";
		echo "<a href=\"index.php?id=4\"><img src='imgs/botao-nao.png' class='botao-nao-sim' border='0'></a>";
		echo "</p>";
	}
	else{
		include "../conecta.php";
		
		
		if(!empty($nomeArquivo)){
			$file_delete = "files/".$nomeArquivo;
			unlink($file_delete);
			}
		
		
		$sql = "DELETE FROM fontes WHERE id='$idFonte'";
		$qry = mysqli_query($conexao,$sql);
		
		
		if($qry>0){
			echo "
			<script>
			alert('Cadastro excluído com  sucesso!');
			window.location.href = 'index.php?id=4'
			</script>";
			exit();
		}
		mysqli_close($conexao);
	}
	
?>