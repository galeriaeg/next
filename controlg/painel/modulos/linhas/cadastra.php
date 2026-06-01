<?php
	include ("session.php");
?>

<script type="text/javascript" src="js/global.js"></script>

<form action="painel.php?id=4.1.1" enctype="multipart/form-data" method="POST" name="formFonte" onSubmit="return fonte(this)"> 
	<legend><h3><?php echo $titulo; ?></h3></legend>
	
	<span class="txt">Título:</span>
	<input name="titulo" type="text" class="inputQuebra"  style="width:545px;" />
	
	<span class="txt">Anexo:</span>
	<input name="arquivo" type="file" class="inputQuebra"  style="width:545px;background:#dfe7ea" />
	
	<br />

	<input type="submit" value="Cadastrar" class="input"/>
	<input type="button" value="Voltar" onClick="history.go(-1)"  class="input"/>
	
</form>
