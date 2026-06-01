<?php require "session.php"; ?>


<img src="imgs/novo-off.png"  class="btnovo" border="0" alt="Novo" />


<h3><?php echo $titulo; ?></h3>


<div class="box-topo-busca">
	<form action="index.php?id=9.1.1"  method="POST" name="formLinha" onSubmit="return valida_linha(this)"> 
		
		<select class="campo-simples" name="marca">
			<option disabled selected>Marca</option>
			<?php
				include "../conecta.php";
				$sql = "SELECT * FROM marca ";
				$res = mysqli_query($conexao, $sql);
				while ($row = mysqli_fetch_array($res)) {
					$id_marca = $row['id'];
					$nome_marca = $row['nome'];
					echo "<option value='$id_marca'>$nome_marca</option>";
				}
			?>
		</select>
		<input type="text"  class="campo-simples" placeholder="Linha" name="linha">
		<input type="submit" value="Cadastrar" class="btn-simples"/>
	</form>
</div>



<table width="100%" border="0">
	<tr class="tr">
		<th width="20%" align="left" class="th">MARCA</th>
		<th width="71%" align="left" class="th">LINHA</th>
		<th width="9%" align="left" class="th">A&Ccedil;&Otilde;ES</th>
	</tr>
	
	
	<?php
		// conecat ao banco
		include ("conecta.php");
		
		
		
		$sql = "SELECT * FROM linha ORDER BY idmarca ASC";
		$cons = $conexao->query($sql)or die($conexao->error);
		while($row = $cons->fetch_array()){
			$idLinha		= 	$row['id'];
			$tituloLinha	=	$row['titulo'];
			$idmarcaLinha	=	$row['idmarca'];
			
			if(empty($logomarcaFonte))
			$logomarca_Fonte = "imgs/sem-logo.jpg";
			else
			$logomarca_Fonte = "files/".$logomarcaFonte;
			
			//botes editar e excluir	
			$btedita ="<a href='index.php?id=9.2&idLinha=$idLinha&idmarca=$idmarcaLinha'><img src='imgs/btedita_off.png' border='0' class='bt-editar' /></a>";
			$btexclui ="<a href='index.php?id=9.3&idLinha=$idLinha&tlinha=$tituloLinha&conf=0'><img  src='imgs/btexclui_off.png' border='0' class='bt-excluir' /></a>";
			
			
			echo "<tr class='tupla'>";
			echo "<th width='20%' align='left' class='txt'>";
			
			$r = "SELECT nome FROM marca where id='$idmarcaLinha'";
			$c = $conexao->query($r)or die($conexao->error);
			while($row = $c->fetch_array()){
				echo $nomeMar = 	$row['nome'];
			}
			
			
			echo "</th>";
			echo "<th width='71%' align='left' class='txt'>$tituloLinha</th>";
			echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
			echo "</tr>";
			
		} 
		
		echo "</table>";
		
		echo "<br /><br />";
		
		
		
		mysql_close();
		
	?>
