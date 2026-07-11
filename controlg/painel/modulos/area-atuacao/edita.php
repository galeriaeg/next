<?php
require "session.php";
$idArea = $_GET['idArea'];

if (empty($idArea)) {
	echo "<script>window.location.href = 'logout.php';</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "SELECT * FROM tb_area_atuacao WHERE id=$idArea";
	$cons = $conexao->query($sql) or die($conexao->error);
	while ($row = $cons->fetch_array()) {
		$id_area = 	$row['id'];
		$idmarca_area	=	$row['idmarca'];
		$legenda_area	=	$row['legenda'];
		$mapa_area = $row['mapa'];
		$texto_area = $row['texto'];
	}

	if (empty($mapa_area)) {
		$fleg = 0;
	} else {
		$fleg = 1;
	}
}
?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<form action="index.php?id=10.2.1" enctype="multipart/form-data" method="post">

	<label>Marca:</label>
	<?php
	$sql = "SELECT logomarca FROM tb_marca WHERE id = $idmarca_area";
	$cons = $conexao->query($sql) or die($conexao->error);
	while ($row = $cons->fetch_array()) {
		$logomarca_area = 	$row['logomarca'];
		echo "<img src='files/$logomarca_area' width='85' style='margin-bottom:15px;border:1px solid #e1e1e1' />";
	}
	?>

	<label>Legenda:</label>
	<input name="legenda" type="text" class="campo_m" value="<?php echo $legenda_area; ?>" />

	<label>Descrição:</label>
	<span id="btn-br" class="btn-break">Quebrar Linha</span>
	<textarea name="texto" id="texto" rows="5" class="campo_m"><?php echo $texto_area; ?></textarea>

	<label>Anexo:</label>
	<?php
	if ($fleg < 1) {
		echo "<input name='arquivo' id='anexo' type='file' required accept='image/*' onchange='validaTamMapa(this)' class='campo_m' />";
		echo "<div class='boxAviso w-m'>Permitido: png, jpg, jpeg, gif, webp, svg | Medidas: 300 x 300px</div>";
	} else {
		//Visualização do anexo na base-->
		echo "<span class='box-anexo' style='display:block'>
		<a href='index.php?id=10.2.2&file=$mapa_area&idArea=$idArea'><img src='imgs/btn-excluir-anexo.jpg' title='Excluir anexo' alt='anexo' style='position:absolute;cursor:pointer;' /></a>
		<img src='files/$mapa_area' alt='anexo' class='anexo-preview' />
		</span>";
	}
	?>
	<!-- Visualização do anexo no upload-->
	<span id="box-anexo" class="box-anexo" style="display: none;">
		<img src="imgs/btn-excluir-anexo.jpg" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
		<img id="view" class="anexo-preview" />
	</span>


	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=10'" class="btn-back" />
		<input type="hidden" value="<?php echo $idArea; ?>" name="idArea" />
	</div>

</form>

<script src="js/validaTamAnexo.js"></script>
<script src="js/previewFile.js"></script>
<script src="js/quebraLinha.js"></script>