<?php
include "session.php";
$idmarca = $_GET['m'];
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
?>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<form action="index.php?id=6.1.1" enctype="multipart/form-data" method="POST" name="formFonte" onSubmit="return fonte(this)">
	<label>Marca:</label>
	<select class="campo_p" required name="marca" onChange="MM_jumpMenu('parent',this,1)">
		<option value="" selected disabled>Selecione uma marca...</option>
		<?php
		$sql = "SELECT * FROM tb_marca ";
		$res = mysqli_query($conexao, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$id_marca = $row['id'];
			$nome_marca = $row['nome'];
			$logomarca_marca = $row['logomarca'];
			if ($idmarca == $id_marca)
				echo "<option selected value='$id_marca'>$nome_marca</option>";
			else
				echo "<option value='$id_marca'>$nome_marca</option>";
		}
		?>
	</select>

	<label>Linha:</label>
	<select class="campo_p" required name="linha">
		<?php
		$q = "SELECT * FROM tb_linha WHERE idmarca='$idmarca' ";
		$r = mysqli_query($conexao, $q);
		while ($row = mysqli_fetch_array($r)) {
			$id_linha = $row['id'];
			$titulo_linha = $row['titulo'];
			$idmarca_linha = $row['idmarca'];
			echo "<option value='$id_linha'>$titulo_linha</option>";
		}
		?>
	</select>

	<label>Título:</label>
	<input name="titulo" required type="text" class="campo_m" />

	<label>Descrição:</label>
	<textarea name="descricao" required class="campo_m" rows="15"></textarea>

	<label>Anexo:</label>
	<div class="col12">
		<a id="btn-anexar" class="btn-anexar" onclick="abreFechaModalFiles(1)"><i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp; Anexar Imagem</a>
		<div class="box-file" id="box-file" style="display:none;">
			<i class="fa fa-check" aria-hidden="true"></i>
			Imagem anexada (<i id="legenda"></i>)
			<div class="btn-remove" onclick='removerAnexo();'>&#10006;</div>
		</div>
		<input type="hidden" name="id_arquivo" id="id_arquivo" />
	</div>

	<div class="col12">
		<label>Status:</label>
		<select required name="status" class="campo_p">
			<option value="1">Ativo</option>
			<option value="0">Inativo</option>
		</select>
	</div>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=6'" class="btn-back" />
	</div>

</form>


<!--importa modulo Files -->
<script src="modulos/files/js/files.js"></script>
<link rel="stylesheet" href="modulos/files/css/files.css" />
<?php include_once "modulos/files/modal-files.php"; ?>
<!--importa modulo Files -->

<script language="JavaScript">
	function MM_jumpMenu(targ, selObj, restore) {
		const valorSelecionado = selObj.options[selObj.selectedIndex].value;
		if (!valorSelecionado) return;
		const novaUrl = "index.php?id=6.1&m=" + valorSelecionado;
		if (targ === 'parent') {
			window.parent.location.href = novaUrl;
		} else {
			window.location.href = novaUrl;
		}
		if (restore) selObj.selectedIndex = 0;
	}
</script>