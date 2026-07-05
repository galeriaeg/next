<?php

$nome = preg_replace("/[^a-zA-ZÀ-ÿ\s]/u", "", $_POST['nome'] ?? '');
$nome = utf8_decode($nome);
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$email = strtolower($email);
$telefone = preg_replace("/[^0-9()+\-\s]/", "", $_POST['telefone'] ?? '');
$cidade   = preg_replace("/[^a-zA-ZÀ-ÿ\s]/u", "", $_POST['cidade'] ?? '');
$estado   = preg_replace("/[^a-zA-Z]/", "", $_POST['estado'] ?? '');
$texto    = filter_var($_POST['mensagem'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
$texto = utf8_decode($texto);

$randCaptcha = $_POST['randCaptcha'];
$meuCaptcha = $_POST['meuCaptcha'];
$ip = $_SERVER["REMOTE_ADDR"];

// evitar link no corpo da mensagem  
if (preg_match("/(@|www|https?)/i", $texto)) {
	echo "Erro: Links ou e-mails não são permitidos na mensagem.";
	exit;
}

// valida captcha
if ($randCaptcha <> $meuCaptcha) {
	echo "<script>alert('Erro! Código verificador incoreto.')</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
$sql = "SELECT * FROM tb_contatos WHERE dados_default ='SIM' AND status = 1 LIMIT 1 ";
$res = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res)) {
	$email = $row['email'];
	$celular = $row['celular'];
}

if ($qtd > 0) {
	$to  = $email; // destino
} else {
	echo "<p class='p' style='color:red'>&#10006; Erro fatal: Destino não definido.</p>";
}


if (
	(empty($nome)) ||
	(empty($email)) ||
	(empty($telefone)) ||
	(empty($cidade)) ||
	(empty($estado)) ||
	(empty($texto))
) {
	echo "<script>window.location='contato?send=false'</script>";
	exit();
}


// $to  = 'web@solucoesnext.com.br';
$subject = 'NEXT SOLUÇÕES EM SAÚDE | CONTATO';
$subject = utf8_decode($subject);

$message = "
		<table width='800' border='0' style='padding:10px;margin:8px;border-collapse:0;'>
			<tr>
				<td><img width='150' src='https://dev.solucoesnext.com.br/public/imgs/logo.png'/><br /><br /></td>
			</tr>
			<tr>
				<td style='height:30px;color:#FFF;background:#60bdb2;font:bold 18px calibri,verdana'>&nbsp;&nbsp;CONTATO VIA SITE</td>
			</tr>
			<tr>
				<td style='height:40px;color:#555;font:normal 18px calibri,verdana'>
					<br />
					<b>Nome: </b> $nome<br />
					<b>E-mail: </b> $email<br />
					<b>Mensagem: </b><br />$texto
					<br /><br />
                    <b>Origem:</b> $ip
                    <br /><br />
				</td>
			</tr>
			<tr>
				<td style='height:30px;color:#555;background:#f2f2f2;font:normal 14px calibri,verdana;'>
					&nbsp;&nbsp;2026 &copy; NextMed  -	<a target='_blank' href='https://solucoesnext.com.br'>www.solucoesnext.com.br</a>
				</td>
			</tr>
		</table>";


// To send HTML mail, the Content-type header must be set
$headers = [];
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'To:' . $to;
$headers[] = 'From:' . $to;
$headers[] = 'Reply-To:' . $email;

$envio = mail($to, $subject, $message, implode("\r\n", $headers));

if ($envio) {
	echo "<script>alert('Email enviado com sucesso!')</script>";
	echo "<script>window.location='contato'</script>";
} else {
	echo "A mensagem não pode ser enviada";
}
