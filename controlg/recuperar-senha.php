<?php @$send = $_GET['send']; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>ControlG</title>
	<meta name="googlebot" content="noindex" />
	<meta name="robots" content="noindex, nofollow" />
	<meta charset="utf-8" />
	<script type="text/javaScript" src="js/login.js"></script>
	<link rel="stylesheet" href="css/estilos.css" />
	<link rel="shortcut icon" href="imgs/favicon1616.png" />
	<link rel="shortcut icon" href="imgs/favicon3232.png" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>
	<form action="resetar-senha.php" method="post" name="formReset" onSubmit="return resetaSenha(this)">
		<div class="box-center">
			<div id="topo">
				<img src="imgs/logo-controlg.png" alt="logomarca" class="logomarca" border="0" />
			</div>
			<label>Recuperar Senha</label>
			<input name="email" type="email" class="campo" placeholder="E-mail" />
			<input type="submit" name="btnLogin" value="ENVIAR" class="botao" />
			<div style="text-align:center"><a href="index.php" class="m-t" target="_top">Fazer Login</a></div>

			<?php
			if ($send == "false") {
				echo "<div class='box-erro'>&#10006; E-mail bloqueado ou não cadastrado.</div>";
			}
			?>

			<footer>2026 &copy; ControlG CMS</footer>

		</div>
	</form>

	<script src="js/login.js"></script>
</body>

</html>