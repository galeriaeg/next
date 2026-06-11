<?php include "session.php"; ?>

<form action="index.php?id=7.1.1" enctype="multipart/form-data" method="POST">

	<legend>
		<h3><?php echo $titulo; ?></h3>
	</legend>

	<label>Título:</label>
	<input name="titulo" required type="text" class="campo_m" />

	<label>Site:</label>
	<input name="site" type="text" required class="campo_m" value="" />
	<div class="boxAviso">Caso não tenha Site, use: #</div>
	<label>Anexo:</label>
	<input name="arquivo" id="anexo" required type="file" accept="image/*" class="campo_m" onchange="abreAnexo(this)" />
	<div class="boxAviso">*Imagem deve ter 300 x 155px</div>

	<!-- Visualização do anexo no upload-->
	<span id="box-anexo" class="box-anexo" style="display: none;">
		<img src="imgs/btn-excluir-axeno.png" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
		<img id="view" class="anexo-noticia" />
	</span>

	<!-- <label>Status:</label>
	<select name="status" class="campo_p">
		<option value="0">Inativo</option>
		<option value="1">Ativo</option>
	</select> -->

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=7'" class="btn-back" />
	</div>

</form>

<script src="js/previewFile.js"></script>