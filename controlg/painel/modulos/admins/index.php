<?php
include("session.php");

//captura usuario da sessao;
$idUserSession =  $_SESSION['idu'];
$tipoUserSession =  $_SESSION['tipo'];
?>

<a href="index.php?id=2.1" title="Novo">
	<img src="imgs/novo.png" class="btnovo" alt="Novo" />
</a>

<h3><?php echo $titulo; ?></h3>

<table id="minhaTabela">
	<thead>
		<tr>
			<th width="30%" class="th">NOME</th>
			<th width="34%" class="th">EMAIL</th>
			<th width="27%" class="th">LOGIN</th>
			<th width="9%" class="th">AÇÕES</th>
		</tr>
	</thead>
	<tbody id="corpoTabela">

		<?php
		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		if ($tipoUserSession == 1) {
			$sql = "SELECT * FROM tb_usuarios ORDER BY id DESC";
		} else {
			$sql = "SELECT * FROM tb_usuarios WHERE id='$idUserSession' AND tipo='2' LIMIT 1";
		}
		$cons = $conexao->query($sql) or die($conexao->error);
		while ($row = $cons->fetch_array()) {
			$id		= 	$row['id'];
			$nome	=	$row['nome'];
			$email	=	$row['email'];
			$login	=	$row['login'];
			$tipo	=	$row['tipo'];
			$status	=	$row['status'];

			if ($status == 0) {
				$statusLabel = "Inativo";
			} elseif ($status == 1) {
				$statusLabel = "<img src='imgs/flegAtivo.png' />";
			} elseif ($status == 2) {
				$statusLabel = "Excluído";
			}

			$btedita = "<a title='Editar' href='index.php?id=2.2&u=$id'><img src='imgs/btn-editar.png' border='0' alt='editar' class='bt-editar btn-action' /></a>";
			$btexclui = "<img  src='imgs/btn-excluir-off.png' border='0' class='bt-excluir' />";

			if ($tipoUserSession == 1) {
				$btexclui = "<a title='Excluir' href='index.php?id=2.4.1&u=$id'><img  src='imgs/btn-excluir.png' border='0' class='bt-excluir btn-action' /></a>";
			}

			if ($idUserSession == $id) {
				echo "<tr style='background:#f3ffb1;'>";
				echo "<th width='30%' align='left' class='txt'>$nome</th>";
				echo "<th width='34%' align='left' class='txt'>$email</th>";
				echo "<th width='27%' align='left' class='txt'>$login</th>";
				echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
				echo "</tr>";
			} else {
				echo "<tr class='tupla'>";
				echo "<th width='30%' align='left' class='txt'>***$nome</th>";
				echo "<th width='34%' align='left' class='txt'>$email</th>";
				echo "<th width='27%' align='left' class='txt'>$login</th>";
				echo "<th width='9%' align='left' class='txt'>$btedita $btexclui</th>";
				echo "</tr>";
			}
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