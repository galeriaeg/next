<?php
	require "session.php";
?>

<a href="index.php?id=7.1" title="Novo">
	<img src="imgs/novo.png"  class="btnovo" border="0" alt="Novo" />
</a>

<h3><?php echo $titulo; ?></h3>


<table width="100%" border="0">
	<tr class="tr">
		<th width="20%" align="left" class="th">LOGOMARCA</th>
		<th width="62%" align="left" class="th">NOME</th>
		<th width="9%" align="left" class="th">NOME</th>
		<th width="9%" align="left" class="th">A&Ccedil;&Otilde;ES</th>
	</tr>
	
	
	<?php

		include "../conecta.php";
		
		$sql = "SELECT * FROM marca ORDER BY id ASC";
		$cons = $conexao->query($sql)or die($conexao->error);
		while($row = $cons->fetch_array()){
			$idMarca = 	$row['id'];
			$nomeMarca	=	$row['nome'];
			$logomarcaMarca	=	$row['logomarca'];
			$statusMarca = $row['status'];
			
			if(empty($logomarcaMarca))
				$logomarca = "imgs/sem-logo.jpg";
			else
				$logomarca = "files/".$logomarcaMarca;
			
			
			if(empty($statusMarca))
				$status = "<img src='imgs/flegInativo.png' alt='Logo' />";
			else
				$status = "<img src='imgs/flegAtivo.png' alt='Logo' />";
			

			$btedita ="<a href='index.php?id=7.2&idMarca=$idMarca'><img src='imgs/btedita_off.png' border='0' class='bt-editar' /></a>";
			$btexclui ="<a href='index.php?id=7.3&idMarca=$idMarca&nome=$nomeMarca&nome_arquivo=$logomarcaMarca&conf=0'><img  src='imgs/btexclui_off.png' border='0' class='bt-excluir' /></a>";
			
			
			echo "<tr class='tupla'>";
			echo "<th width='20%' align='left' class='txt'><img src='$logomarca' width='85' /></th>";
			echo "<th width='62%' align='left' class='txt'>$nomeMarca</th>";
			echo "<th width='9%' align='left' class='txt'>$status</th>";
			echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
			echo "</tr>";
			
		} 
		
		echo "</table>";
		
		echo "<br /><br />";
		
		
		
		mysql_close();
		
	?>
