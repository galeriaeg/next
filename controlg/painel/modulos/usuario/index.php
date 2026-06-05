<?php
include("session.php");

//captura tipo e id do usuario da sessao;
$idUserSession =  $_SESSION['idUsuarioLogado'];
$tipoUserSession =  $_SESSION['tipoUsuarioLogado'];
?>

<a href="index.php?id=2.1" title="Novo">
	<img src="imgs/novo.png" class="btnovo" alt="Novo" />
</a>

<h3><?php echo $titulo; ?></h3>

<table id="minhaTabela">
	<thead>
		<tr>
			<th width="30%" class="th">NOME</th>
			<th width="33%" class="th">EMAIL</th>
			<th width="20%" class="th">LOGIN</th>
			<th width="8%" class="th center">STATUS</th>
			<th width="9%" class="th center">AÇÕES</th>
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

			if ($status == "INATIVO") {
				$classInativo = "color:#ccc;'";
				$labelStatus = "<img src='imgs/fleg-inativo.png' alt='fleg status' class='center' />";
			} else {
				$classInativo = "";
				$labelStatus = "<img src='imgs/fleg-ativo.png' alt='fleg status' class='center' />";
			}

			$btedita = "<a title='Editar' href='index.php?id=2.2&u=$id'><img src='imgs/btn-editar.png' border='0' alt='editar' class='bt-editar btn-action' /></a>";
			$btexclui = "<a title='Desativar' href='index.php?id=2.4.1&u=$id&t=0'><img  src='imgs/btn-ativo.png' border='0' class='bt-excluir btn-action' /></a>";

			if ($tipoUserSession == $tipo) {
				$btexclui = "";
			} else if ($tipo == 0) {
				$btexclui = "<a title='Ativar' href='index.php?id=2.4.1&u=$id&t=2'><img  src='imgs/btn-inativo.png' border='0' class='bt-excluir btn-action' /></a>";
			}

			if ($idUserSession == $id) {

				if ($tipo == 1)
					$tipoLabel = "[Master]";
				else
					$tipoLabel = "";

				echo "<tr style='background:#f3ffb1;'>";
				echo "<td width='30%' align='left' class='txt'>$nome $tipoLabel</td>";
				echo "<td width='33%' align='left' class='txt'>$email</td>";
				echo "<td width='20%' align='left' class='txt'>$login</td>";
				echo "<td width='8%' align='left' class='txt'>$labelStatus</td>";
				echo "<td width='9%' align='left' class='txt'>$btedita $btexclui</td>";
				echo "</tr>";
			} else {
				echo "<tr class='tupla'>";
				echo "<td width='30%' align='left' style='$classInativo' class='txt'>$nome</td>";
				echo "<td width='33%' align='left' style='$classInativo' class='txt'>$email</td>";
				echo "<td width='20%' align='left' style='$classInativo' class='txt'>$login</td>";
				echo "<td width='8%' align='left' class='txt'>$labelStatus</td>";
				echo "<td width='9%' align='left' class='txt'>$btedita $btexclui</td>";
				echo "</tr>";
			}
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