<?php
require "session.php";
?>

<a href="index.php?id=8.1" title="Novo"><img src="imgs/novo.png" class="btnovo" border="0" alt="Novo" /></a>

<h3><?php echo $titulo; ?></h3>

<table width="100%" border="0">
	<tr class="tr">
		<th width="20%" align="left" class="th">P&Aacute;GINA</th>
		<th width="71%" align="left" class="th">DESCRI&Ccedil;&Atilde;O</th>
		<th width="9%" align="left" class="th">A&Ccedil;&Otilde;ES</th>
	</tr>
	<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "SELECT * FROM tb_conteudo ORDER BY id ASC";
	$res = mysqli_query($conexao, $sql);
	$total = mysqli_num_rows($res);
	while ($row = mysqli_fetch_array($res)) {

		/*$cons = $conexao->query($sql)or die($conexao->error);
		echo $qtde =  $conexao->mysqli_num_rows($cons);
		while($row = $cons->fetch_array()){*/
		$id		= 	$row['id'];
		$pagina	=	$row['pagina'];
		$titulo	=	$row['titulo'];
		$texto	=	$row['texto'];
		$tipo	=	$row['tipo'];

		$texto = substr($texto, 0, 78);

		$btedita = "<a href='index.php?id=8.2&idCont=$id&tipoCont=$tipo&pagina=$pagina'><img src='imgs/btedita_off.png' border='0' class='bt-editar' /></a>";
		$btexclui = "<a href='index.php?id=8.3&idCont=$id&pagina=$pagina&conf=0'><img  src='imgs/btexclui_off.png' border='0' class='bt-excluir' /></a>";

		echo "<tr class='tupla'>";
		echo "<th width='20%' align='left' class='txt'>$tipo - $pagina</th>";
		echo "<th width='71%' align='left' class='txt'>$texto...</th>";
		echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
		echo "</tr>";
	}
	echo "</table>";
	if ($total < 1) {
		echo "<span class='box-notifica'>&#10006; N&atilde;o h&aacute; registros!</span>";
	}
	mysqli_close($conexao);
	?>