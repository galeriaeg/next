<?php
	include ("session.php");
	
	$chave = $_POST['chave'];
?>



<img src="imgs/novo-off.png"  class="btnovo" border="0" alt="Novo" />


<h3><?php echo $titulo; ?></h3>


<div class='box-topo-busca'>
	<form action="painel.php?id=1" method="post">
		<span class="txt">Buscar:</span>
		<input name="chave" placeholder="Buscar por mome ou ID"  class="input" />
		<input type="submit" value="Buscar" class="input"/>
	</form>
</div>


<table width="100%" border="0">
	<tr class="tr">
		<th width="6%" align="left" class="th">ID</th>
		<th width="38%" align="left" class="th">NOME</th>
		<th width="38%" align="left" class="th">LOGIN</th>
		<th width="9%" align="left" class="th">STATUS</th>
		<th width="9%" align="left" class="th">A&Ccedil;&Otilde;ES</th>
	</tr>
	
	
	<?php
		// conecat ao banco
		include ("conecta.php");
		
		
		if(empty($chave)){
			
			//Lista todos os usuarios
			$sql = "SELECT * FROM usuarios WHERE tipo='2' ORDER BY id DESC";
			$cons = $conexao->query($sql)or die($conexao->error);
			$total = mysqli_num_rows($cons); 
			while($row = $cons->fetch_array()){
				$id		= 	$row['id'];
				$nome	=	$row['nome'];
				$email	=	$row['email'];
				$login	=	$row['login'];
				$tipo	=	$row['tipo'];
				$status	=	$row['status'];
				
				if($status==0){
					$statusLabel = "<img src='imgs/flegInativo.png' />";
				}
				elseif($status==1){
					$statusLabel = "<img src='imgs/flegAtivo.png' />";
				}
				elseif($status==2){
					$statusLabel = "<img src='imgs/flegDletado.png' />";
				}	
				
				$btedita ="<a title='Editar' href='painel.php?id=1.2.2&u=$id'><img src='imgs/btedita_off.png' border='0' class='bt-editar' /></a>";
				$btexclui ="<a title='Excluir' href='painel.php?id=1.2.4&u=$id&n=$nome&conf=0''><img  src='imgs/btexclui_off.png' border='0' class='bt-excluir' /></a>";	
				
				echo "<tr class='tupla'>";
				echo "<th width='6%' align='left' class='txt'>$id</th>";
				echo "<th width='38%' align='left' class='txt'>$nome</th>";
				echo "<th width='38%' align='left' class='txt'>$login</th>";
				echo"<th width='9%' align='left' class='txt'>$statusLabel</th>";
				echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
				echo "</tr>";
				
				$fleg = $id;
			}
			echo "<i class='txt'>Total de usuários: ".$total."</i>";
			
			
			
		}
		else{
			
			//Lista  usuario setado
			
			$sql = "SELECT * FROM usuarios WHERE nome LIKE '%$chave%' AND tipo='2' OR id='$chave'  ";
			$cons = $conexao->query($sql)or die($conexao->error);
			$total = mysqli_num_rows($cons); 
			while($row = $cons->fetch_array()){
				$id		= 	$row['id'];
				$nome	=	$row['nome'];
				$email	=	$row['email'];
				$login	=	$row['login'];
				$tipo	=	$row['tipo'];
				$status	=	$row['status'];
				
				if($status==0){
					$statusLabel = "<img src='imgs/flegInativo.png' />";
				}
				elseif($status==1){
					$statusLabel = "<img src='imgs/flegAtivo.png' />";
				}
				elseif($status==2){
					$statusLabel = "<img src='imgs/flegDletado.png' />";
				}	
				
				$btedita ="<a title='Editar' href='painel.php?id=1.2.2&u=$id'><img src='imgs/btedita_off.png' border='0' class='bt-editar' /></a>";
				$btexclui ="<a title='Excluir' href='painel.php?id=1.2.4&u=$id&n=$nome&conf=0''><img  src='imgs/btexclui_off.png' border='0' class='bt-excluir' /></a>";	
				
				if($tipo==1){
					$fleg = 0;
				}
				else{
					echo "<tr class='tupla'>";
					echo "<th width='6%' align='left' class='txt'>$id</th>";
					echo "<th width='38%' align='left' class='txt'>$nome</th>";
					echo "<th width='38%' align='left' class='txt'>$login</th>";
					echo"<th width='9%' align='left' class='txt'>$statusLabel</th>";
					echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
					echo "</tr>";
					
				}
				$fleg = $id;				
			}
			echo "<i class='txt'>Total de usuários: ".$total."</i>";
			
		}
		
		echo "</table>";
		
		
		if($fleg<1){
			echo "<div class='txtAlerta'>&#10008; Não há registros</div>";
		}
		
		
		mysqli_close($conexao);
		
	?>
