<?php require "session.php"; ?>

<a href="index.php?id=3.1" title="Novo">
	<img src="imgs/novo.png" class="btnovo" alt="Novo" />
</a>

<h3><?php echo $titulo; ?></h3>

<table id="minhaTabela">
	<thead>
		<tr>
			<th width="10%">DATA</th>
			<th width="73%">TITULO</th>
			<th width="8%" class="center">STATUS</th>
			<th width="9%" class="center">AÇÕES</th>
		</tr>
	</thead>
	<tbody id="corpoTabela">

		<?php
		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		$sql = "SELECT * FROM tb_noticias ORDER BY id DESC";
		$cons = $conexao->query($sql) or die($conexao->error);
		$total = mysqli_num_rows($cons);
		while ($row = $cons->fetch_array()) {
			$idNoticia	= 	$row['id'];
			$titulo	=	$row['titulo'];
			$foto	=	$row['foto'];
			$descricao	=	$row['descricao'];
			$data	=	$row['data'];
			$status	=	$row['status'];

			// Define Fleg Status
			if ($status > 0)
				$labelStatus = "<img src='imgs/fleg-ativo.png' class='center' />";
			else
				$labelStatus = "<img src='imgs/fleg-inativo.png' class='center' />";

			$btedita = "<a href='index.php?id=3.2&not=$idNoticia'><img src='imgs/btn-editar.png' title='Editar' alt='Editar' border='0' class='bt-editar btn-action' /></a>";
			$btexclui = "<a href='index.php?id=3.3&idCont=$idNoticia&titulo=$titulo&conf=0'><img  src='imgs/btn-excluir.png' alt='Excluir' title='Excluir' border='0' class='bt-excluir btn-action' /></a>";

			echo "<tr class='tupla'>";
			echo "<td width='10%' align='left'>$data</td>";
			echo "<td width='73%' align='left'>$titulo</td>";
			echo "<td width='8%' align='left'>$labelStatus</td>";
			echo "<td width='9%' align='left'>$btedita $btexclui</td>";
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