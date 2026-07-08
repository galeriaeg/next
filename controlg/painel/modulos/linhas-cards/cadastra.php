<?php
include "session.php";

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<form action="index.php?id=12.1.1" enctype="multipart/form-data" method="POST">

	<label>Linha:</label>
	<select class="campo_p" required name="linha">
		<option value="" disabled selected>Selecione uma linha...</option>
		<?php
		$sql = "SELECT id, titulo FROM tb_linha GROUP BY titulo";
		$res = mysqli_query($conexao, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$id_linha = $row['id'];
			$titulo_linha = $row['titulo'];
			echo "<option value='$id_linha'>$titulo_linha</option>";
		}
		?>
	</select>

	<label>Anexo:</label>
	<input name="arquivo" id="anexo" type="file" class="campo_m" accept="image/*" onchange="validaTamCard(this)" required />
	<div class="boxAviso w-m">Permitido: png, jpg, jpeg, gif, webp, svg | Medidas: 300 x 300px</div>

	<!-- Visualização do anexo no upload-->
	<span id="box-anexo" class="box-anexo" style="display: none;">
		<img src="imgs/btn-excluir-anexo.jpg" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
		<img id="view" class="anexo-preview" />
	</span>

	<label>Status:</label>
	<select name="status" class="campo_p">
		<option value="1">Ativo</option>
		<option value="0">Inativo</option>
	</select>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="history.go(-1)" class="btn-back" />
	</div>

</form>

<script src="js/validaTamAnexo.js"></script>
<script src="js/previewFile.js"></script>