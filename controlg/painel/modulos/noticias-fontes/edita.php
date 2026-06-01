<?php 
	include "session.php";
	
	$idFonte = $_GET['idFonte'];
	
	
	if($idFonte==""){
		session_start();
		session_unset();
		session_destroy();
		unset($_SESSION['nome']);
		unset($_SESSION['login']);	
		echo "<script>window.location = 'index.php'</script>";
		exit();
	}
	
	
	include ("../conecta.php"); 
	
	$sql = "SELECT * FROM fontes WHERE id='$idFonte'";
	$cons = $conexao->query($sql)or die($conexao->error);
	while($row = $cons->fetch_array()){
		$id = $row['id'];
		$titulo	= $row['titulo'];
		$logomarca	=	$row['logomarca'];
	}
	
	if(empty($logomarca))
	$fleg=0;
	else
	$fleg=1;
	
?>

<script type="text/javascript" src="js/global.js"></script>

<form action="index.php?id=4.2.1" enctype="multipart/form-data" method="post" name="formc" name="formConteudo" onSubmit="return conteudo(this)"> 
	
	<legend><h3><?php echo $tit; ?></h3></legend>
	
	<label>Título:</label>
	<input name="titulo" type="text" class="campo_m" value="<?php echo $titulo; ?>" />
	
	<?php
		if($fleg<1){
			echo"
			<span class='txt'>Anexo:</span>
			<input name='arquivo' type='file' class='campo_m' />";
		}else{	
			echo "
			<a href='index.php?id=4.4&file=$logomarca&idFonte=$idFonte' title='Excluir'><img src='imgs/btexclui.png' border='0' style='position:absolute;margin-top:15px;'  /></a>
			<img src='files/$logomarca' width='120' style='border:1px solid #888;margin-top:30px;' />";
		}
	?>
	
	
	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit"/>
		<input type="button" value="Voltar" onClick="location.href='index.php?id=4'"  class="btn-back"/>
		<input type="hidden" value="<?php echo $idFonte; ?>" name="idFonte"  />	
	</div>
	
	
</form>

