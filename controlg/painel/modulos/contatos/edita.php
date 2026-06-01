<?php 
	include "session.php";
	
	$idLinha = $_GET['idLinha'];
	$idmarca = $_GET['idmarca'];
	
	
	include "../conecta.php"; 
	
	$sql = "SELECT celular,email FROM contatos WHERE tipo='default'";
	$cons = $conexao->query($sql)or die($conexao->error);
	while($row		= $cons->fetch_array()){
		$celular	= $row['celular'];
		$email		= $row['email'];
	}
?>



<script type="text/javascript" src="js/global.js"></script>

<h3><?php echo $titulo; ?></h3>

<form action="index.php?id=11.1" enctype="multipart/form-data" method="post" name="formc" name="formConteudo" onSubmit="return conteudo(this)"> 
	
	<legend><h3><?php echo $tit; ?></h3></legend>
	
	<label>Celular:</label>
	<input name="celular" type="text" maxlength="13" class="campo_p" value="<?php echo $celular; ?>" />
	
	<br /><br />
	
	<label>Email:</label>
	<input name="email" type="text" class="campo_p" value="<?php echo $email; ?>" />
	
	<label>Senha:</label>
	<input name="senha" type="text" class="campo_p" value="" />
	
	
	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit"/>
		<input type="button" value="Voltar" onClick="location.href='index.php?id=9'"  class="btn-back"/>
	</div>			
	
	
</form>