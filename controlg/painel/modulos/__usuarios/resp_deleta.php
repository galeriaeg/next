<?php
	require_once("session.php");
	
	$idUserAtual = $_GET['u'];
	$nomeUser = $_GET['n'];
	$conf = $_GET['conf'];
	
	echo"<h3>". $titulo ."</h3>";
	

	
	if($conf<1){
		echo "<span class='txt'>Deseja realmente excluir o usuário <b>$nomeUser</b>? </span><br />";
		echo "<p>";
		echo "<a href=\"painel.php?id=1.2.4&u=$idUserAtual&n=$nomeUser&conf=1\"><img src='imgs/botao-sim.png' border='0'></a> &nbsp;&nbsp;";
		echo "<a href=\"painel.php?id=1\"><img src='imgs/botao-nao.png' border='0'></a>";
		echo "</p>";
	}
	else{
		// Conecat ao banco
		include ("conecta.php");
		
		
		$sql = "UPDATE usuarios SET status='2' WHERE id = '$idUserAtual' ";
		$update = mysqli_query($conexao, $sql);
		
		if($update>0){
			echo "
			<script type='text/javascript'>
			alert('Cadastro alterado com  sucesso!');
			window.location.href = 'painel.php?id=1'
			</script>";
		}
		
		
		mysqli_close($conexao);	
		
		
	}	
?>