<?php require "session.php"; ?>

<a href="index.php?id=12.1" title="Novo">
	<img src="imgs/novo.png" class="btnovo" border="0" alt="Novo" />
</a>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<table id="minhaTabela">
	<thead>
		<tr>
			<th width="10%" class="th">CARD</th>
			<th width="73%" class="th">LINHA</th>
			<th width="8%" class="th center">STATUS</th>
			<th width="9%" class="th center">AÇÕES</th>
		</tr>
	</thead>
	<tbody id="corpoTabela">
		<?php

		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		$sql = "SELECT * FROM tb_linhas_cards ORDER BY id DESC";
		$cons = $conexao->query($sql) or die($conexao->error);
		while ($row = $cons->fetch_array()) {
			$idCard = 	$row['id'];
			$idlinha	=	$row['idlinha'];
			$nomelinha	=	$row['nome'];
			$anexoCard	=	$row['anexo'];
			$statusCard = $row['status'];

			if (empty($anexoCard))
				$card = "imgs/sem-card.jpg";
			else
				$card = "files/" . $anexoCard;

			// Define Fleg Status
			if ($statusCard > 0)
				$flegStatus = "<img src='imgs/fleg-ativo.png' class='center' />";
			else
				$flegStatus = "<img src='imgs/fleg-inativo.png' class='center' />";

			$btedita = "<a href='index.php?id=12.2&idCard=$idCard'><img src='imgs/btn-editar.png' border='0' class='bt-editar btn-action' /></a>";
			$btexclui = "<a href='index.php?id=12.3&idCard=$idCard&nome_arquivo=$anexoCard&conf=0'><img  src='imgs/btn-excluir.png' border='0' class='bt-excluir btn-action' /></a>";

			echo "<tr class='tupla'>";
			echo "<td width='10%' align='left' class='txt'><img src='$card' width='85' /></td>";
			echo "<td width='73%' align='left' class='txt'>$nomelinha</td>";
			echo "<td width='8%' align='left' class='txt'>$flegStatus</td>";
			echo "<td width='9%' align='left' class='txt'>$btedita $btexclui</td>";
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