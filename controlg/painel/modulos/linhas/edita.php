<?php 
	include "session.php";
	
	$idLinha = $_GET['idLinha'];
	$idmarca = $_GET['idmarca'];
	
	if( (empty($idLinha)) || (empty($idmarca)) ){
		echo "<script>window.location = 'index.php'</script>";
		exit();
	}
	else{
		
		include "../conecta.php"; 
		
		$sql = "SELECT * FROM linha WHERE id='$idLinha'";
		$cons = $conexao->query($sql)or die($conexao->error);
		while($row = $cons->fetch_array()){
			$idLinha = $row['id'];
			$tituloLinha	= $row['titulo'];
		}
		
	}
?>



<script type="text/javascript" src="js/global.js"></script>

<h3><?php echo $titulo; ?></h3>

<form action="index.php?id=9.2.1" enctype="multipart/form-data" method="post" name="formc" name="formConteudo" onSubmit="return conteudo(this)"> 
	
	<legend><h3><?php echo $tit; ?></h3></legend>
	
	<label>Título:</label>
	<input name="titulo" type="text" class="campo_p" value="<?php echo $tituloLinha; ?>" />
	
	<label>Marca:</label>
	<select  class="campo_p" name="marca" onChange="MM_jumpMenu('parent',this,1)">
		<option disabled selected>Marcas</option>
		<?php
			$sql = "SELECT * FROM marca ";
			$res = mysqli_query($conexao, $sql);
			while ($row = mysqli_fetch_array($res)) { 
				$id_marca = $row['id'];
				$nome_marca = $row['nome'];
				
				if($idmarca==$id_marca)
				echo "<option selected value='$id_marca'>$nome_marca</option>";
				else
				echo "<option value='$id_marca'>$nome_marca</option>";
			}
		?>
	</select>
	
	
	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit"/>
		<input type="button" value="Voltar" onClick="location.href='index.php?id=9'"  class="btn-back"/>
		<input type="hidden" value="<?php echo $idLinha; ?>" name="idLinha"  />	
	</div>			
	
	
</form>