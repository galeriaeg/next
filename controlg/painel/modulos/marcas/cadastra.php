<?php include "session.php"; ?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<form action="index.php?id=7.1.1" enctype="multipart/form-data" method="POST">

	<label>Título:</label>
	<input name="titulo" required type="text" class="campo_m" />

	<label>Site:</label>
	<input name="site" type="text" required class="campo_m" value="" />
	<div class="boxAviso w-m">Caso não tenha Site, use: #</div>
	<label>Anexo:</label>
	<input name="arquivo" id="anexo" required type="file" accept="image/*" class="campo_m" onchange="validaTamMarca(this)" />
	<div class="boxAviso w-m">Permitido: png, jpg, jpeg, gif, webp, svg | Medidas: 300 x 155px</div>

	<!-- Visualização do anexo no upload-->
	<span id="box-anexo" class="box-anexo" style="display: none;">
		<img src="imgs/btn-excluir-anexo.jpg" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
		<img id="view" class="anexo-preview" />
	</span>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=7'" class="btn-back" />
	</div>

</form>

<script src="js/validaTamAnexo.js"></script>
<script src="js/previewFile.js"></script>