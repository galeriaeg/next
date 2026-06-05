<?php
include "session.php";

$idCont	= $_GET['idCont'];
$tipoCont = $_GET['tipoCont'];
$pagina = $_GET['pagina'];

if (
	(empty($idCont)) ||
	(empty($tipoCont)) ||
	(empty($pagina))
) {
	echo "<script>window.location = 'index.php'</script>";
	exit();
} else {

	include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

	$sql = "SELECT * FROM tb_conteudo WHERE id='$idCont' LIMIT 1";
	$cons = $conexao->query($sql) or die($conexao->error);
	while ($row = $cons->fetch_array()) {
		$id		= 	$row['id'];
		$pagina	=	$row['pagina'];
		$titulo	=	$row['titulo'];
		$texto	=	$row['texto'];
		$mapa	=	$row['plus'];
		$tipo	=	$row['tipo'];
	}
}
?>

<script type="text/javascript" src="js/global.js"></script>

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


<form action="index.php?id=8.2.1" method="post" name="formc" name="formConteudo" onSubmit="return conteudo(this)">

	<legend>
		<h3><?php echo $tit; ?></h3>
	</legend>

	<span class="txt">Tipo: <?php echo $tipo . " - <b>" . $pagina; ?></b></span><br /><br />

	<label>T&iacute;tulo:</label>
	<input name="titulo" type="text" class="campo_m" value="<?php echo $titulo; ?>" />


	<label>Texto:</label>
	<textarea id="textarea-1" name="texto" cols="50" rows="25"><?php echo $texto; ?></textarea>

	<?php
	if ($tipo == 1) {
		echo "<span style='margin-top:15px;display:block'>
			<label>Mapa:</label>
			<textarea name='mapa' class='campo_m' rows='10'>$mapa</textarea>
		</span>";
	}
	?>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=8'" class="btn-back" />
		<input type="hidden" value="<?php echo $idCont; ?>" name="idc" />
		<input type="hidden" value="<?php echo $pagina; ?>" name="pagina" />
	</div>

</form>

<?php mysqli_close($conexao); ?>