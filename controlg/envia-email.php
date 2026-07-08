<?php

$ip = $_SERVER["REMOTE_ADDR"];

if (empty($emailUsuario)) {
	echo "<script>window.location.href='recuperar-senha.php?aut=false'</script>";
	exit();
}

mb_internal_encoding("UTF-8");
$subject = "NEXT SOLUÇÕES EM SAÚDE | NOVA SENHA";
$to = $emailUsuario; // email do usuário vem do resetar-senha
//$to = "web@solucoesnext.com.br";

$message = "
		<table width='800' border='0' style='padding:10px;margin:8px;border-collapse:0;'>
			<tr>
				<td>
					<img height='30' src='https://dev.solucoesnext.com.br/public/imgs/logo.png'/>
					<img height='30' src='https://dev.solucoesnext.com.br/controlg/imgs/logo-controlg' alt='controlG' />
					<br /><br />
				</td>
			</tr>
			<tr>
				<td style='height:30px;color:#FFF;background:#60bdb2;font:bold 18px calibri,verdana'>&nbsp;&nbsp;RECUPERAR SENHA</td>
			</tr>
			<tr>
				<td style='height:40px;color:#555;font:normal 18px calibri,verdana'>
          <br />
          Olá <strong>$nomeUsuario</strong>,  sua nova senha de acesso ao <strong>Painel da Next</strong> está logo abaixo:
          (É recomendado que no seu próximo acesso você altere a sua senha.)
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

// To send HTML mail, the Content-type header must be set
$headers = [];
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=UTF-8';
$headers[] = 'To:' . $to;
$headers[] = 'From:' . $to;
$headers[] = 'Reply-To:' . 'noreply@solucoesnext.com.br';

$envio = mail($to, $subject, $message, implode("\r\n", $headers));

if ($envio) {
	echo "<script>alert('Email enviado com sucesso!')</script>";
	echo "<script>window.location.href='contato'</script>";
} else {
	echo "A mensagem não pode ser enviada";
}
