<?php
	require "session.php";
?>


<a href="index.php?id=10.1" title="Novo">
	<img src="imgs/novo.png"  class="btnovo" border="0" alt="Novo" />
</a>

<h3><?php echo $titulo; ?></h3>


<table width="100%" border="0">
	<tr class="tr">
		<th width="20%" align="left" class="th">MARCA</th>
		<th width="71%" align="left" class="th">REGIÕES</th>
		<th width="9%" align="left" class="th">A&Ccedil;&Otilde;ES</th>
	</tr>
	
	
	<?php

		include "../conecta.php";
		
		$sql = "SELECT aa.*, m.logomarca
		FROM area_atuacao AS aa, marca AS m
		WHERE aa.idmarca = m.id
		ORDER BY id ASC";
		$cons = $conexao->query($sql)or die($conexao->error);
		while($row = $cons->fetch_array()){
			$id_area = 	$row['id'];
			$idmarca_area	=	$row['idmarca'];
			$legenda_area	=	$row['legenda'];
			$mapa_area = $row['mapa'];
			$obs_area = $row['obs'];
			$logomarca_area = $row['logomarca'];
			

			$btedita ="<a href='index.php?id=10.2&idArea=$id_area'><img src='imgs/btedita_off.png' border='0' class='bt-editar' /></a>";
			$btexclui ="<a href='index.php?id=10.3&idArea=$id_area&file=$mapa_area&conf=0'><img  src='imgs/btexclui_off.png' border='0' class='bt-excluir' /></a>";
			
			
			echo "<tr class='tupla'>";
			echo "<th width='20%' align='left' class='txt'><img src='files/$logomarca_area' width='85' /></th>";
			echo "<th width='71%' align='left' class='txt'>$legenda_area</th>";
			echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
			echo "</tr>";
			
		} 
		
		echo "</table>";
		
		echo "<br /><br />";
		
		
		
		mysql_close();
		
	?>
