<?php
	include "session.php";
?>

<a href="index.php?id=5.1" title="Novo">
	<img src="imgs/novo.png"  class="btnovo" border="0" alt="Novo" />
</a>

<h3><?php echo $titulo; ?></h3>


<table width="100%" border="0">
	<tr class="tr">
        <th width="20%" align="left" class="th">IMAGEM DESKTOP</th>
		<th width="15%" align="left" class="th">IMAGEM MOBILE</th>
        <th width="36%" align="left" class="th">LINK</th>
        <th width="12%" align="left" class="th">DESTINO</th>
        <th width="8%" align="left" class="th">STATUS</th>
        <th width="9%" align="left" class="th">A&Ccedil;&Otilde;ES</th>
	</tr>
	
	
	
	<?php

		include "../conecta.php";
		
		
		$sql = "SELECT * FROM slider order by id desc";
		$cons = $conexao->query($sql)or die($conexao->error);
		$total = mysqli_num_rows($cons); 
		while($row = $cons->fetch_array()){
			$id	= $row['id'];
			$ft_dsk = $row['foto'];
			$ft_mob = $row['foto_mini'];
			$link = $row['link'];
			$destino = $row['destino'];
			$status	= $row['status'];
			
			//verifica se há imagem desk
			if(empty($ft_dsk)){
				$foto_dsk = "imgs/no-slide-desk.jpg";
			}
			else{
				$foto_dsk = "files/".$ft_dsk;
			}
			
			//verifica se há imagem mob
			if(empty($ft_mob)){
				$foto_mob = "imgs/no-slide-mob.jpg";
			}
			else{
				$foto_mob = "files/".$ft_mob;
			}
			
			
			
			// Redefine Destino
			if($destino!="_top"){
				$destino = "Nova janela";
			}
			else{
				$destino= "Mesma janela";
			}
			
			
			
			//botes editar e excluir	
			$btedita ="<a href='index.php?id=5.2&idSlide=$id'><img src='imgs/btedita_off.png' border='0' class='bt-editar' /></a>";
			$btexclui ="<a href='index.php?id=5.3&idSlide=$id&foto_dsk=$ft_dsk&foto_mob=$ft_mob&conf=0'><img  src='imgs/btexclui_off.png' border='0' class='bt-excluir' /></a>";
			
			
			
			// Redefine status
			if($status!=0){
				//$status="Ativo";
				$status="<img src='imgs/flegAtivo.png' />";
			}
			else{
				//$status="Inativo";
				$status="<img src='imgs/flegInativo.png' />";
			}
			
			
			
			echo "<tr class='txt'>";
			echo "<th width='20%' align='left' class='txt'><img src='$foto_dsk' height='50px'  align='middle' style='margin:5px;float:left;clear:left;'></th>";
			echo "<th width='15%' align='left' class='txt'><img src='$foto_mob' height='50px'  align='middle' style='margin:5px;float:left;clear:left;'></th>";
			echo "<th width='36%' align='left' class='txt'>$link</th>";
			echo "<th width='12%' align='left' class='txt'>$destino</th>";
			echo "<th width='8%' align='left' class='txt'>$status</th>";
			echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
			echo "</tr>";	
		}
		
		echo "</table>";
		
		
		if($total<1){
			echo "<span class='box-notifica'>&#10006; N&atilde;o h&aacute; registros!</span>";
		}
		
		mysqli_close($conexao);
	?>
