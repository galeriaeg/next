<?php
	require "session.php";
	
	@$marca = $_GET['m'];
	@$chave = $_GET['chave'];
?>


<script>
	function envia_marca(v){
		let valor = v;
		window.location = 'index.php?id=6&m='+valor;
	}
	
	function envia_chave(){
		let valor = document.getElementById('chave').value;
		window.location = 'index.php?id=6&chave='+valor;
	}		
</script>	


<a href="index.php?id=6.1" title="Novo">
	<img src="imgs/novo.png"  class="btnovo" border="0" alt="Novo" />
</a>

<h3><?php echo $titulo; ?></h3>


<section class="box-topo-busca">
	<select class="campo-simples" onchange='envia_marca(this.value);' name="marca">
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
	<img src="imgs/texto-ou.png" alt="texto ou" />
	
	<input type="text" name="chave" id="chave" value="" placeholder="Palavra chave" class="campo-simples"  />
<button class="btn-simples" onclick="envia_chave()" />Buscar</button>

</section>


<table width="100%" border="0">
	<tr class="tr">
		<th width="15%" align="left" class="th">LOGOMARCA</th>
		<th width="55%" align="left" class="th">TÍTULO</th>
		<th width="12%" align="left" class="th">MARCA</th>
		<th width="9%" align="left" class="th">STATUS</th>
		<th width="9%" align="left" class="th">A&Ccedil;&Otilde;ES</th>
	</tr>
	
	
	<?php
		//include "../conecta.php";
		
		
		if((!empty($marca)) && (empty($chave))){
		
			//echo "Marca";
			
			$sql = "SELECT * FROM produto WHERE idmarca='$marca' ORDER BY idmarca ASC";
			$cons = $conexao->query($sql)or die($conexao->error);
			$total = mysqli_num_rows($cons); 
			while($row = $cons->fetch_array()){
				$idProd		= 	$row['id'];
				$tituloFonte	=	$row['titulo'];
				$fotoProduto	=	$row['foto'];
				$idmarca	=	$row['idmarca'];
				$idlinha	=	$row['idlinha'];
				$status	=	$row['status'];
				
				if(empty($fotoProduto))
				$logomarca_Fonte = "imgs/sem_produto.jpg";
				else
				$logomarca_Fonte = "files/".$fotoProduto;
				
				if($status!=0){
					$btstatus="<img src='imgs/flegAtivo.png' />";
				}
				else{
					$btstatus="<img src='imgs/flegInativo.png' />";
				}
				
				
				$btedita ="<a href='index.php?id=6.2&idp=$idProd&idm=$idmarca&idl=$idlinha&st=$status'><img src='imgs/btedita_off.png' border='0' class='bt-editar' /></a>";
				$btexclui ="<a href='index.php?id=6.3&idp=$idProd&nome=$fotoProduto&nomep=$tituloFonte&idm=$idmarca&conf=0'><img  src='imgs/btexclui_off.png' border='0' class='bt-excluir' /></a>";
				
				echo "<tr class='tupla'>";
				echo "<th width='15%' align='left' class='txt'><img src='$logomarca_Fonte' width='90' /></th>";
				echo "<th width='55%' align='left' class='txt'>$tituloFonte</th>";
				echo "<th width='12%' align='left' class='txt'>";
				
				$sqli = "SELECT nome,logomarca FROM marca WHERE id='$idmarca'";
				$consi = $conexao->query($sqli)or die($conexao->error);
				while($row = $consi->fetch_array()){
					$nomeMarca	= 	$row['nome'];
					$logomarcaMarca	= 	$row['logomarca'];
					echo "<img src='files/$logomarcaMarca' width='85'>";
				}
				
				echo "</th>";
				echo "<th width='9%' align='left' class='txt'>$btstatus</th>";
				echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
				echo "</tr>";
				
			}
			
				
			}else if((empty($marca)) && (!empty($chave))){
			
				//echo "selecioana por chave";
				
				//SELECT * FROM produto WHERE titulo LIKE 'WS80A9%';
				
				$sql = "SELECT * FROM produto WHERE titulo LIKE '%$chave%' ";
				$cons = $conexao->query($sql)or die($conexao->error);
				$total = mysqli_num_rows($cons); 
				while($row = $cons->fetch_array()){
				$idProd		= 	$row['id'];
				$tituloFonte	=	$row['titulo'];
				$fotoProduto	=	$row['foto'];
				$idmarca	=	$row['idmarca'];
				$idlinha	=	$row['idlinha'];
				$status	=	$row['status'];
				
				if(empty($fotoProduto))
				$logomarca_Fonte = "imgs/sem_produto.jpg";
				else
				$logomarca_Fonte = "files/".$fotoProduto;
				
				if($status!=0){
					$btstatus="<img src='imgs/flegAtivo.png' />";
				}
				else{
					$btstatus="<img src='imgs/flegInativo.png' />";
				}
				
				
				$btedita ="<a href='index.php?id=6.2&idp=$idProd&idm=$idmarca&idl=$idlinha&st=$status'><img src='imgs/btedita_off.png' border='0' class='bt-editar' /></a>";
				$btexclui ="<a href='index.php?id=6.3&idp=$idProd&nome=$fotoProduto&nomep=$tituloFonte&conf=0'><img  src='imgs/btexclui_off.png' border='0' class='bt-excluir' /></a>";
				
				echo "<tr class='tupla'>";
				echo "<th width='15%' align='left' class='txt'><img src='$logomarca_Fonte' width='90' /></th>";
				echo "<th width='55%' align='left' class='txt'>$tituloFonte</th>";
				echo "<th width='12%' align='left' class='txt'>";
				
				$sqli = "SELECT nome,logomarca FROM marca WHERE id='$idmarca'";
				$consi = $conexao->query($sqli)or die($conexao->error);
				while($row = $consi->fetch_array()){
					$nomeMarca	= 	$row['nome'];
					$logomarcaMarca	= 	$row['logomarca'];
					echo "<img src='files/$logomarcaMarca' width='85'>";
				}
				
				echo "</th>";
				echo "<th width='9%' align='left' class='txt'>$btstatus</th>";
				echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
				echo "</tr>";				
				
				}
				
				
			}else{
				echo "<span class='box-notifica' style='margin-bottom:10px;'>
				&#10006; Informe a <b>Marca</b> ou uma <b>plavra chave</b>!
				</span>";
				exit();
			}
			
		echo "</table>";
			
		
		
		
		
		
		if($total<1){
			echo "<span class='box-notifica'>&#10006; N&atilde;o h&aacute; registros!</span>";
		}
		
		
		
		mysqli_close($conexao);
		
	?>