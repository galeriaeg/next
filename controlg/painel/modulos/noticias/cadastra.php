<?php include "session.php"; ?>

<!-- CSS MODULO FILES -->
<link rel="stylesheet" href="modulos/files/css/files.css" />

<!-- Cropper.js CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>

<!-- TEXTAREA EDITOR -->
<style type="text/css">
	#textarea-1 {
		width: 60%;
		height: 350px;
		padding: 10px;
		border: 2px solid #ccc;
	}

	.mooeditable-container {
		border: 1px solid #ccc !important;

	}
</style>
<link rel="stylesheet" type="text/css" href="modulos/cheeaun-editor/Assets/MooEditable/MooEditable.css">
<script type="text/javascript" src="modulos/cheeaun-editor/Demos/assets/mootools.js"></script>
<script type="text/javascript" src="modulos/cheeaun-editor/Source/MooEditable/MooEditable.js"></script>
<script type="text/javascript">
	window.addEvent('domready', function() {
		$('textarea-1').mooEditable();
		// Post submit
		$('theForm').addEvent('submit', function(e) {
			alert($('textarea-1').value);
			return true;
		});
	});
</script>
<!-- TEXTAREA EDITOR -->

<script type="text/javascript" src="js/global.js"></script>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<form action="index.php?id=3.1.1" method="post" name="formNoticias" enctype="multipart/form-data" onSubmit="return noticias(this)">

	<input name="data" type="date" required class="campo_p" />

	<label>Título:</label>
	<input name="titulo" type="text" required class="campo_m" maxlength="100" />

	<label>Texto:</label>
	<textarea name="texto" id="textarea-1" class="campo_m" rows="5"></textarea>
	<br />

	<label>Anexo:</label>
	<div class="col12">
		<a id="btn-anexar" class="btn-anexar" onclick="abreFechaModalFiles(1)"><i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp; Anexar Imagem</a>
		<div class="box-file" id="box-file" style="display:none;">
			<i class="fa fa-check" aria-hidden="true"></i> Imagem anexada (<i id="legenda"></i>)
			<div class="btn-remove" onclick='removerAnexo();'>&#10006;</div>
		</div>
		<input type="hidden" name="id_arquivo" id="id_arquivo" />
	</div>

	<label>Status:</label>
	<select name="status" class="campo_p">
		<option value="1">Ativo</option>
		<option value="0">Inativo</option>
	</select>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=3'" class="btn-back" />
	</div>
</form>

<!-- IMPORT MODULO FILES -->
<script src="modulos/files/js/files.js"></script>
<?php include_once "modulos/files/modal-files.php"; ?>


<?php mysqli_close($conexao); ?>