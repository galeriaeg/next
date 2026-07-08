<?php
require "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
?>

<a href="index.php?id=10.1" title="Novo">
	<img src="imgs/novo.png" class="btnovo" border="0" alt="Novo" />
</a>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<form action="index.php?id=10.1.1" enctype="multipart/form-data" method="POST">

	<label>Marca:</label>
	<select class="campo_p" required name="marca">
		<option disabled value="" selected>Selecione uma marca...</option>
		<?php
		$sql = "SELECT * FROM tb_marca WHERE status=1";
		$res = mysqli_query($conexao, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$id_marca = $row['id'];
			$nome_marca = $row['nome'];
			echo "<option value='$id_marca'>$nome_marca</option>";
		}
		?>
	</select>

	<label>Legenda:</label>
	<input name="legenda" required type="text" class="campo_m" />

	<label>Descrição:</label>
	<textarea name="texto" required rows="5" class="campo_m"></textarea>

	<label>Anexo:</label>
	<input name="arquivo" required id="anexo" type="file" class="campo_m" accept="image/*" onchange="validaTamMapa(this)" />
	<!-- Visualização do anexo no upload-->
	<span id="box-anexo" class="box-anexo" style="display: none;">
		<img src="imgs/btn-excluir-anexo.jpg" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
		<img id="view" class="anexo-preview" />
	</span>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=10'" class="btn-back" />
	</div>

</form>

<script src="js/validaTamAnexo.js"></script>
<script src="js/previewFile.js"></script>