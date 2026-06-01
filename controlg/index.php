<?php @$aut = $_GET['aut']; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>ControlG</title>
	<meta name="googlebot" content="noindex" />
	<meta name="robots" content="noindex, nofollow" />
	<meta charset="utf-8" />
	<script type="text/javaScript" src="js/global.js"></script>
	<script type="text/javaScript" src="js/login.js"></script>
	<link rel="stylesheet" href="css/estilos.css" />
	<link rel="shortcut icon" href="imgs/favicon1616.png" />
	<link rel="shortcut icon" href="imgs/favicon3232.png" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>

	<form action="aut.php" method="post" name="form" onSubmit="return logon(this)">
		<div class="box-center">
			<div id="topo">
				<img src="imgs/logo-controlg.png" alt="logomarca" class="logomarca" border="0" />
			</div>
			<input name="login" type="text" class="campo" placeholder="Login" /><br />
			<input name="senha" type="password" class="campo" maxlength="12" placeholder="Senha" /><br />
			<input type="submit" name="btnLogin" value="ENTRAR" class="botao" />

			<?php
			if ($aut == "erro") {
				echo "<div class='box-erro'>&#10006; Dados incorretos!</div>";
			}
			?>

			<section class="footer">
				BS IMAGEM<br />
				2018 &copy; CtrlG - Sistema de Gerenciamento de Conteúdo <br />
				Desenvolvido por <a href="http://www.galeriadesigneweb.com.br/" style="color:#3e74ff;" target="_blank">Galeria Design & Web</a>
			</section>

		</div>
	</form>


</body>

</html>