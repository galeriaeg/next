<?php
require "session.php";

@$marca = $_GET['m'];
@$chave = $_GET['chave'];

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
?>

<script>
	function envia_marca(v) {
		let valor = v;
		window.location = 'index.php?id=6&m=' + valor;
	}

	function envia_chave() {
		let valor = document.getElementById('chave').value;
		window.location = 'index.php?id=6&chave=' + valor;
	}
</script>


<a href="index.php?id=6.1" title="Novo">
	<img src="imgs/novo.png" class="btnovo" border="0" alt="Novo" />
</a>

<h3><?php echo $titulo; ?></h3>

<section class="box-topo-busca">
	<select class="campo-simples" onchange='envia_marca(this.value);' name="marca">
		<option disabled selected>Marca</option>
		<?php
		$sql = "SELECT * FROM tb_marca ";
		$res = mysqli_query($conexao, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$id_marca = $row['id'];
			$nome_marca = $row['nome'];
			echo "<option value='$id_marca'>$nome_marca</option>";
		}
		?>
	</select>
	<label style="margin: 0 10px;">ou</label>
	<input type="text" name="chave" id="chave" value="" placeholder="Palavra chave" class="campo-simples" />
	<button class="btn-simples" onclick="envia_chave()">Buscar</button>
</section>


<table id="minhaTabela">
	<thead>
		<tr>
			<th width="9%" class="center">PRODUTO</th>
			<th width="66%">NOME</th>
			<th width="8%" class="center">MARCA</th>
			<th width="8%" class="center">STATUS</th>
			<th width="9%" class="center">AÇÕES</th>
		</tr>
	</thead>
	<tbody id="corpoTabela">
		<?php
		if ((!empty($marca)) && (empty($chave))) {
			//Busca por marca
			$sql = "SELECT * FROM tb_produto WHERE idmarca='$marca' ORDER BY idmarca ASC";
			$cons = $conexao->query($sql) or die($conexao->error);
			$totalMarca = mysqli_num_rows($cons);
			while ($row = $cons->fetch_array()) {
				$idProd		= 	$row['id'];
				$tituloFonte	=	$row['titulo'];
				$fotoProduto	=	$row['foto'];
				$idmarca	=	$row['idmarca'];
				$idlinha	=	$row['idlinha'];
				$status	=	$row['status'];

				if (empty($fotoProduto))
					$logomarca_Fonte = "imgs/sem_produto.jpg";
				else
					$logomarca_Fonte = "files/" . $fotoProduto;

				if ($status != 0) {
					$btstatus = "<img src='imgs/fleg-ativo.png' class='center' />";
				} else {
					$btstatus = "<img src='imgs/fleg-inativo.png' class='center' />";
				}

				$btedita = "<a href='index.php?id=6.2&idp=$idProd&idm=$idmarca&idl=$idlinha&st=$status'><img src='imgs/btn-editar.png' border='0' class='bt-editar' /></a>";
				$btexclui = "<a href='index.php?id=6.3&idp=$idProd&nome=$fotoProduto&nomep=$tituloFonte&idm=$idmarca&conf=0'><img  src='imgs/btn-excluir.png' border='0' class='bt-excluir' /></a>";

				echo "<tr class='tupla'>";
				echo "<td width='9%'><img src='$logomarca_Fonte' class='center' width='60' /></td>";
				echo "<td width='66%'>$tituloFonte</td>";
				echo "<td width='9%'>";
				$sqli = "SELECT nome,logomarca FROM tb_marca WHERE id='$idmarca'";
				$consi = $conexao->query($sqli) or die($conexao->error);
				while ($row = $consi->fetch_array()) {
					$nomeMarca	= 	$row['nome'];
					$logomarcaMarca	= 	$row['logomarca'];
					echo "<img src='files/$logomarcaMarca' class='center' width='85'>";
				}
				echo "<td width='8%' align='left' class='txt'>$btstatus</td>";
				echo "<td width='9%' align='left' class='txt'>$btedita $btexclui</td>";
				echo "</tr>";
			}
		} else if ((empty($marca)) && (!empty($chave))) {
			//Busca por palavra chave
			$sql = "SELECT * FROM tb_produto WHERE titulo LIKE '%$chave%' ";
			$cons = $conexao->query($sql) or die($conexao->error);
			$totalChave = mysqli_num_rows($cons);
			while ($row = $cons->fetch_array()) {
				$idProd		= 	$row['id'];
				$tituloFonte	=	$row['titulo'];
				$fotoProduto	=	$row['foto'];
				$idmarca	=	$row['idmarca'];
				$idlinha	=	$row['idlinha'];
				$status	=	$row['status'];

				if (empty($fotoProduto))
					$logomarca_Fonte = "imgs/sem_produto.jpg";
				else
					$logomarca_Fonte = "files/" . $fotoProduto;

				if ($status != 0) {
					$btstatus = "<img src='imgs/fleg-ativo.png'  class='center' />";
				} else {
					$btstatus = "<img src='imgs/fleg-inativo.png'  class='center' />";
				}


				$btedita = "<a href='index.php?id=6.2&idp=$idProd&idm=$idmarca&idl=$idlinha&st=$status'><img src='imgs/btn-editar.png' border='0' class='bt-editar' /></a>";
				$btexclui = "<a href='index.php?id=6.3&idp=$idProd&nome=$fotoProduto&nomep=$tituloFonte&conf=0'><img  src='imgs/btn-excluir.png' border='0' class='bt-excluir' /></a>";

				echo "<tr class='tupla'>";
				echo "<td width='9%' align='left' class='txt'><img src='$logomarca_Fonte' width='90' /></td>";
				echo "<td width='66%' align='left' class='txt'>$tituloFonte</td>";
				echo "<td width='8%' align='left' class='txt'>";

				$sqli = "SELECT nome,logomarca FROM tb_marca WHERE id='$idmarca'";
				$consi = $conexao->query($sqli) or die($conexao->error);
				while ($row = $consi->fetch_array()) {
					$nomeMarca	= 	$row['nome'];
					$logomarcaMarca	= 	$row['logomarca'];
					echo "<img src='files/$logomarcaMarca' class='center' width='85'>";
				}

				echo "</td>";
				echo "<td width='8%' align='left' class='txt'>$btstatus</td>";
				echo "<td width='9%' align='left' class='txt'>$btedita $btexclui</td>";
				echo "</tr>";
			}
		}
		mysqli_close($conexao);
		?>
	</tbody>
</table>
<?php
if ((empty($marca)) && (empty($totalMarca)) && (empty($totalChave) && (empty($chave)))) {
	echo "<span id='alertaInicial'  class='alerta-info'>
				 <b>&#9432;</b> Selecione uma <b>Marca</b> ou informe uma <b>plavra chave</b>!
				</span>";
}
if ((empty($marca)) && (!empty($chave)) && ($totalChave < 1)) {
	echo "<span id='alertaInicial'  class='alerta-erro'>
				 &#10006; Nenhum registro foi encontrado para a sua busca.</b>
				</span>";
}
if ((!empty($marca)) && (empty($chave)) && ($totalMarca < 1)) {
	echo "<span id='alertaInicial'  class='alerta-erro'>
				 &#10006; Nenhum registro foi encontrado para a sua busca.</b>
				</span>";
}
?>