<?php
include "session.php";
?>


<script type="text/javascript" src="js/global.js"></script>


<form action="index.php?id=2.1.1" method="post" name="formUser" onSubmit="return caduser(this)">

	<legend>
		<h3><?php echo $titulo; ?></h3>
	</legend>

	<label>Nome:</label>
	<input name="nome" type="text" class="campo_m" size="45" />

	<label>Email:</label>
	<input name="email" type="text" class="campo_m" />

	<label>Login:</label>
	<input name="login" type="text" class="campo_p" />

	<label>Senha:</label>
	<input name="senha" type="text" class="campo_p" />
	<div class="boxAviso">*A senha deve ter no m&iacute;nimo 8 caracteres</div>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=2'" class="btn-back" />
	</div>

</form>