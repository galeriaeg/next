<?php 
	include "session.php";
	
	$idMarca = $_GET['idMarca'];
	
	if(empty($idMarca)){
		echo "<script>window.location = 'index.php';</script>";
		exit();
	}
	else{
		
		include "../conecta.php"; 
		
		$sql = "SELECT * FROM marca WHERE id='$idMarca'";
		$cons = $conexao->query($sql)or die($conexao->error);
		while($row = $cons->fetch_array()){
			$id = $row['id'];
			$nome	= $row['nome'];
			$logomarca	=	$row['logomarca'];
			$status	=	$row['status'];
			$site	=	$row['site'];
		}
		
		if(empty($logomarca))
		$fleg=0;
		else
		$fleg=1;
	}
?>

<h3><?php echo $titulo; ?></h3>

<script type="text/javascript" src="js/global.js"></script>

<form action="index.php?id=7.2.1" enctype="multipart/form-data" method="post" name="formc" name="formConteudo" onSubmit="return conteudo(this)"> 
	
	<legend><h3><?php echo $tit; ?></h3></legend>
	
	<label>Título:</label>
	<input name="nome" type="text" class="campo_p" value="<?php echo $nome; ?>" />
	
	<label>Site:</label>
	<input name="site" type="text" class="campo_p" value="<?php echo $site; ?>" />	
	
	<label>Anexo:</label>
	<?php
		if($fleg<1){
			echo"
			<input name='arquivo' type='file' accept='image/*' class='campo_p' />";
			}else{	
			echo "
			<a href='index.php?id=7.2.2&file=$logomarca&idMarca=$idMarca' title='Excluir'><img src='imgs/btexclui.png' border='0' style='position:absolute;'  /></a>
			<img src='files/$logomarca' width='120' style='border:1px solid #ccc;margin-bottom:15px;' />";
		}
	?>
	
	
	<label>Status:</label>
	<select name="status" class="campo_p">
		<?php
			if($status<1){
				echo "
				<option selected value='0'>Inativo</option>
				<option value='1'>Ativo</option>";
			}
			else{
				echo "
				<option value='0'>Inativo</option>
				<option selected value='1'>Ativo</option>";
			}
		?>
	</select>
	
	
	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit"/>
		<input type="button" value="Voltar" onClick="location.href='index.php?id=7'"  class="btn-back"/>
		<input type="hidden" value="<?php echo $idMarca; ?>" name="idMarca"  />	
	</div>		
	
</form>

