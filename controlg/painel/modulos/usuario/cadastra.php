<?php
include "session.php";
?>

<form action="index.php?id=2.1.1" method="post" name="formUser" onSubmit="return validaSenha(this)">

	<legend>
		<h3><?php echo $titulo; ?></h3>
	</legend>

	<label>Nome:</label>
	<input name="nome" required type="text" class="campo_m" size="45" />

	<label>Email:</label>
	<input name="email" required type="email" class="campo_m" />

	<label>Login:</label>
	<input name="login" required type="text" class="campo_m" />

	<label>Senha:</label>
	<input name="senha" id="senha" required type="password" style="padding-left:40px" class="campo_p" />
	<img src="imgs/icon-senha-off.png" onclick="mostraEsconde(this);" class="iconeSenha" alt="senhaOff" id="iconpass" />
	<div class="boxAviso" style="margin-top:15px;">*A senha deve ter no m&iacute;nimo 8 caracteres</div>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=2'" class="btn-back" />
	</div>

</form>

<script type="text/javascript" src="js/global.js"></script>