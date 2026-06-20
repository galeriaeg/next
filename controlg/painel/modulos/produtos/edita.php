<?php
include "session.php";

$idproduto = $_GET['idp'];
$idmarca = $_GET['idm'];
$idlinha = $_GET['idl'];
$status = $_GET['st'];

if (
	(empty($idproduto)) ||
	(empty($idmarca)) ||
	(empty($idlinha))
) {
	echo "<script>window.location = 'index.php'</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "SELECT * FROM tb_produto WHERE id='$idproduto'";
	$cons = $conexao->query($sql) or die($conexao->error);
	while ($row = $cons->fetch_array()) {
		$idp = $row['id'];
		$titulop	= $row['titulo'];
		$descricaop	=	$row['descricao'];
		$fotop	=	$row['file'];
		$idmarcap	=	$row['idmarca'];
		$idlinhap	=	$row['idlinha'];
		$status	=	$row['status'];
	}
}
?>

<script type="text/javascript" src="js/global.js"></script>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<form action="index.php?id=6.2.1" enctype="multipart/form-data" method="POST" name="formFonte" onSubmit="return fonte(this)">

	<span class="txt"><?php echo "ID:" . $idproduto; ?></span><br /><br />

	<label>Marca:</label>
	<?php
	$sql = "SELECT * FROM tb_marca WHERE id='$idmarca' ";
	$res = mysqli_query($conexao, $sql);
	while ($row = mysqli_fetch_array($res)) {
		$id_marca = $row['id'];
		$nome_marca = $row['nome'];
		$logomarca_marca = $row['logomarca'];
	}
	?>

	<input name="marca" type="text" readonly="true" class="campo_p" value="<?php echo $nome_marca; ?>" />

	<label>Linha:</label>
	<select class="campo_p" name="linha">
		<?php
		$q = "SELECT * FROM tb_linha WHERE idmarca='$idmarca' ";
		$r = mysqli_query($conexao, $q);
		while ($row = mysqli_fetch_array($r)) {
			$id_linha = $row['id'];
			$titulo_linha = $row['titulo'];
			$idmarca_linha = $row['idmarca'];

			if ($idlinha == $id_linha)
				echo "<option selected value='$id_linha'>$titulo_linha</option>";
			else
				echo "<option value='$id_linha'>$titulo_linha</option>";
		}
		?>
	</select>




	<label>Título:</label>
	<input name="titulo" type="text" class="campo_m" value="<?php echo $titulop; ?>" />

	<label>Descrição:</label>
	<textarea name="descricao" class="campo_m" rows="15"><?php echo $descricaop; ?></textarea>

	<label>Anexo:</label>
	<div class="col12" id="box-input-anexo">
		<a id="btn-anexar" class="btn-anexar" onclick="abreFechaModalFiles(1)"><i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp; Anexar Imagem</a>
		<div class="box-file" id="box-file" style="display:none;">
			<i class="fa fa-check" aria-hidden="true"></i>
			Imagem anexada
			(<i id="legenda"></i>)
			<div class="btn-remove" onclick='removerAnexo();'>&#10006;</div>
		</div>
		<!-- input upload -->
		<input type="text" name="id_arquivo" id="id_arquivo" style="display:none" />
	</div>
	<?php
	if (!empty($fotop)) {
		echo "<div id='box-anexo' class='box-anexo' style='display: block;'>";
		echo "<a href='index.php?id=6.2.2&idp=$idproduto&nfile=$fotop&idm=$id_marca' title='Excluir'><img src='imgs/btn-excluir-anexo.jpg' style='position:absolute;cursor:pointer;' /></a>";
		echo "<img src='files/$fotop' width='250' style='border:1px solid #CCC;margin:0 auto;' />";
		echo "</div>";
	}
	?>

	<label>Status:</label>
	<select name="status" class="campo_p">
		<?php
		if ($status > 0) {
			echo "<option selected value='1'>Ativo</option>
				<option value='0'>Inativo</option>";
		} else {
			echo "<option value='1'>Ativo</option>
				<option selected value='0'>Inativo</option>";
		}
		?>
	</select>


	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=6'" class="btn-back" />
		<input type="hidden" value="<?php echo $idproduto; ?>" name="idp" />
		<input type="hidden" value="<?php echo $idmarca; ?>" name="idmarca" />
	</div>

</form>

<?php
if (!empty($fotop)) {
	echo "<script>
		document.getElementById('box-input-anexo').remove();
		</script>";
}
?>

<!--importa modulo Files -->
<?php include_once "modulos/files/modal-files.php"; ?>
<script src="modulos/files/js/files.js"></script>
<link rel="stylesheet" href="modulos/files/css/files.css" />
<!--importa modulo Files -->

<?php mysqli_close($conexao); ?>