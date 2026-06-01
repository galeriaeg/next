<?php
	include "session.php";
	
	echo "<h3>$titulo</h3>";
	
	$idLinha = $_GET['idLinha'];
	$tituloLinha = $_GET['tlinha'];
	$conf = $_GET['conf'];
	
	
	if($conf<1){
		echo "<span class='txt'>Deseja realmente excluir a linha <b>$tituloLinha</b> ? </span><br />";
		echo "<p>";
		echo "<a href=\"index.php?id=9.3&idLinha=$idLinha&conf=1\"><img src='imgs/botao-sim.png' class='botao-nao-sim' border='0'></a> &nbsp;&nbsp;";
		echo "<a href=\"index.php?id=9\"><img src='imgs/botao-nao.png' class='botao-nao-sim' 1border='0'></a>";
		echo "</p>";
	}
	else{
		include "../conecta.php";
		
		
		$sql = "DELETE FROM linha WHERE id='$idLinha'";
		$qry = mysqli_query($conexao,$sql);
		
		
		if($qry>0){
			echo "
			<script type='text/javascript'>
			alert('Cadastro excluído com  sucesso!');
			window.location.href = 'index.php?id=9'
			</script>";
		}
		mysqli_close($conexao);
	}
	
?>