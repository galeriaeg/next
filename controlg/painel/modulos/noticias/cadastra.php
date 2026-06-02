<?php include "session.php"; ?>

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

	<label>Anexo:</label>
	<input type="file" name="arquivo" id="anexo" class="campo_m" onchange="abreAnexo(this)" />
	<span id="box-anexo" class="box-anexo" style="display: none;">
		<img src="imgs/btexclui.png" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
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



<script>
	function abreAnexo(input) {
		const img = document.getElementById('view');
		const anexo = document.getElementById('box-anexo');
		img.src = URL.createObjectURL(input.files[0]);
		img.style.display = 'block';
		anexo.style.display = 'block';
	}

	function fechaAnexo(input) {
		const img = document.getElementById('view');
		const anexo = document.getElementById('box-anexo');
		const inputAnexo = document.getElementById('anexo');
		img.src = "";
		img.style.display = 'none';
		anexo.style.display = 'none';
		inputAnexo.value = "";
	}
</script>


<?php mysqli_close($conexao); ?>