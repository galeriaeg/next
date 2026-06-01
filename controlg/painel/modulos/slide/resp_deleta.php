<?php
	include "session.php";
	
	echo "<h3>$titulo</h3>";
	
	//recebe dados do formularios
	$id = $_GET['idSlide'];
	$nomefile_dsk = $_GET['foto_dsk'];
	$nomefile_mob = $_GET['foto_mob'];
	$conf = $_GET['conf'];
	
	//recebe ID do Slide pra excluir somente as imagens;
	$iddsk = $_GET['iddsk'];
	$idmob = $_GET['idmob'];
	$nomefile_d = $_GET['nomed'];
	$nomefile_m = $_GET['nomem'];
	
	
	include "../conecta.php";
				
	if($conf<1){
		echo "<span class='txt'>Deseja realmente realizar esta exclusão? </span><br />";
		echo "<p>";
		echo "<a href=\"index.php?id=5.3&idSlide=$id&foto_dsk=$nomefile_dsk&foto_mob=$nomefile_mob&iddsk=$iddsk&idmob=$idmob&nomed=$nomefile_d&nomem=$nomefile_m&conf=1\">
		<img src='imgs/botao-sim.png' class='botao-nao-sim' border='0'></a>&nbsp;&nbsp;";
		echo "<a href=\"index.php?id=5\"><img src='imgs/botao-nao.png' class='botao-nao-sim' border='0'></a>";
		echo "</p>";
	}
	else{
		// SE ID DAS IMAGENS VAZIAS, APAGA REGISTRO TODO
		if ((empty($iddsk)) and (empty($idmob))) {	

			$sql = "DELETE FROM slider WHERE id='$id'";
			$qry = mysqli_query($conexao,$sql);
			
			if($qry>0){
				unlink("files/$nomefile_dsk"); 
				unlink("files/$nomefile_mob");
				echo"<script>alert('Registro excluido com sucesso!');</script>";
				echo"<script>window.location.href='index.php?id=5'</script>";
			}
	
		}
		// SE ID DA IMAGEN-DESKTOP VAZIO, APAGA A  IMAGEM-MOBILE
		elseif(empty($iddsk)){	

			$sql = "UPDATE slider SET foto_mini='' WHERE id = '$idmob'";
			$update = mysqli_query($conexao, $sql);
			if(unlink("files/$nomefile_m"));
			
			if($sql == ''){
				echo 'Erro ao Excluir!';
			}
			else
			{
				echo"<script>alert('Imagem excluida com sucesso!');</script>";
				echo"<script>window.location.href='index.php?id=5'</script>";
			}
		}
		// APAGA A IMAGEN-DESKTOP
		else{
			
			$sql = "UPDATE slider SET foto='' WHERE id = '$iddsk'";
			$update = mysqli_query($conexao, $sql);
			unlink("files/$nomefile_d");
			
			if($sql == ''){
				echo 'Erro ao Excluir!';
			}
			else
			{
				echo"<script>alert('Imagem excluida com sucesso!');</script>";
				echo"<script>window.location.href='index.php?id=5'</script>";
			}
			
		}
		
		
		
		
		mysqli_close($conexao);
	}
	
?>