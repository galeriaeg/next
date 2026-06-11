<?php include "session.php"; ?>

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

<form action="index.php?id=3.1.1" method="post" name="formNoticias" enctype="multipart/form-data" onSubmit="return noticias(this)">

	<legend>
		<h3><?php echo $titulo; ?></h3>
	</legend>

	<input name="data" type="date" class="campo_p" />

	<label>Título:</label>
	<input name="titulo" type="text" class="campo_m" maxlength="100" />

	<label>Texto:</label>
	<textarea name="texto" id="textarea-1" class="campo_m" rows="5"></textarea>
	<br />
	<!-- Campo de upload - Ratio para novidades 16:8-->
	<label>Anexo:</label>
	<input type="file" name="arquivo" id="anexo" class="campo_m" accept="image/*" onchange="abreAnexo(this,16/8)" />
	<input type="hidden" name="imagem_cropada" id="imagem_cropada" />

	<!-- Preview da imagem -->
	<span id="box-anexo" class="box-anexo" style="display:none;">
		<img src="imgs/btn-excluir-axeno.png" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
		<img id="view" class="anexo-noticia" />
	</span>

	<label>Status:</label>
	<select name="status" class="campo_p">
		<option value="0">Inativo</option>
		<option value="1">Ativo</option>
	</select>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=3'" class="btn-back" />
	</div>
</form>

<!-- Modal de crop -->
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
<script src="js/cropper.js"></script>

<?php mysqli_close($conexao); ?>