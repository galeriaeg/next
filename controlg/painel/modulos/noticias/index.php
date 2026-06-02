<?php require "session.php"; ?>

<a href="index.php?id=3.1" title="Novo">
	<img src="imgs/novo.png" class="btnovo" alt="Novo" />
</a>

<h3><?php echo $titulo; ?></h3>

<table id="minhaTabela">
	<thead>
		<tr>
			<th width="10%">DATA</th>
			<th width="62%">TITULO</th>
			<th width="9%">STATUS</th>
			<th width="9%">AÇÕES</th>
		</tr>
	</thead>
	<tbody id="corpoTabela">

		<?php
		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		$sql = "SELECT * FROM tb_noticias ORDER BY id ASC";
		$cons = $conexao->query($sql) or die($conexao->error);
		$total = mysqli_num_rows($cons);
		while ($row = $cons->fetch_array()) {
			$idNoticia	= 	$row['id'];
			$titulo	=	$row['titulo'];
			$foto	=	$row['foto'];
			$descricao	=	$row['descricao'];
			$data	=	$row['data'];
			$status	=	$row['status'];

			if ($status > 0)
				$labelStatus = "<img src='imgs/flegAtivo.png' />";
			else
				$labelStatus = "<img src='imgs/flegInativo.png' />";

			$btedita = "<a href='index.php?id=3.2&not=$idNoticia'><img src='imgs/btn-editar.png' title='Editar' alt='Editar' border='0' class='bt-editar' /></a>";
			$btexclui = "<a href='index.php?id=3.3&idCont=$idNoticia&titulo=$titulo&conf=0'><img  src='imgs/btn-excluir.png' alt='Excluir' title='Excluir' border='0' class='bt-excluir' /></a>";

			echo "<tr class='tupla'>";
			echo "<th width='10%' align='left' class='txt'>$data</th>";
			echo "<th width='62%' align='left' class='txt'>$titulo</th>";
			echo "<th width='9%' align='left' class='txt'>$labelStatus</th>";
			echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
			echo "</tr>";
		}

		mysqli_close($conexao);
		?>
	</tbody>
</table>

<nav class="box-paginacao">
	<button id="prev" onclick="mudarPagina(-1)">Anterior</button>
	<span id="label">Página 1</span>
	<button id="next" onclick="mudarPagina(1)">Próximo</button>
</nav>
<script src="./js/paginacao.js"></script>