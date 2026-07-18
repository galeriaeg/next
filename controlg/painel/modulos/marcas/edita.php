<?php
include "session.php";

$idMarca = $_GET['idMarca'];

if (empty($idMarca)) {
	echo "<script>window.location.href = 'index.php';</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "SELECT * FROM tb_marca WHERE id='$idMarca'";
	$cons = $conexao->query($sql) or die($conexao->error);
	while ($row = $cons->fetch_array()) {
		$id = $row['id'];
		$nome	= $row['nome'];
		$logomarca	=	$row['logomarca'];
		$status	=	$row['status'];
		$site	=	$row['site'];
	}

	if (empty($logomarca)) {
		$fleg = 0;
	} else {
		$fleg = 1;
	}
}
?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<form action="index.php?id=7.2.1" enctype="multipart/form-data" method="post" name="formc">

	<label>Nome:</label>
	<input name="nome" required type="text" class="campo_m" value="<?php echo $nome; ?>" />

	<label>Site:</label>
	<input name="site" required type="text" class="campo_m" value="<?php echo $site; ?>" />

	<label>Anexo:</label>
	<?php
	if ($fleg < 1) {
		echo "<input name='arquivo' id='anexo' type='file' required accept='image/*' onchange='validaTamMarca(this)' class='campo_m' />";
		echo "<div class='boxAviso w-m'>Permitido: png, jpg, jpeg, gif, webp, svg | Medidas: 300 x 155px</div>";
	} else {
		//Visualização do anexo na base-->
		echo "<span class='box-anexo' style='display:block'>
		<a href='index.php?id=7.2.2&file=$logomarca&idMarca=$idMarca'><img src='imgs/btn-excluir-anexo.jpg' title='Excluir anexo' alt='anexo' style='position:absolute;cursor:pointer;' /></a>
		<img src='files/$logomarca' alt='anexo' class='anexo-preview' />
		</span>";
	}
	?>
	<!-- Visualização do anexo no upload-->
	<span id="box-anexo" class="box-anexo" style="display: none;">
		<img src="imgs/btn-excluir-anexo.jpg" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
		<img id="view" class="anexo-preview" />
	</span>

	<label>Status:</label>
	<select name="status" class="campo_p">
		<?php
		if ($status < 1) {
			echo "
				<option value='1'>Ativo</option>
				<option selected value='0'>Inativo</option>
				";
		} else {
			echo "
			<option selected value='1'>Ativo</option>
				<option value='0'>Inativo</option>
				";
		}
		?>
	</select>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=7'" class="btn-back" />
		<input type="hidden" value="<?php echo $idMarca; ?>" name="idMarca" />
	</div>

</form>

<script src="js/validaTamAnexo.js"></script>
<script src="js/previewFile.js"></script>