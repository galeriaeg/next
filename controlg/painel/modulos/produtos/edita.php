<?php
include "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$idproduto = $_GET['idp'];
$idmarca_get = $_GET['m'];
$idlinha_get = $_GET['l'];

if (empty($idproduto)) {
	echo "<script>window.location = 'index.php'</script>";
	exit();
} else {

	// Pega dados do produto
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

<!-- CSS MODULO FILES -->
<link rel="stylesheet" href="modulos/files/css/files.css" />

<script type="text/javascript" src="js/global.js"></script>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<span class="txt"><?php echo "ID:" . $idproduto; ?></span><br /><br />

<form action="index.php?id=6.2.1" enctype="multipart/form-data" method="POST" name="formFonte" onSubmit="return fonte(this)">

	<label>Marca:</label>
	<select class="campo_p" required name="marca" onChange="MM_jumpMenu('parent',this,1)">
		<option value="" selected disabled>Selecione uma marca...</option>
		<?php
		$sql = "SELECT id,nome FROM tb_marca ";
		$res = mysqli_query($conexao, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$id_marca = $row['id'];
			$nome_marca = $row['nome'];

			if ($idmarca_get > 0) {
				if ($idmarca_get == $id_marca)
					echo "<option selected value='$id_marca'>$nome_marca</option>";
				else
					echo "<option value='$id_marca'>$nome_marca</option>";
			} else {
				if ($idmarcap == $id_marca)
					echo "<option selected value='$id_marca'>$nome_marca</option>";
				else
					echo "<option value='$id_marca'>$nome_marca</option>";
			}
		}
		?>
	</select>

	<label>Linha:</label>
	<select class="campo_p" required name="linha">
		<?php
		if ($idmarca_get > 0) {
			$idmarcap = $idmarca_get;
		}
		$q = "SELECT * FROM tb_linha WHERE idmarca='$idmarcap' ";
		$r = mysqli_query($conexao, $q);
		while ($row = mysqli_fetch_array($r)) {
			$id_linha = $row['id'];
			$titulo_linha = $row['titulo'];
			$idmarca_linha = $row['idmarca'];

			if ($idlinhap == $id_linha)
				echo "<option selected value='$id_linha'>$titulo_linha</option>";
			else
				echo "<option value='$id_linha'>$titulo_linha</option>";
		}
		?>
	</select>


	<label>Título:</label>
	<input name="titulo" type="text" required class="campo_m" value="<?php echo $titulop; ?>" />

	<label>Descrição:</label>
	<span id="btn-br" class="btn-break">Quebrar Linha</span>
	<textarea name="descricao" required class="campo_m" id="texto" rows="15"><?php echo $descricaop; ?></textarea>
	<div class="boxAviso w-m">Aperte a tecla <b>Enter</b> ou use o botão acima para quebrar a linha do texto.</div>

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
		<input type="hidden" name="id_arquivo" id="id_arquivo" />
	</div>
	<?php
	if (!empty($fotop)) {
		echo "<div id='box-anexo' class='box-anexo' style='display: block;'>";
		echo "<a href='index.php?id=6.2.2&idp=$idproduto&nfile=$fotop&idm=$id_marca' title='Remover anexo'><img src='imgs/btn-excluir-anexo.jpg' style='position:absolute;cursor:pointer;' /></a>";
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
	</div>

</form>

<?php
if (!empty($fotop)) {
	echo "<script>
		document.getElementById('box-input-anexo').remove();
		</script>";
}
?>

<script src="js/quebraLinha.js"></script>

<!-- IMPORT MODULO FILES -->
<?php include_once "modulos/files/modal-files.php"; ?>
<script src="modulos/files/js/files.js"></script>

<?php mysqli_close($conexao); ?>

<script language="JavaScript">
	function MM_jumpMenu(targ, selObj, restore) {
		const valorSelecionado = selObj.options[selObj.selectedIndex].value;
		if (!valorSelecionado) return;
		const novaUrl = "index.php?id=6.2&m=" + valorSelecionado + "&idp=<?php echo $idproduto ?>";
		if (targ === 'parent') {
			window.parent.location.href = novaUrl;
		} else {
			window.location.href = novaUrl;
		}
		if (restore) selObj.selectedIndex = 0;
	}
</script>