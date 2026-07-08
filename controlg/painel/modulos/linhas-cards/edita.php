<?php include "session.php"; ?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<?php
$idCard = $_GET['idCard'];

if (empty($idCard)) {
	echo "<script>window.location.href = 'logout.php'</script>";
	exit();
} else {
	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
	$sql = "SELECT * FROM tb_linhas_cards WHERE id='$idCard' LIMIT 1";
	$cons = $conexao->query($sql) or die($conexao->error);
	while ($row = $cons->fetch_array()) {
		$idCard = $row['id'];
		$idLinhaCard	= $row['idlinha'];
		$nomeCard	= $row['nome'];
		$anexoCard	= $row['anexo'];
		$statusCard	= $row['status'];
	}

	if (empty($anexoCard)) {
		$fleg = 0;
	} else {
		$fleg = 1;
	}
}
?>

<form action="index.php?id=12.2.1" enctype="multipart/form-data" method="post">

	<label>Linha:</label>
	<select class="campo_p" required name="linha" onChange="MM_jumpMenu('parent',this,1)">
		<option disabled value="" selected>Selecione uma linha...</option>
		<?php
		$sql = "SELECT * FROM tb_linha ";
		$res = mysqli_query($conexao, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$id_linha = $row['id'];
			$titulo_linha = $row['titulo'];
			if ($idLinhaCard == $id_linha)
				echo "<option selected value='$id_linha'>$titulo_linha</option>";
			else
				echo "<option value='$id_linha'>$titulo_linha</option>";
		}
		?>
	</select>

	<label>Anexo:</label>
	<?php
	if ($fleg < 1) {
		echo "<input name='arquivo' id='anexo' type='file' required accept='image/*' onchange='validaTamCard(this)' class='campo_m' />";
		echo "<div class='boxAviso w-m'>Permitido: png, jpg, jpeg, gif, webp, svg | Medidas: 300 x 300px</div>";
	} else {
		//Visualização do anexo na base-->
		echo "<span class='box-anexo' style='display:block'>
		<a href='index.php?id=12.2.2&file=$anexoCard&idCard=$idCard'><img src='imgs/btn-excluir-anexo.jpg' title='Excluir anexo' alt='anexo' style='position:absolute;cursor:pointer;' /></a>
		<img src='files/$anexoCard' alt='anexo' class='anexo-preview' />
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
		if ($statusCard < 1) {
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
		<input type="button" value="Voltar" onClick="location.href='index.php?id=12'" class="btn-back" />
		<input type="hidden" value="<?php echo $idCard; ?>" name="idCard" />
	</div>

</form>

<script src="js/validaTamAnexo.js"></script>
<script src="js/previewFile.js"></script>