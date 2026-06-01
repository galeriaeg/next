<?php
	include "session.php";
?>

<script type="text/javascript" src="js/global.js"></script>

<form action="index.php?id=4.1.1" enctype="multipart/form-data" method="POST" name="formFonte" onSubmit="return fonte(this)"> 
	
	<legend><h3><?php echo $titulo; ?></h3></legend>
	
	<label>Título:</label>
	<input name="titulo" type="text" class="campo_m" />
	
	<label>Anexo:</label>
	<input name="arquivo" type="file" class="campo_m"  accept="image/*" />
	<div class="boxAviso">*Somente jpg, gif ou png - tamanho padrão 120 x 120px</div>


	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit"/>
		<input type="button" value="Voltar" onClick="location.href='index.php?id=4'"  class="btn-back"/>
	</div>

	
</form>
