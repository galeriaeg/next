<?php require "session.php"; ?>

<a href="index.php?id=4.1" title="Novo">
	<img src="imgs/novo.png"  class="btnovo" border="0" alt="Novo" />
</a>

<h3><?php echo $titulo; ?></h3>


<table width="100%" border="0">
	<tr class="tr">
		<th width="20%" align="left" class="th">LOGOMARCA</th>
		<th width="71%" align="left" class="th">TÍTULO</th>
		<th width="9%" align="left" class="th">A&Ccedil;&Otilde;ES</th>
	</tr>
	
	
	<?php
		include "../conecta.php";
		
		$sql = "SELECT * FROM fontes ORDER BY id ASC";
		$cons = $conexao->query($sql)or die($conexao->error);
		while($row = $cons->fetch_array()){
			$idFonte		= 	$row['id'];
			$tituloFonte	=	$row['titulo'];
			$logomarcaFonte	=	$row['logomarca'];
			
			if(empty($logomarcaFonte))
				$logomarca_Fonte = "imgs/sem-logo.jpg";
			else
				$logomarca_Fonte = "files/".$logomarcaFonte;
			
			$btedita ="<a href='index.php?id=4.2&idFonte=$idFonte'><img src='imgs/btedita_off.png' border='0' class='bt-editar' /></a>";
			$btexclui ="<a href='index.php?id=4.3&idFonte=$idFonte&nome=$tituloFonte&nome_arquivo=$logomarcaFonte&conf=0'><img  src='imgs/btexclui_off.png' border='0' class='bt-excluir' /></a>";
			
			
			echo "<tr class='tupla'>";
			echo "<th width='20%' align='left' class='txt'><img src='$logomarca_Fonte' width='40' /></th>";
			echo "<th width='71%' align='left' class='txt'>$tituloFonte</th>";
			echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
			echo "</tr>";
			
		} 
		
		echo "</table>";
		
		echo "<br /><br />";
		
		
		mysqli_close($conexao);
		
	?>
