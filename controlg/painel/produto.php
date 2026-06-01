<?php
	//LGPD
	session_cache_expire();
	
	if (session_id() == ""){
		session_start();
	}
?>
<?php
	$idp = $_GET['p'];
	$idMarca = $_GET['m'];
	$idLinha = $_GET['l'];
	
	include("controlg/conecta.php");	
	$path = "controlg/painel/files/";
	
	$sql = "SELECT * FROM produto WHERE id='$idp' AND status ='1' ";
	$res = mysqli_query($conexao, $sql);
	while ($row = mysqli_fetch_array($res)) { 
		$id = $row['id'];
		$titulo = $row['titulo'];
		$descricao = $row['descricao'];
		$foto = $row['foto'];
		$idmarca = $row['idmarca'];
		$idlinha = $row['idlinha'];
		$status = $row['status'];
		
		if(!empty($foto))
		$imgProduto = $path.$foto;
		else
		$imgProduto = "controlg/painel/imgs/sem_produto.jpg";
	}
	
	$qry = "SELECT nome,logomarca FROM marca WHERE id = '$idMarca'";
	$r = mysqli_query($conexao, $qry);
	while ($row = mysqli_fetch_array($r)) { 
		$nomeMarca = $row['nome'];
		$logomarca = $row['logomarca'];
	}
		
	$qr = "SELECT titulo FROM linha WHERE id = '$idLinha'";
	$re = mysqli_query($conexao, $qr);
	while ($row = mysqli_fetch_array($re)) { 
		$tituloLinha = $row['titulo'];
	}
	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>BS IMAGEM</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<link href="css/desk.css" rel="stylesheet"/>
		<link href="css/mob.css" rel="stylesheet"/>
		<link href="css/tab.css" rel="stylesheet"/>
		<!-- favicon -->
		<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
		<link rel="manifest" href="favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<!-- favicon -->	
		<!-- link para redes sociais -->
		<meta property="og:locale" content="pt_BR" />
		<meta property="og:type" content="website">
		<meta property="og:url" content="http://www.bsimagem.com" />
		<meta property="og:title" content="BS Imagem">
		<meta property="og:description" content="Representante Philips, LG, Linet, LivaNova, DRGem e FutureMed.">
		<meta property="og:image" itemprop="image" content="http://www.bsimagem.com/img/logo-redes-sociais.jpg">
		<link itemprop="thumbnailUrl" href="http://www.bsimagem.com/img/logo-redes-sociais.jpg"> 
		<meta property="og:image:type" content="image/jpeg">
		<meta property="og:image:width" content="300">
		<meta property="og:image:height" content="300">
		<meta property="og:updated_time" content="updatedtime">
		<!-- link para redes sociais -->
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
		<script src="js/global.js"></script>
		<script language="JavaScript">
			<!--
			function MM_jumpMenu(targ,selObj,restore){ //v3.0
				eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
				if (restore) selObj.selectedIndex=0;
			}
			//-->
		</script>
	</head>
	
	<body>
		<span id="butt"></span>
         <?php include_once "lgpd/session.php"; ?>
		
		<main>
			<section id="topo">
				<?php include("i-topo.php"); ?>
			</section>
			
			
			<section id="menu">
				<?php include("i-menu.php"); ?>
			</section>
			
			
			<div class="labelPage">Produto / Detalhamento</div>
			
			
			<section id="conteudoInt">
				<img src="<?php echo $imgProduto; ?>" class="imgProduto"  />
				<div class="blocoRightInterna">
					<img src="<?php echo $path.$logomarca; ?>"  width='120' style="margin-bottom:15px"  />
					<span class="tituloPadrao"><?php echo $titulo; ?></span>
					<span class='labelBlocoCor'><?php echo $nomeMarca." / ".$tituloLinha; ?></span>
					<p class="textoPadrao"><?php echo $descricao; ?></p>
					
					<button class="btn-whatsapp" onclick="solicitaContato();">
						<i class="fa fa-whatsapp iconwpp" aria-hidden="true"></i>
						Solicitar orçamento
					</button>

					<br />
					<a href="#" onclick="window.history.back();" class="textoLinkPadrao">&#9664; Voltar</a>
					<br />				
					
				</div>
			</section>
			
			
			
			<img src="img/tarja.png" class="tarja" />
			<footer id="rodape">
				<?php include("i-rodape.php"); ?>
			</footer>
            
		</main>
		
	
        <?php include("i-botao-ancora.php"); ?>
		
		<?php
			$sql = "SELECT celular FROM contatos WHERE tipo='default' ";
			$res = mysqli_query($conexao, $sql);
			while ($row = mysqli_fetch_array($res)) { 
				$id = $row['id'];
				$celular = $row['celular']; 
			}
		?>
		
		<script>
		function solicitaContato(){
			var cel = "<?php echo $celular; ?>";
			var url = "https://api.whatsapp.com/send?phone=";
			var link = url+cel;			
			window.open(link,'_blank');
			}
		</script>
		
		
	</body>
</html>								
