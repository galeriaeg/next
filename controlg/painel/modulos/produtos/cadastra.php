<?php
include "session.php";

$idmarca = $_GET['m'];
?>

<script type="text/javascript" src="js/global.js"></script>

<form action="index.php?id=6.1.1" enctype="multipart/form-data" method="POST" name="formFonte" onSubmit="return fonte(this)">

	<legend>
		<h3><?php echo $titulo; ?></h3>
	</legend>

	<label>Marca:</label>
	<select class="campo_p" name="marca" onChange="MM_jumpMenu('parent',this,1)">
		<option></option>
		<?php
		include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

		$sql = "SELECT * FROM tb_marca ";
		$res = mysqli_query($conexao, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$id_marca = $row['id'];
			$nome_marca = $row['nome'];
			$logomarca_marca = $row['logomarca'];

			if ($idmarca == $id_marca)
				echo "<option selected value='index.php?id=6.1&m=$id_marca'>$nome_marca</option>";
			else
				echo "<option value='index.php?id=6.1&m=$id_marca'>$nome_marca</option>";
		}
		?>
	</select>



	<label>Linha:</label>
	<select class="campo_p" name="linha">
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
	<input name="titulo" type="text" class="campo_m" />

	<label>Descrição:</label>
	<textarea name="descricao" class="campo_m" rows="15" /></textarea>

	<label>Anexo:</label>
	<input name="arquivo" type="file" accept="image/*" class="campo_m" />



	<label>Status:</label>
	<select name="status" class="campo_p">
		<option value="1">Ativo</option>
		<option value="0">Inativo</option>
	</select>


	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=6'" class="btn-back" />
		<input type="hidden" value="<?php echo $idmarca; ?>" name="idMarca" />
	</div>

</form>


<script language="JavaScript">
	function MM_jumpMenu(targ, selObj, restore) {
		eval(targ + ".location='" + selObj.options[selObj.selectedIndex].value + "'");
		if (restore) selObj.selectedIndex = 0;
	}
</script>