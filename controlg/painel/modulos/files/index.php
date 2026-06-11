<?php
require "session.php";
@$file = $_GET['file'];

$protocolo = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https://" : "http://";
$dominio   = $_SERVER['HTTP_HOST']; // Retorna "localhost"
$urlBase = $protocolo . $dominio . '/next/';
//echo $urlBase;
?>

<a href="index.php?id=7.1" title="Novo">
	<img src="imgs/novo.png" class="btnovo" border="0" alt="Novo" />
</a>

<h3><?php echo $titulo; ?></h3>

<section class="box-topo-busca">
	<input type="text" name="chave" id="chave" value="" placeholder="Buscar" class="campo-simples">
	<button class="btn-simples" onclick="buscarArquivo()">Buscar</button>
	<div style="<?= $file ? $file : 'display:none'; ?>" class="tag" onclick="window.location.href='index.php?id=4'">&#10006;<span><?= $file ? $file : ''; ?></span></div>
</section>

<section class="iframe-files">
	<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	if (!empty($file)) {
		$sql = "SELECT * FROM tb_files WHERE nome LIKE '%$file%' ";
		$cons = $conexao->query($sql) or die($conexao->error);
		while ($row = $cons->fetch_array()) {
			$idFile = 	$row['id'];
			$nomeFile	=	$row['nome'];
			$pathFile = $urlBase . "controlg/painel/files/" . $nomeFile;
			echo "<div class='card-file'>
			<div style='background-image: url(\"files/$nomeFile\");'></div>
			<input name='url' id='file$idFile' value='$pathFile'>
				<i>
					<button onclick='copiarUrl(\"file$idFile\");'>Copiar</button>
					<button>Excluir</button>
				</i>
		</div>";
		}
	} else {
		$sql = "SELECT * FROM tb_files ORDER BY id DESC";
		$cons = $conexao->query($sql) or die($conexao->error);
		while ($row = $cons->fetch_array()) {
			$idFile = 	$row['id'];
			$nomeFile	=	$row['nome'];
			$pathFile = "controlg/painel/files/" . $nomeFile;
			echo "<div class='card-file'>
			<div style='background-image: url(\"files/$nomeFile\");'></div>
			<input name='url' id='file$idFile' value='$pathFile'>
				<i>
					<button onclick='copiarUrl(\"file$idFile\");'>Copiar</button>
					<button>Excluir</button>
				</i>
		</div>";
		}
	}
	mysqli_close($conexao);
	?>
</section>

<nav class="box-paginacao">
	<button id="prev" onclick="mudarPagina(-1)">&#129032;</button>
	<span class="txtsimples" id="label">1</span>
	<button id="next" onclick="mudarPagina(1)">&#129034;</button>
</nav>
<script src="./js/paginacao.js"></script>
<script src="./js/copiarFile.js"></script>