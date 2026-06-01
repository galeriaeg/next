<?php
require_once "session.php";
include_once "funcoes.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>ControlG</title>
	<meta charset="utf-8" />
	<meta name="googlebot" content="noindex" />
	<meta name="robots" content="noindex, nofollow" />
	<link rel="stylesheet" href="css/painel.estilos.css" />
	<link rel="shortcut icon" href="imgs/favicon1616.png" />
	<link rel="shortcut icon" href="imgs/favicon3232.png" />
	<script type="text/javascript" src="js/menuUser.js"></script>
	<script type="text/javascript" src="js/exibeEscondeDiv.js"></script>
	<script type="text/javascript" src="js/global.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
	<div id="box-conteudo">

		<section id="topo">
			<a href="index.php"><img src="imgs/logo-controlg.png" class='logo' alt="Logo" border="0" /></a>

			<div id="userLogout">
				<a href="#" style="float:right;color:#555; text-decoration:none;" onmouseover="aparece()" onmouseout="desaparece()">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<strong><?php echo  $_SESSION['nomeu']; ?><div class="setaUser"></div></strong>
				</a>

				<div id="dropDownUsuario" style="visibility:hidden;" class="cxMenuUser" onmouseover="aparece()" onmouseout="desaparece()">
					<a href="logout.php" class="menuuser">
						<div style="margin-top:28px;">Sair</div>
					</a>
					<a href="index.php?id=2.2&u=<?php echo  $_SESSION['idu']; ?>" class="menuuser">
						<div style="margin-top:0px;">Meus dados</div>
					</a>
				</div>
			</div>
		</section>


		<section id="box-menu">
			<?php include("menu.php"); ?>
			<?php include("i_footer.php"); ?>
		</section>


		<section id="box-modulo">
			<?php cont(); ?>
		</section>

	</div>



</body>

</html>