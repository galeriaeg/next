<?php include "session.php"; ?>

<script type="text/javascript" src="js/global.js"></script>
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


<form action="index.php?id=8.1.1" method="post" name="formConteudo" onSubmit="return conteudo(this)">

	<legend>
		<h3><?php echo $titulo; ?></h3>
	</legend>

	<label>Página:</label>
	<select name="tipo" id="tipo" onchange="addMapa();" class="campo_p">
		<option selected></option>
		<option value="1:Sobre">Sobre</option>
		<option value="2:Produtos">Produtos</option>
		<option value="3:Área de atuação">Área de atuação</option>
		<option value="4:Contato">Contato</option>
		<option value="5:Busca">Busca</option>
	</select>

	<label>Título:</label>
	<input name="titulo" type="text" class="campo_m" />

	<label>Texto:</label>
	<textarea id="textarea-1" name="texto" class="campo_g" rows="25"></textarea>

	<span id="mapa" style="display: none; margin-top:15px">
		<label>Mapa:</label>
		<textarea name="mapa" class="campo_m" rows="10"></textarea>
	</span>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=8'" class="btn-back" />
	</div>

</form>

<script>
	function addMapa() {
		const page = document.getElementById('tipo').value;
		const mapa = document.getElementById('mapa');
		const numPage = Number(page.split(':')[0]);
		if (numPage == 1) {
			mapa.style.display = 'block';
		} else {
			mapa.style.display = 'none';
		}
	}
</script>

<?php mysqli_close($conexao); ?>