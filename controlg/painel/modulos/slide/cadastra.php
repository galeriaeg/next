<?php include "session.php"; ?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<script type="text/javascript" src="js/global.js"></script>

<form enctype="multipart/form-data" action="index.php?id=5.1.1" method="POST" name="formSlide" onSubmit="return slide(this)">

	<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
	<label>Imagem desktop: </label>
	<input name="arquivoDesktop" type="file" accept="image/*" class="campo_m" onchange="validaTamSlideDesk(this)" />
	<div class="boxAviso w-m">*Somente jpg, gif ou png - tamanho padrão 1800 x 450px</div>


	<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
	<label>Imagem mobile:</label>
	<input name="arquivoMobile" type="file" accept="image/*" class="campo_m" onchange="validaTamSlideMob(this)" />
	<div class="boxAviso w-m">*Somente jpg, gif ou png - tamanho padrão 600 x 450px</div>

	<label>Link: </label>
	<input name="link" type="text" class="campo_m" value="#" />

	<label>Destino:</label>
	<select name="destino" class="campo_m">
		<option value="_top">Mesma janela</option>
		<option value="_blank">Nova janela</option>
	</select>

	<label>Status:</label>
	<select name="status" class="campo_m">
		<option value="1">Ativo</option>
		<option value="0">Inativo</option>
	</select>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=5'" class="btn-back" />
	</div>

</form>

<script src="js/validaTamAnexo.js"></script>
<script src="js/previewFile.js"></script>