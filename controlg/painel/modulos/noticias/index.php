<?php require "session.php"; ?>

<a href="index.php?id=3.1" title="Novo"><img src="imgs/novo.png" class="btnovo" border="0" alt="Novo" /></a>

<h3><?php echo $titulo; ?></h3>

<table width="100%" border="0">
	<tr class="tr">
		<th width="10%" align="left" class="th">DATA</th>
		<th width="62%" align="left" class="th">TITULO</th>
		<th width="9%" align="left" class="th">status</th>
		<th width="9%" align="left" class="th">A&Ccedil;&Otilde;ES</th>
	</tr>

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

		//$texto = substr($texto,0,78);			

		$btedita = "<a href='index.php?id=3.2&not=$idNoticia'><img src='imgs/btedita_off.png' border='0' class='bt-editar' /></a>";
		$btexclui = "<a href='index.php?id=3.3&idCont=$idNoticia&titulo=$titulo&conf=0'><img  src='imgs/btexclui_off.png' border='0' class='bt-excluir' /></a>";

		echo "<tr class='tupla'>";
		echo "<th width='10%' align='left' class='txt'>$data</th>";
		echo "<th width='62%' align='left' class='txt'>$titulo</th>";
		echo "<th width='9%' align='left' class='txt'>$labelStatus</th>";
		echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
		echo "</tr>";
	}

	echo "</table>";

	echo "<br /><br />";

	mysqli_close($conexao);
	?>