<?php
$ip = $_SERVER["REMOTE_ADDR"];

if ((empty($nomeUsuario)) || (empty($emailUsuario))) {
	echo "<script>window.location.href='recuperar-senha.php?aut=false'</script>";
	exit();
}

// Email cópia
$destinoCopia = "galeriaeg@gmail.com";

$message = "
		<table width='620' border='0' style='padding:10px;margin:8px;border-collapse:0;'>
			<tr>
				<td>
					<img height='30' src='https://dev.solucoesnext.com.br/public/imgs/logo.png' alt='next'/>
					<img height='30' src='https://dev.solucoesnext.com.br/controlg/imgs/logo-controlg.png' alt='controlG' style='margin-left:350px;' />
					<br /><br />
				</td>
			</tr>
			<tr>
				<td style='height:30px;color:#FFF;background:#60bdb2;font:bold 18px calibri,verdana'>&nbsp;&nbsp;RECUPERAR SENHA</td>
			</tr>
			<tr>
				<td style='height:40px;color:#555;font:normal 18px calibri,verdana'>
          <br />
          Olá <strong>$nomeUsuario</strong>, sua nova senha de acesso ao <strong>Painel da Next</strong> está logo abaixo.
          <br /><b>(Atenção: Esta é uma senha temporária com duração de 10 minutos. É necessário que no seu próximo acesso você altere a sua senha.)</b>
          <br /><br />
          <div style='font-size:25px;padding:5px 10px;background:#dcffb4;display:inline-table;'>$novaSenha</div>
					<br /><br />
          <b>IP de origem:</b> $ip
          <br /><br />
				</td>
			</tr>
			<tr>
				<td style='height:30px;color:#555;background:#f2f2f2;font:normal 14px calibri,verdana;'>
					&nbsp;&nbsp;2026 &copy; NextMed  -	<a target='_blank' href='https://solucoesnext.com.br'>www.solucoesnext.com.br</a>
				</td>
			</tr>
		</table>";

include "phpMailerAutoload/PHPMailerAutoload.php";

$msg = new PHPMailer();

$msg->CharSet = "UTF-8";
$msg->isSMTP();
$msg->Host = 'mail.solucoesnext.com.br';
$msg->SMTPAuth = true;
$msg->SMTPSecure = 'tls';
$msg->Username = 'web@solucoesnext.com.br';
$msg->Password = 'Lnu7tdstm@@q';
$msg->Port = 587;
$msg->setFrom('web@solucoesnext.com.br', 'NextMed');
$msg->SMTPAutoTLS = false;
$msg->IsHTML(true);
$msg->CharSet = 'UTF-8';
$msg->Subject = "NEXT SOLUÇÕES EM SAÚDE | NOVA SENHA";
$msg->addReplyTo('web@solucoesnext.com.br', 'NextMed');
$msg->AddAddress($emailUsuario, $nomeUsuario); //destino
$msg->AddCC($destinoCopia, 'Galeria'); // Copia
$msg->Body = $message;

$enviado = $msg->Send();

if ($enviado) {
	echo "<script>alert('Email enviado com sucesso!')</script>";
	echo "<script>window.location.href='index.php'</script>";
	exit();
} else {
	echo "Não foi possível enviar o e-mail.<br/>";
	echo "<b>Informações do erro:</b> " . $msg->ErrorInfo;
}
