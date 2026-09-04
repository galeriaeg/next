<?php
require_once "session.php";
include_once "routes.php";
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

	<!-- Elemento onde o parâmetro será exibido -->
	<div id="modal" class="modal-cron" style="display: none;">
		<span id="resultado" style="display: none;">
			Aguardando dados do iframe...
		</span>
		<div style="margin-top:10px;color:#0F71F0;cursor:pointer;" onclick="fechaModal()">Fechar</div>
	</div>

	<iframe
		src="cron/cron.php"
		width="218"
		height="2"
		style="border: none; overflow: hidden;"
		scrolling="no">
	</iframe>


	<script>
		window.addEventListener('message', (event) => {
			const elResultado = document.getElementById('resultado');
			const elResultadoM = document.getElementById('modal');

			// Valida se o objeto e a mensagem existem e não estão vazios
			if (event.data && event.data.mensagem && event.data.mensagem.trim() !== "") {
				elResultado.innerHTML = event.data.mensagem;
				elResultado.style.display = 'block'; // Exibe a div apenas se houver conteúdo
				elResultadoM.style.display = 'block';
			} else {
				elResultado.innerHTML = '';
				elResultado.style.display = 'none'; // Esconde se for nulo, indefinido ou vazio
				elResultadoM.style.display = 'block';
			}
		});


		function fechaModal() {
			document.getElementById('modal').style.display = 'none';
		}
	</script>



	<div id="box-conteudo">

		<section id="topo">
			<a href="index.php"><img src="imgs/logo-controlg.png" class='logo' alt="Logo" border="0" /></a>

			<div id="userLogout">
				<a href="#" style="float:right;color:#555; text-decoration:none;" onmouseover="aparece()" onmouseout="desaparece()">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<strong><?php echo  $_SESSION['nomeUsuarioLogado']; ?><div class="setaUser"></div></strong>
				</a>

				<div id="dropDownUsuario" style="visibility:hidden;" class="cxMenuUser" onmouseover="aparece()" onmouseout="desaparece()">
					<a href="logout.php" class="menuuser">
						<div style="margin-top:28px;">Sair</div>
					</a>
					<a href="index.php?id=2.2&u=<?php echo  $_SESSION['idUsuarioLogado']; ?>" class="menuuser">
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