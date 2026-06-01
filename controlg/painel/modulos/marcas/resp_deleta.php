<?php
	include "session.php";
	
	echo "<h3>$titulo</h3>";
	
	$idMarca = $_GET['idMarca'];
	$nome = $_GET['nome'];
	$nomeArquivo = $_GET['nome_arquivo'];
	$conf = $_GET['conf'];
	
	if((empty($idMarca))||(empty($nome))){
		echo "<script>window.location = 'logout';</script>";
		exit();		
	}
	else{
	
		include "../conecta.php";
		
		$sql = "SELECT id FROM produto WHERE idmarca=$idMarca";
		$cons = $conexao->query($sql)or die($conexao->error);
		$total = mysqli_num_rows($cons); 
		
		if($total>0){
			echo "<div class='box-erro'>";
			echo "<strong class='icon-erro'>&#10006; </strong> Não é possível excluir a marca $nome. Há $total cadastros relacionados à esta marca. &nbsp; &nbsp; <a class='txtk' href='index.php?id=7'>Voltar</a></span>";
			echo "</div>";
			exit();
			}
		
		if($conf<1){
			echo "<span class='txt'>Deseja realmente excluir a Marca <b>$nome</b> ? </span><br />";
			echo "<p>";
			echo "<a href=\"index.php?id=7.3&idMarca=$idMarca&nome=$nome&nome_arquivo=$nomeArquivo&conf=1\"><img class='botao-nao-sim' src='imgs/botao-sim.png' border='0'></a> &nbsp;&nbsp;";
			echo "<a href=\"index.php?id=7\"><img src='imgs/botao-nao.png' class='botao-nao-sim' border='0'></a>";
			echo "</p>";
		}
		else{

			if(!empty($nomeArquivo)){
				$file_delete = "files/".$nomeArquivo;
				unlink($file_delete);
			}
			
			
			$sql = "DELETE FROM marca WHERE id='$idMarca'";
			$qry = mysqli_query($conexao,$sql);
			
			
			if($qry>0){
				echo "
				<script>
				alert('Cadastro excluído com  sucesso!');
				window.location.href = 'index.php?id=7'
				</script>";
			}
			
		}
		
		
	}
	mysqli_close($conexao);
?>