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
		$fotop	=	$row['foto'];
		$idmarcap	=	$row['idmarca'];
		$idlinhap	=	$row['idlinha'];
		$status	=	$row['status'];
	}
}
?>



<script type="text/javascript" src="js/global.js"></script>

<form action="index.php?id=6.2.1" enctype="multipart/form-data" method="POST" name="formFonte" onSubmit="return fonte(this)">

	<legend>
		<h3><?php echo $titulo; ?></h3>
	</legend>

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
	<textarea name="descricao" class="campo_m" rows="15" /><?php echo $descricaop; ?></textarea>

	<label>Anexo:</label>
	<?php
	if (empty($fotop)) {
		echo "<input name='arquivo' type='file' class='campo_m' accept='image/*'  />";
	} else {
		echo "</br><a href='index.php?id=6.2.2&idp=$idproduto&nfile=$fotop&idm=$id_marca' title='Excluir'><img src='imgs/btexclui.png' class='btDelAnexo' /></a>";
		echo "<img src='files/$fotop' width='250' style='border:1px solid #CCC' /></br>";
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

<?php mysqli_close($conexao); ?>