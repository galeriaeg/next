<?php include "session.php"; ?>

<a href="index.php?id=5.1" title="Novo">
	<img src="imgs/novo.png" class="btnovo" border="0" alt="Novo" />
</a>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>


<table id="minhaTabela">
	<thead>
		<tr>
			<th width="20%" class="th">IMAGEM DESKTOP</th>
			<th width="15%" class="th">IMAGEM MOBILE</th>
			<th width="36%" class="th">LINK</th>
			<th width="12%" class="th">DESTINO</th>
			<th width="8%" class="th">STATUS</th>
			<th width="9%" class="th">AÇÕES</th>
		</tr>
	</thead>
	<tbody id="corpoTabela">

		<?php
		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		$sql = "SELECT * FROM tb_slider order by id desc";
		$cons = $conexao->query($sql) or die($conexao->error);
		$total = mysqli_num_rows($cons);
		while ($row = $cons->fetch_array()) {
			$id	= $row['id'];
			$ft_dsk = $row['foto'];
			$ft_mob = $row['foto_mini'];
			$link = $row['link'];
			$destino = $row['destino'];
			$status	= $row['status'];

			//verifica se há imagem desk
			if (empty($ft_dsk)) {
				$foto_dsk = "imgs/no-slide-desk.jpg";
			} else {
				$foto_dsk = "files/" . $ft_dsk;
			}

			//verifica se há imagem mob
			if (empty($ft_mob)) {
				$foto_mob = "imgs/no-slide-mob.jpg";
			} else {
				$foto_mob = "files/" . $ft_mob;
			}

			// Redefine Destino
			if ($destino != "_top") {
				$destino = "Nova janela";
			} else {
				$destino = "Mesma janela";
			}

			//botes editar e excluir	
			$btedita = "<a href='index.php?id=5.2&idSlide=$id'><img src='imgs/btn-editar.png' border='0' class='bt-editar btn-action'  /></a>";
			$btexclui = "<a href='index.php?id=5.3&idSlide=$id&foto_dsk=$ft_dsk&foto_mob=$ft_mob&conf=0'><img  src='imgs/btn-excluir.png' border='0' class='bt-excluir btn-action' /></a>";

			// Redefine status
			if ($status != 0) {
				$status = "<img src='imgs/fleg-ativo.png' class='center'/>";
			} else {
				$status = "<img src='imgs/fleg-inativo.png' class='center'/>";
			}

			echo "<tr class='tupla'>";
			echo "<th width='20%' align='left' class='txt'><img src='$foto_dsk' height='50px'  align='middle' style='margin:5px;float:left;clear:left;'></th>";
			echo "<th width='15%' align='left' class='txt'><img src='$foto_mob' height='50px'  align='middle' style='margin:5px;float:left;clear:left;'></th>";
			echo "<th width='36%' align='left' class='txt'>$link</th>";
			echo "<th width='12%' align='left' class='txt'>$destino</th>";
			echo "<th width='8%' align='left' class='txt'>$status</th>";
			echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
			echo "</tr>";
		}

		echo "</table>";

		if ($total < 1) {
			echo "<span class='box-notifica'>&#10006; N&atilde;o h&aacute; registros!</span>";
		}

		mysqli_close($conexao);
		?>