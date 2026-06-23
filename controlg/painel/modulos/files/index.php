<?php
require "session.php";

@$file = $_GET['file'];

$protocolo = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https://" : "http://";
$dominio   = $_SERVER['HTTP_HOST']; // Retorna "localhost"
$urlBase = $protocolo . $dominio . '/next/';
?>

<script src="modulos/files/js/files.js"></script>
<link rel="stylesheet" href="modulos/files/css/files.css" />

<!-- Cropper.js CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>

<!-- Modal crop -->
<div id="modal-crop" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
     background:rgba(0,0,0,0.8); z-index:9999; justify-content:center; align-items:center;">
	<div style="background:#fff; padding:20px; border-radius:8px; max-width:700px; width:90%;">
		<h3 style="margin-bottom:10px;">Ajustar imagem</h3>
		<div style="max-height:450px; overflow:hidden;">
			<img id="imagem-crop" style="max-width:100%;" />
		</div>
		<div style="margin-top:15px; text-align:right; gap:10px; display:flex; justify-content:flex-end;">
			<button type="button" onclick="cancelarCrop()"
				style="padding:8px 16px; cursor:pointer;">Cancelar</button>
			<button type="button" onclick="confirmarCrop()"
				style="padding:8px 16px; background:#2e7d32; color:#fff; border:none; 
                       border-radius:4px; cursor:pointer;">Confirmar corte</button>
		</div>
	</div>
</div>


<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<!-- CADASTRA ARQUIVO -->
<form action="index.php?id=4.1" enctype="multipart/form-data" method="POST">
	<section class="box-topo-busca">
		<div class="box-inputs">
			<label><b>Enviar arquivo</b></label>
			<input type="file" name="arquivo" id="anexo" required class="input-file" accept="image/*" onchange="abreAnexo(this)" />
			<input type="text" placeholder="Nome do arquivo" required class="input-file" name="titulo" />
			<input type="hidden" name="imagem_cropada" id="imagem_cropada" />
		</div>
		<div class="box-anexo-pre" id="box-anexo" class="box-anexo" style="display:none;">
			<img src="imgs/btn-excluir-anexo.jpg" alt="anexo" onclick="fechaAnexo(1);" class="btn-excluir" />
			<img id="view" alt="anexo-pre" class="anexo-preview" />
		</div>
		<div class="box-botao-enviar">
			<input type="submit" class="btn-submit" value="Enviar arquivo" />
			<input type="reset" class="btn-back" style="margin-left:12px;" onclick="limparPreview(0);" value="Limpar" />
		</div>
	</section>
</form>


<!-- LISTA ARQUIVOS -->
<section class="iframe-files">
	<!-- BUSCA ARQUIVO -->
	<section class="box-topo-busca">
		<input type="text" name="chave" id="chave" value="" placeholder="Buscar" class="campo-simples">
		<button class="btn-simples" onclick="buscarArquivo()">Buscar</button>
		<div style="<?= $file ? $file : 'display:none'; ?>" class="tag" onclick="window.location.href='index.php?id=4'">&#10006;<span><?= $file ? $file : ''; ?></span></div>
	</section>
	<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	if (!empty($file)) {
		$sql = "SELECT * FROM tb_files WHERE nome LIKE '%$file%' ";
		$cons = $conexao->query($sql) or die($conexao->error);
		while ($row = $cons->fetch_array()) {
			$idFile 		= 	$row['id'];
			$imagemFile	=	$row['imagem'];
			$nomeFile		=	$row['nome'];
			$pathFile 	= $urlBase . "controlg/painel/files/" . $imagemFile;
			echo "<div class='card-file'>
			<div style='background-image: url(\"files/$imagemFile\");' title='$nomeFile'></div>
			<input name='url' id='file$idFile' value='$pathFile'>
				<i>
					<button onclick='copiarUrl(\"file$idFile\");'>Copiar</button>
					<button onclick='window.location.href=\"index.php?id=4.2&file=$idFile&nome=$imagemFile&conf=0 \"'>Excluir</button>
				</i>
		</div>";
		}
	} else {
		$sql = "SELECT * FROM tb_files ORDER BY id DESC";
		$cons = $conexao->query($sql) or die($conexao->error);
		while ($row = $cons->fetch_array()) {
			$idFile = 	$row['id'];
			$imagemFile	=	$row['imagem'];
			$nomeFile	=	$row['nome'];
			$pathFile = $urlBase . "controlg/painel/files/" . $imagemFile;
			echo "<div class='card-file'>
			<div style='background-image: url(\"files/$imagemFile\");' title='$nomeFile'></div>
			<input name='url' id='file$idFile' value='$pathFile'>
				<i>
					<button onclick='copiarUrl(\"file$idFile\");'>Copiar</button>
					<button onclick='window.location.href=\"index.php?id=4.2&file=$idFile&nome=$imagemFile&conf=0 \"'>Excluir</button>
				</i>
		</div>";
		}
	}
	mysqli_close($conexao);
	?>
</section>

<!-- <nav class="box-paginacao">
	<button id="prev" onclick="mudarPagina(-1)">&#129032;</button>
	<span class="txtsimples" id="label">1</span>
	<button id="next" onclick="mudarPagina(1)">&#129034;</button>
</nav>
<script src="./js/paginacao.js"></script> -->
<script src="./modulos/files/js/copiarFile.js"></script>
<script src="./modulos/files/js/cropper.js"></script>