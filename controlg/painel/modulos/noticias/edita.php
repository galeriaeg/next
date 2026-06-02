<?php
include "session.php";

$idNoticia	= $_GET['not'];

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "SELECT * FROM tb_noticias WHERE id='$idNoticia' LIMIT 1";
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

// $dateObj = DateTime::createFromFormat('d/m/Y', $data);
// $data_formatada = $dateObj ? $dateObj->format('Y-m-d') : '';

$data_formatada = date('Y-m-d', strtotime($data));

?>

<!-- TEXTAREA EDITOR -->
<style type="text/css">
	#textarea-1 {
		width: 60%;
		height: 350px;
		padding: 10px;
		border: 2px solid #ccc;
	}

	.mooeditable-container {
		border: 1px solid #ccc !important;

	}
</style>
<link rel="stylesheet" type="text/css" href="modulos/cheeaun-editor/Assets/MooEditable/MooEditable.css">
<script type="text/javascript" src="modulos/cheeaun-editor/Demos/assets/mootools.js"></script>
<script type="text/javascript" src="modulos/cheeaun-editor/Source/MooEditable/MooEditable.js"></script>
<script type="text/javascript">
	window.addEvent('domready', function() {
		$('textarea-1').mooEditable();

		// Post submit
		$('theForm').addEvent('submit', function(e) {
			alert($('textarea-1').value);
			return true;
		});
	});
</script>
<!-- TEXTAREA EDITOR -->


<script type="text/javascript" src="js/global.js"></script>

<form action="index.php?id=3.2.1" enctype="multipart/form-data" method="post" name="formNoticias" onSubmit="return noticias(this)">

	<legend>
		<h3><?php echo $titulo; ?></h3>
	</legend>

	<input name="data" type="date" class="campo_p" value="<?php echo $data_formatada; ?>" />

	<label>Título:</label>
	<input name="titulo" value="<?php echo $tituloNoticia; ?>" type="text" maxlength="100" class="campo_m" />

	<label>Texto:</label>
	<textarea id="textarea-1" name="texto" class="campo_m" rows="8"><?php echo $descricao; ?></textarea>

	<label>Anexo:</label>
	<input type="file" name="arquivo" class="campo_m" <?php echo $ativaInput; ?> onchange="abreAnexo(this)" />
	<!-- Visualização do anexo na base-->
	<span class="box-anexo" style="display:<?php echo $displayImagem; ?>">
		<a href="index.php?id=3.4&idn=<?php echo $idNoticia; ?>"><img src="imgs/btexclui.png" title="Excluir anexo" alt="anexo" style="position:absolute;cursor:pointer;" /></a>
		<img src="files/<?php echo $fotoNoticia; ?>" alt="anexo" class="anexo-noticia" />
	</span>

	<!-- Visualização do anexo no upload-->
	<span id="box-anexo" class="box-anexo" style="display: none;">
		<img src="imgs/btexclui.png" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
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
		<input type="button" value="Voltar" onClick="location.href='index.php?id=3'" class="btn-back" />
		<input type="hidden" value="<?php echo $idNoticia; ?>" name="idNoticia" class="input" />
	</div>

</form>

<?php mysqli_close($conexao); ?>


<script>
	function abreAnexo(input) {
		const img = document.getElementById('view');
		const anexo = document.getElementById('box-anexo');
		img.src = URL.createObjectURL(input.files[0]);
		img.style.display = 'block';
		anexo.style.display = 'block';
	}

	function fechaAnexo(input) {
		const img = document.getElementById('view');
		const anexo = document.getElementById('box-anexo');
		const inputAnexo = document.getElementById('anexo');
		img.src = "";
		img.style.display = 'none';
		anexo.style.display = 'none';
		inputAnexo.value = "";
	}
</script>