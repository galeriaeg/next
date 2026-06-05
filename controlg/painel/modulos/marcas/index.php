<?php
require "session.php";
?>

<a href="index.php?id=7.1" title="Novo">
	<img src="imgs/novo.png" class="btnovo" border="0" alt="Novo" />
</a>

<h3><?php echo $titulo; ?></h3>

<table id="minhaTabela">
	<thead>
		<tr>
			<th width="10%" class="th">LOGOMARCA</th>
			<th width="73%" class="th">NOME</th>
			<th width="8%" class="th center">STATUS</th>
			<th width="9%" class="th center">AÇÕES</th>
		</tr>
	</thead>
	<tbody id="corpoTabela">
		<?php

		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		$sql = "SELECT * FROM tb_marca ORDER BY id ASC";
		$cons = $conexao->query($sql) or die($conexao->error);
		while ($row = $cons->fetch_array()) {
			$idMarca = 	$row['id'];
			$nomeMarca	=	$row['nome'];
			$logomarcaMarca	=	$row['logomarca'];
			$statusMarca = $row['status'];

			if (empty($logomarcaMarca))
				$logomarca = "imgs/sem-logo.jpg";
			else
				$logomarca = "files/" . $logomarcaMarca;

			// Define Fleg Status
			if ($statusMarca > 0)
				$flegStatus = "<img src='imgs/fleg-ativo.png' class='center' />";
			else
				$flegStatus = "<img src='imgs/fleg-inativo.png' class='center' />";

			$btedita = "<a href='index.php?id=7.2&idMarca=$idMarca'><img src='imgs/btn-editar.png' border='0' class='bt-editar btn-action' /></a>";
			$btexclui = "<a href='index.php?id=7.3&idMarca=$idMarca&nome=$nomeMarca&nome_arquivo=$logomarcaMarca&conf=0'><img  src='imgs/btn-excluir.png' border='0' class='bt-excluir btn-action' /></a>";

			echo "<tr class='tupla'>";
			echo "<th width='10%' align='left' class='txt'><img src='$logomarca' width='85' /></th>";
			echo "<th width='73%' align='left' class='txt'>$nomeMarca</th>";
			echo "<th width='8%' align='left' class='txt'>$flegStatus</th>";
			echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
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