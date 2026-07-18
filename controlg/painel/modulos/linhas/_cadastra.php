<?php include "session.php"; ?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<form action="index.php?id=9.1.1" enctype="multipart/form-data" method="POST">

	<label>Linha:</label>
	<input name="linha" type="text" class="campo_m" required />

	<label>Anexo:</label>
	<input name="arquivo" id="anexo" type="file" class="campo_m" onchange="validaTamCard(this)" required />
	<div class="boxAviso w-m">*Imagem deve ter 300 x 300px</div>

	<!-- Visualização do anexo no upload-->
	<span id="box-anexo" class="box-anexo" style="display: none;">
		<img src="imgs/btn-excluir-anexo.jpg" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
		<img id="view" class="anexo-noticia" />
	</span>

	<label>Marca:</label>
	<select class="campo_p" required name="marca">
		<option value="" disabled selected>Selecione uma marca...</option>
		<?php
		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
		$sql = "SELECT * FROM tb_marca WHERE status = 1";
		$res = mysqli_query($conexao, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$id_marca = $row['id'];
			$nome_marca = $row['nome'];
			echo "<option value='$id_marca'>$nome_marca</option>";
		}
		?>
	</select>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="history.go(-1)" class="btn-back" />
	</div>

</form>

<script src="js/validaTamAnexo.js"></script>
<script src="js/previewFile.js"></script>