<?php include "session.php"; ?>

<script type="text/javascript" src="js/global.js"></script>

<form action="index.php?id=7.1.1" enctype="multipart/form-data" method="POST" name="formFonte" onSubmit="return fonte(this)"> 
	
	<legend><h3><?php echo $titulo; ?></h3></legend>
	
	<label>Título:</label>
	<input name="titulo" type="text" class="campo_p"  />
	
	<label>Site:</label>
	<input name="site" type="text" class="campo_p" value="" />	
	
	<label>Anexo:</label>
	<input name="arquivo" type="file" class="campo_p"  />
	
	
	<label>Status:</label>
	<select name="status" class="campo_p">
		<option value="0">Inativo</option>
		<option value="1">Ativo</option>
	</select>	
	
	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit"/>
		<input type="button" value="Voltar" onClick="location.href='index.php?id=7'"  class="btn-back"/>
	</div>
	
</form>
