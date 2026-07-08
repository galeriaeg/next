<?php include "session.php"; ?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<?php

$idSlide	= $_GET['idSlide'];

if (empty($idSlide)) {
	echo "<script>window.location.href = 'logout.php'</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "SELECT * FROM tb_slider WHERE id='$idSlide' LIMIT 1";
	$cons = $conexao->query($sql) or die($conexao->error);
	$total = mysqli_num_rows($cons);
	while ($row = $cons->fetch_array()) {
		$id = $row['id'];
		$data = $row['data'];
		$img_dsk = $row['img_desk'];
		$img_mob = $row['img_mob'];
		$link = $row['link'];
		$destino = $row['destino'];
		$status	= $row['status'];
	}

	if ($total < 1) {
		echo "<script>window.location.href = 'logout.php'</script>";
		exit();
	}

	// Redefine Destino
	if ($destino != "_top") {
		$lista_destino = "
		<option value='_blank' selected='selected'>Nova janela</option>
		<option value='_top'>Mesma janela</option>";
	} else {
		$lista_destino = "
		<option value='_blank'>Nova janela</option>
		<option value='_top' selected='selected'>Mesma janela</option>";
	}

	// Redefine status
	if ($status != 0) {
		$lista_status = "
		<option value='1' selected='selected'>Ativo</option>
		<option value='0'>Inativo</option>";
	} else {
		$lista_status = "
		<option value='1'>Ativo</option>
		<option value='0' selected='selected'>Inativo</option>";
	}
}
?>

<form enctype="multipart/form-data" action="index.php?id=5.2.1" method="POST" onSubmit="return cadslider(this)">

	<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
	<label>Imagem desktop: </label>
	<span id="input-sd">
		<input name="arquivoDesktop" id="input-sd" required type="file" accept="image/*" class="campo_m" onchange="validaTamSlideDesk(this)" />
	</span>
	<!-- Visualização do anexo no upload-->
	<span id="box-anexo-sd" class="box-anexo" style="display: none;">
		<img src="imgs/btn-excluir-anexo.jpg" alt="anexo" title="Remover" onclick="window.location.href='index.php?id=5.5&idSlide=<?php echo $idSlide; ?>&filedsk=<?php echo $img_dsk; ?>'" style="position:absolute;cursor:pointer;" />
		<img id="view-sd" src="<?php echo $img_dsk; ?>" class="anexo-preview" />
	</span>
	<div class="boxAviso w-m">*Somente jpg, gif ou png - tamanho padrão 1800 x 450px</div>

	<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
	<label>Imagem mobile:</label>
	<span id="input-sm">
		<input name="arquivoMobile" type="file" required id="input-sm" accept="image/*" class="campo_m" onchange="validaTamSlideMob(this)" />
	</span>
	<!-- Visualização do anexo no upload-->
	<span id="box-anexo-sm" class="box-anexo" style="display: none;">
		<img src="imgs/btn-excluir-anexo.jpg" alt="anexo" title="Remover" onclick="window.location.href='index.php?id=5.5&idSlide=<?php echo $idSlide; ?>&filemob=<?php echo $img_mob; ?>'" style="position:absolute;cursor:pointer;" />
		<img id="view-sm" src="<?php echo $img_dsk; ?>" class="anexo-preview" />
	</span>
	<div class="boxAviso w-m">*Somente jpg, gif ou png - tamanho padrão 600 x 450px</div>


	<label>Link: </label>
	<input name="link" type="text" required class="campo_m" value="<?php echo "$link"; ?>" />
	<div class="boxAviso w-m">Caso o slide não tenha link, use: #</div>

	<label>Destino:</label>
	<select name="destino" class="campo_p">
		<?php echo $lista_destino; ?>
	</select>

	<label>Status:</label>
	<select name="status" class="campo_p">
		<?php echo $lista_status; ?>
	</select>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=5'" class="btn-back" />
		<input type="hidden" value="<?php echo $idSlide; ?>" name="id" />
	</div>

</form>

<?php
if (!empty($img_dsk)) {
	$img_dsk = "files/" . $img_dsk;
	echo "<script>document.getElementById('input-sd').remove();</script>";
	echo "<script>document.getElementById('box-anexo-sd').style.display='block';</script>";
	echo "<script>document.getElementById('view-sd').src='$img_dsk';</script>";
}
if (!empty($img_mob)) {
	$img_mob = "files/" . $img_mob;
	echo "<script>document.getElementById('input-sm').remove();</script>";
	echo "<script>document.getElementById('box-anexo-sm').style.display='block';</script>";
	echo "<script>document.getElementById('view-sm').src='$img_mob';</script>";
}
?>

<script src="js/validaTamAnexo.js"></script>
<script src="js/previewFile.js"></script>