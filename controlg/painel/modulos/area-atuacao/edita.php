<?php 
	include "session.php";
	
	$idArea = $_GET['idArea'];
	
	if(empty($idArea)){
		echo "<script>window.location = 'index.php';</script>";
		exit();
	}
	else{
		
		include "../conecta.php"; 
		
		$sql = "SELECT * FROM area_atuacao WHERE id=$idArea";
		$cons = $conexao->query($sql)or die($conexao->error);
		while($row = $cons->fetch_array()){
			$id_area = 	$row['id'];
			$idmarca_area	=	$row['idmarca'];
			$legenda_area	=	$row['legenda'];
			$mapa_area = $row['mapa'];
			$obs_area = $row['obs'];
		}
		
	}
?>

<h3><?php echo $titulo; ?></h3>

<script type="text/javascript" src="js/global.js"></script>

<form action="index.php?id=10.2.1" enctype="multipart/form-data" method="post" name="formc" name="formConteudo" onSubmit="return conteudo(this)"> 
	
	<legend><h3><?php echo $tit; ?></h3></legend>
	
	<label>Marca:</label>
	<?php
		$sql = "SELECT logomarca FROM marca WHERE id = $idmarca_area";
		$cons = $conexao->query($sql)or die($conexao->error);
		while($row = $cons->fetch_array()){
			$logomarca_area = 	$row['logomarca'];
			echo "<img src='files/$logomarca_area' width='85' />";
		}
		?>
	
	
	<label>Legenda:</label>
	<input name="legenda" type="text" class="campo_p" value="<?php echo $legenda_area; ?>" />
	
	<label>Observação:</label>
	<textarea name="obs" rows="5" class="campo_p" ><?php echo $obs_area; ?></textarea>	
	
	<label>Anexo:</label>
	<?php
		if(empty($mapa_area)){
			echo"
			<input name='arquivo' type='file' accept='image/*' class='campo_p' />";
			}else{	
			echo "
			<a href='index.php?id=10.2.2&file=$mapa_area&idArea=$idArea' title='Excluir'><img src='imgs/btexclui.png' border='0' style='position:absolute;'  /></a>
			<img src='files/$mapa_area' width='160' style='border:1px solid #ccc;margin-bottom:15px;' />";
		}
	?>
	
	
	
	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit"/>
		<input type="button" value="Voltar" onClick="location.href='index.php?id=10'"  class="btn-back"/>
		<input type="hidden" value="<?php echo $idArea; ?>" name="idArea"  />	
	</div>		
	
</form>

