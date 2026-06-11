<?php
include "session.php";

$idMarca = $_GET['idMarca'];

if (empty($idMarca)) {
	echo "<script>window.location = 'index.php';</script>";
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

<h3><?php echo $titulo; ?></h3>

<form action="index.php?id=7.2.1" enctype="multipart/form-data" method="post" name="formc">

	<label>Nome:</label>
	<input name="nome" required type="text" class="campo_m" value="<?php echo $nome; ?>" />

	<label>Site:</label>
	<input name="site" required type="text" class="campo_m" value="<?php echo $site; ?>" />

	<label>Anexo:</label>
	<?php
	if ($fleg < 1) {
		echo "<input name='arquivo' id='anexo' type='file' required accept='image/*' onchange='abreAnexo(this)' class='campo_m' />";
		echo "<div class='boxAviso'>*Imagem deve ter 300 x 155px</div>";
	} else {
		//Visualização do anexo na base-->
		echo "<span class='box-anexo' style='display:block'>
		<a href='index.php?id=7.2.2&file=$logomarca&idMarca=$idMarca'><img src='imgs/btn-excluir-axeno.png' title='Excluir anexo' alt='anexo' style='position:absolute;cursor:pointer;' /></a>
		<img src='files/$logomarca' alt='anexo' class='anexo-noticia' />
		</span>";
	}
	?>
	<!-- Visualização do anexo no upload-->
	<span id="box-anexo" class="box-anexo" style="display: none;">
		<img src="imgs/btn-excluir-axeno.png" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
		<img id="view" class="anexo-noticia" />
	</span>

	<label>Status:</label>
	<select name="status" class="campo_p">
		<?php
		if ($status < 1) {
			echo "
				<option selected value='0'>Inativo</option>
				<option value='1'>Ativo</option>";
		} else {
			echo "
				<option value='0'>Inativo</option>
				<option selected value='1'>Ativo</option>";
		}
		?>
	</select>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=7'" class="btn-back" />
		<input type="hidden" value="<?php echo $idMarca; ?>" name="idMarca" />
	</div>

</form>

<script src="js/previewFile.js"></script>