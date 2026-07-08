<?php @$aut = $_GET['aut']; ?>
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
	<form action="reset.php" method="post" name="formLogin" onSubmit="return logon(this)">
		<div class="box-center">
			<div id="topo">
				<img src="imgs/logo-controlg.png" alt="logomarca" class="logomarca" border="0" />
			</div>
			<label>Recuperar Senha</label>
			<input name="email" type="email" required class="campo" placeholder="E-mail" />
			<input type="submit" name="btnLogin" value="ENVIAR" class="botao" />
			<div style="text-align:center"><a href="index.php" class="m-t" target="_top">Fazer Login</a></div>

			<?php
			if ($aut == "false") {
				echo "<div class='box-erro'>&#10006; Dados incorretos</div>";
			}
			?>

			<footer>
				2026 &copy; CtrlG CMS<br />
				<a href="http://www.galeriadesigneweb.com.br/" target="_blank">Galeria Design & Web</a>
			</footer>

		</div>
	</form>

	<script src="js/login.js"></script>
</body>

</html>