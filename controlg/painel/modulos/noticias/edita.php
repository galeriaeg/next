<?php
include "session.php";

$idNoticia	= $_GET['not'];

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "SELECT * FROM tb_noticias WHERE id='$idNoticia' ";
$cons = $conexao->query($sql) or die($conexao->error);
$resultado = mysqli_query($conexao, $sql);
$qtde =  mysqli_num_rows($resultado);
while ($row = $cons->fetch_array()) {
	$idNoticia	= 	$row['id'];
	$tituloNoticia	=	$row['titulo'];
	$fotoNoticia	=	$row['foto'];
	$descricao	=	$row['descricao'];
	$data	=	$row['data'];
	$status	=	$row['status'];
}


if (empty($fotoNoticia)) {
	//echo "nao tem foto";
	$ativaInput = "";
	$displayImagem = "none";
} else {
	//echo "tem foto";
	$ativaInput = "disabled";
	$displayImagem = "block";
}

?>

<script type="text/javascript" src="js/global.js"></script>

<form action="index.php?id=3.2.1" method="post" name="formNoticias" onSubmit="return noticias(this)">

	<legend>
		<h3><?php echo $titulo; ?></h3>
	</legend>

	<input name="data" type="text" readonly="readonly" class="campo_p" value="<?php echo $data ?>" />

	<label>Título:</label>
	<input name="titulo" value="<?php echo $tituloNoticia; ?>" type="text" maxlength="100" class="campo_m" />

	<label>Texto:</label>
	<textarea id="txtDefaultHtmlArea" name="texto" class="campo_m" maxlength="120" rows="5"><?php echo $descricao; ?></textarea>

	<label>Anexo:</label>
	<input type="file" name="anexo" class="campo_m" <?php echo $ativaInput; ?> onchange="mostraAnexo(this)" />
	<span class="box-anexo" style="display:<?php echo $displayImagem; ?>">
		<a href="index.php?id=3.4&idn=<?php echo $idNoticia; ?>"><img src="imgs/btexclui.png" title="Excluir anexo" alt="anexo" style="position:absolute;cursor:pointer;" /></a>
		<img src="files/<?php echo $fotoNoticia; ?>" alt="anexo" class="anexo-noticia" />
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
		<input type="button" value="Voltar" onClick="location.href='index.php?id=3'" class="btn-back" />
		<input type="hidden" value="<?php echo $idNoticia; ?>" name="idNoticia" class="input" />
	</div>

</form>

<?php mysqli_close($conexao); ?>


<script>
	function mostraAnexo(input) {
		const img = document.getElementById('view');
		img.src = URL.createObjectURL(input.files[0]);
		img.style.display = 'block';
	}

	function fechaAnexo(input) {
		alert(input);
		const img = document.getElementById('view');
		img.src = "";
		img.style.display = 'none';
	}
</script>