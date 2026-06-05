<?php
require "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
?>

<h3><?php echo $titulo; ?></h3>

<!-- Bloco Cadastro -->
<div class="box-topo-busca">
	<form action="index.php?id=9.1.1" method="POST" name="formLinha" onSubmit="return valida_linha(this)">
		<select class="campo-simples" required name="marca">
			<option value="" disabled selected>Selecione uma marca...</option>
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
		<input type="text" required class="campo-simples" placeholder="Linha" name="linha">
		<input type="submit" value="Cadastrar" class="btn-simples" />
	</form>
</div>

<!-- Lista de Registros -->
<table id="minhaTabela">
	<thead>
		<tr>
			<th width="20%">MARCA</th>
			<th width="71%">LINHA</th>
			<th width="9%" class="center">AÇÕES</th>
		</tr>
	</thead>
	<tbody id="corpoTabela">
		<?php
		$sql = "SELECT * FROM tb_linha ORDER BY idmarca ASC";
		$cons = $conexao->query($sql) or die($conexao->error);
		while ($row = $cons->fetch_array()) {
			$idLinha			= $row['id'];
			$tituloLinha	=	$row['titulo'];
			$idmarcaLinha	=	$row['idmarca'];

			//botes editar e excluir	
			$btedita	= "<a href='index.php?id=9.2&idLinha=$idLinha&idmarca=$idmarcaLinha'><img src='imgs/btn-editar.png' border='0' class='bt-editar  btn-action' /></a>";
			$btexclui = "<a href='index.php?id=9.3&idLinha=$idLinha&tlinha=$tituloLinha&conf=0'><img  src='imgs/btn-excluir.png' border='0' class='bt-excluir btn-action' /></a>";
			echo "<tr class='tupla'>";
			echo "<td width='20%'>";
			$r = "SELECT nome FROM tb_marca where id='$idmarcaLinha'";
			$c = $conexao->query($r) or die($conexao->error);
			while ($row = $c->fetch_array()) {
				echo $nomeMarca = 	$row['nome'];
			}
			echo "</td>";
			echo "<td width='71%'>$tituloLinha</td>";
			echo "<td width='9%'>$btedita $btexclui</td>";
			echo "</tr>";
		}
		mysqli_close($conexao);
		?>
	</tbody>
</table>

<nav class="box-paginacao">
	<button id="prev" onclick="mudarPagina(-1)">&#129032;</button>
	<span class="txtsimples" id="label">1</span>
	<button id="next" onclick="mudarPagina(1)">&#129034;</button>
</nav>
<script src="./js/paginacao.js"></script>