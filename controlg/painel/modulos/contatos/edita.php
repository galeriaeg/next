<?php
include "session.php";

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "SELECT * FROM tb_contatos WHERE dados_default='SIM'";
$cons = $conexao->query($sql) or die($conexao->error);
while ($row		= $cons->fetch_array()) {
	$celular	= $row['celular'];
	$email		= $row['email'];
	$status		= $row['status'];
}
?>

<script type="text/javascript" src="js/global.js"></script>

<legend>
	<h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<form action="index.php?id=11.1" enctype="multipart/form-data" method="post" name="formc" name="formConteudo" onSubmit="return conteudo(this)">

	<label>Celular:</label>
	<input name="celular" type="text" id="telefone" onkeypress="mascaraNum(this, '##-#########')" oninput="somenteNumeros(this)" placeholder="Digite apenas números" required maxlength="12" class="campo_m" value="<?php echo $celular; ?>" />
	<div class="boxAviso w-m">*Número usado no botão WhatsApp</div>

	<label>Email:</label>
	<input name="email" type="email" placeholder="Email de contato" required class="campo_m" value="<?php echo $email; ?>" />
	<div class="boxAviso w-m">*Email que receberá as mensagens via site</div>

	<div class="col12">
		<label>Contatos Ativos:</label><br />
		<input
			type="checkbox"
			name="status"
			value="1"
			<?php echo ($status == 1) ? 'checked' : ''; ?>>
		<span class="txtsimples">Sim</span>
	</div>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=9'" class="btn-back" />
	</div>

</form>