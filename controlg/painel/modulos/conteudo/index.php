<?php
require "session.php";
?>

<a href="index.php?id=8.1" title="Novo"><img src="imgs/novo.png" class="btnovo" border="0" alt="Novo" /></a>

<h3><?php echo $titulo; ?></h3>

<table id="minhaTabela">
	<thead>
		<tr>
			<th width="5%" align="left" class="th">TIPO</th>
			<th width="15%" align="left" class="th">PÁGINA</th>
			<th width="71%" align="left" class="th">DESCRIÇÃO</th>
			<th width="9%" align="left" class="th center">AÇÕES</th>
		</tr>
	</thead>
	<tbody id="corpoTabela">

		<?php

		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		$sql = "SELECT * FROM tb_conteudo ORDER BY id ASC";
		$res = mysqli_query($conexao, $sql);
		$total = mysqli_num_rows($res);
		while ($row = mysqli_fetch_array($res)) {
			$id		= 	$row['id'];
			$pagina	=	$row['pagina'];
			$titulo	=	$row['titulo'];
			$texto	=	$row['texto'];
			$tipo	=	$row['tipo'];

			$texto = substr($texto, 0, 78);

			$btedita = "<a href='index.php?id=8.2&idCont=$id&tipoCont=$tipo&pagina=$pagina'><img src='imgs/btn-editar.png' title='Editar' alt='Editar' border='0' class='bt-editar btn-action' /></a>";
			$btexclui = "<a href='index.php?id=8.3&idCont=$id&pagina=$pagina&conf=0'><img  src='imgs/btn-excluir.png' title='Excluir' alt='Excluir' border='0' class='bt-excluir btn-action' /></a>";

			echo "<tr class='tupla'>";
			echo "<td width='5%' align='left' class='txt'>$tipo</td>";
			echo "<td width='15%' align='left' class='txt'>$pagina</td>";
			echo "<td width='71%' align='left' class='txt'>$texto...</td>";
			echo "<td width='9%' align='left' class='txt'>$btedita $btexclui</td>";
			echo "</tr>";
		}
		echo "</table>";
		if ($total < 1) {
			echo "<span class='box-notifica'>&#10006; N&atilde;o h&aacute; registros!</span>";
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