<?php
require "session.php";

$idUserAtual = $_GET['u'];
//require_once "controle.php";

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "SELECT * FROM tb_usuarios WHERE id='$idUserAtual'";
$cons = $conexao->query($sql) or die($conexao->error);
while ($row = $cons->fetch_array()) {
	$id = $row['id'];
	$nome = $row['nome'];
	$email = $row['email'];
	$login = $row['login'];
	$tipo = $row['tipo'];
	$senha = $row['senha'];
}
?>

<form action="index.php?id=2.2.1" method="post" onSubmit="return caduser(this)" name="formUser">

	<legend>
		<h3><?php echo $titulo; ?></h3>
	</legend>

	<?php
	if ($tipo == 1) {
		echo "<img src='imgs/icon-user-master.png' alt='icone master' /><br />";
	}
	?>

	<label>Nome:</label>
	<input name="nome" type="text" class="campo_m" value="<?php echo $nome; ?>" size="45" />

	<label>Email:</label>
	<input name="email" type="text" class="campo_m" value="<?php echo $email; ?>" size="45" />

	<label>Login:</label>
	<input name="login" type="text" class="campo_p" value="<?php echo $login; ?>" size="45" />

	<p style="margin-top: 25px;">
		<a href="#" class="txtmenu" onclick="javascript: altera_display('div01');">
			<i class="fa fa-key" aria-hidden="true"></i> Redefinir senha
		</a>
	</p>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=2'" class="btn-back" />
		<input type="hidden" value="<?php echo $idUserAtual; ?>" name="u" />
	</div>
</form>


<section id='div01' style="display:none;" class="box-center">
	<img src="imgs/btn-fechar.png" onclick="javascript: altera_display('div01');" class="btn-fecha-pop" />
	<label>Redefinir Senha:</label><br>
	<form action="index.php?id=2.3" method="post" onsubmit="return checa_pass(this)">
		<div class="col12">
			<input name="senha" id="senha" type="password" class="campo_m" style="float:left;padding:7px;width:253px;padding-left:38px;margin-bottom:8px;background:#fff;" />
			<img src="imgs/icon-senha-off.png" id="icon" alt="0" onclick="mostraEsconde(alt);" class="icon-senha" />
			<div class="boxAviso">*A senha deve ter no m&iacute;nimo 8 caracteres</div>
			<input type="submit" value="Salvar" class="btn-submit" />
		</div>
		<div class="col12">
			<input type="hidden" value="<?php echo $idUserAtual; ?>" name="u" />
		</div>
	</form>
</section>


<script>
	function checa_pass(email) {

		if (email.senha.value == "") {
			alert("Informe uma nova senha!");
			email.senha.focus();
			return (false);
		}
		if (email.senha.value.length < 8) {
			alert("Erro! Sua senha deve ter no mínimo 8 caracteres!");
			email.senha.focus();
			document.getElementById("senha").value = '';
			return (false);
		}
	}


	function mostraEsconde(el) {
		// Pegamos o campo da senha
		const campoSenha = document.getElementById("senha");
		const icon = document.getElementById("icon");
		// Verificamos o atributo 'data-el' do elemento que foi clicado
		if (el === '0') {
			icon.src = 'imgs/icon-senha-on.png';
			icon.alt = '1';
			campoSenha.type = 'text';
		} else {
			icon.src = 'imgs/icon-senha-off.png';
			icon.alt = '0';
			campoSenha.type = 'password';
		}
	}
</script>