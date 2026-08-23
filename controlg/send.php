<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Título da Página</title>
</head>

<body>
  <?php
  // Configurações do e-mail
  $para        = $emailLimpo; //'contato@via85.com.br';
  $assunto     = 'Nova senha solicitada com MailHog';
  $mensagem    = '
<html>
<head>
  <title>E-mail de Teste</title>
</head>
<body>
  <h1 style="color: #2b542c;">Senha temporária!</h1>
  <p>Sua senha temporaria é: <h2>' . $novaSenha . '</h2></p>
  <p>Atenção: Voce tem 2 min para fazer login no Painel e auterar a senha, quaso contrario voce perderá aceso para as proximas vezes</p>
  <p>Este e-mail foi enviado usando a função <strong>mail()</strong> do PHP no Windows.</p>
  <p>Recebido em: ' . date('d/m/Y H:i:s') . '</p>
</body>
</html>
';

  // Definindo os cabeçalhos (Headers) para aceitar HTML e definir remetente
  $headers   = array();
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=utf-8';
  $headers[] = 'From: Meu Projeto Local <meusite@localhost.com>';
  $headers[] = 'Reply-To: meusite@localhost.com';

  // Dispara o e-mail usando a função nativa
  if (mail($para, $assunto, $mensagem, implode("\r\n", $headers))) {
    echo "<h2>E-mail disparado com sucesso!</h2>";
    echo "<p>Acesse <a href='http://localhost:8025' target='_blank'>http://localhost:8025</a> para visualizar na caixa do MailHog.</p>";
    echo "<a href='index.php'>voltar</a>";
  } else {
    echo "<h2>Falha ao enviar o e-mail.</h2>";
    echo "<a href='index.php'>voltar</a>";
    echo "<p>Verifique se alterou o php.ini e se o MailHog e o Apache foram iniciados.</p>";
  }
  ?>
  <script>
    setTimeout(() => {
      //window.location.href = 'cron/cron-nova-senha.php?email=<?php echo urlencode($emailLimpo); ?>';
      console.log('email enviado');
    }, 3000);
    // Redireciona a própria aba atual sem ser bloqueado
    //window.location.href = 'cron/cron-nova-senha.php?email=<?php /* echo urlencode($emailLimpo); */ ?>';
  </script>
</body>

</html>