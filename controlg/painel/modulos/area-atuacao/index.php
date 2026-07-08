<?php
require "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
?>

<a href="index.php?id=10.1" title="Novo">
	<img src="imgs/novo.png" class="btnovo" border="0" alt="Novo" />
</a>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<!-- Lista de Registros -->
<table id="minhaTabela">
	<thead>
		<tr>
			<th width="10%">MARCA</th>
			<th width="81%">REGIÕES</th>
			<th width="9%" class="center">AÇÕES</th>
		</tr>
	</thead>
	<tbody id="corpoTabela">
		<?php
		$sql = "SELECT tb_at.*, tb_m.logomarca AS logo
		FROM tb_area_atuacao AS tb_at, tb_marca AS tb_m
		WHERE tb_m.id = tb_at.idmarca
		ORDER BY id ASC";
		$cons = $conexao->query($sql) or die($conexao->error);
		while ($row = $cons->fetch_array()) {
			$id_area = 	$row['id'];
			$idmarca_area	=	$row['idmarca'];
			$legenda_area	=	$row['legenda'];
			$mapa_area = $row['mapa'];
			$obs_area = $row['obs'];
			$logomarca_area = "files/" . $row['logo'];

			$marca = "<img src='$logomarca_area' alt='logo' width='100' />";

			//botes editar e excluir	
			$btedita	= "<a href='index.php?id=10.2&idArea=$id_area'><img src='imgs/btn-editar.png' border='0' class='bt-editar  btn-action' /></a>";
			$btexclui = "<a href='index.php?id=10.3&idArea=$id_area'><img src='imgs/btn-excluir.png' border='0' class='bt-excluir btn-action' /></a>";

			echo "<tr class='tupla'>";
			echo "<td width='10%' align='left' class='txt'>$marca</td>";
			echo "<td width='81%' align='left' class='txt'>$legenda_area</td>";
			echo "<td width='9%' align='left' class='txt'>$btedita $btexclui</td>";
			echo "</tr>";
		}
		?>
	</tbody>
</table>

<nav class="box-paginacao">
	<button id="prev" onclick="mudarPagina(-1)">&#129032;</button>
	<span class="txtsimples" id="label">1</span>
	<button id="next" onclick="mudarPagina(1)">&#129034;</button>
</nav>
<script src="./js/paginacao.js"></script>