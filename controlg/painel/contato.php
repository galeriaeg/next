<?php
	//LGPD
	session_cache_expire();
	
	if (session_id() == ""){
		session_start();
	}
    
    $aviso = $_GET['send'];
    
    if($aviso=='true'){
        $display = "display:flex;";
    }
    else{
     $display = "display:none;";
    }
    
?>
<?php
	include("controlg/conecta.php");
	
	// CONSULTA USUARIO LOGADO
	$sql = "SELECT * FROM conteudo WHERE tipo ='4' ";
	$res = mysqli_query($conexao, $sql);
	while ($row = mysqli_fetch_array($res)) { 
		$id = $row['id'];
		$pagina = $row['pagina'];
		$titulo = $row['titulo'];
		$texto = $row['texto'];
		$tipo = $row['tipo'];
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
			
			
			<div class="labelPage"><?php echo $pagina; ?></div>
			<section id="conteudoInt">
				
				<span class="tituloPadrao"><?php echo $titulo; ?></span>  
				<p class="textoPadrao">
					<?php echo $texto; ?>
				</p>
				</br>
				<form name="formContato" method="post" action="mail.php" onsubmit="return checaContato(this)">
                    
                    <div class="box-aviso" style="<?php echo $display;?>"><img alt="icon sucesso" src="img/icone-check.png"/>&nbsp;&nbsp;Mensagem enviada com sucesso!</div>
                    
					<label>Nome:</label>
					<input type="text" class="campo_g" name="nome">
					<label>Email:</label>
					<input type="text" class="campo_g" name="email">
					<label>Telefone:</label>
					<input type="text" onKeyUp="javascript:somente_numero(this);" onkeypress="mascaraTel(this,'##-########')" maxlength="12" size="15" class="campo_p" name="fone">
					<label>Estado:</label>
					<select class="campo_p" style="width:21.6%;" name="uf">
						<option value=''></option>
						<option value='AC'>AC</option>
						<option value='AL'>AL</option>
						<option value='AM'>AM</option>
						<option value='AP'>AP</option>
						<option value='BA'>BA</option>
						<option value='CE'>CE</option>
						<option value='DF'>DF</option>
						<option value='ES'>ES</option>
						<option value='GO'>GO</option>
						<option value='MA'>MA</option>
						<option value='MG'>MG</option>
						<option value='MS'>MS</option>
						<option value='MT'>MT</option>
						<option value='PA'>PA</option>
						<option value='PB'>PB</option>
						<option value='PE'>PE</option>
						<option value='PI'>PI</option>
						<option value='PR'>PR</option>
						<option value='RJ'>RJ</option>
						<option value='RN'>RN</option>
						<option value='RO'>RO</option>
						<option value='RR'>RR</option>
						<option value='RS'>RS</option>
						<option value='SC'>SC</option>
						<option value='SE'>SE</option>
						<option value='SP'>SP</option>
						<option value='TO'>TO</option>
					</select>
					
					<label>Cidade:</label>
					<input type="text" class="campo_p" name="cidade">
					<label>Mensagem:</label>
					<textarea class="campo_m" rows="8" name="mensagem"></textarea>
					
					
					<?php include("i-gera-captcha.php")?>
					<label>Repita o código: <strong><?php echo $ran; ?></strong></label>
					<input type="text" onkeyup="javascript:somente_numero(this);" maxlength="4" class="campo_p" name="captchaAdd" />
					<input type="hidden" value="<?php echo $ran; ?>" name="captchaRan" />
					
					  <div style="margin:20px 0 30px 0" class="col1">
						<input type="checkbox" id="newsletter" name="newsletter" checked />
						<span class="textoPuro" style="display:inline">Aceito receber informações por email</span>
					  </div>
					
					<input class="botaoPadrao" type="submit" value="ENVIAR" />
				</form>
				
				
			</section>
			
			<img src="img/tarja.png" class="tarja" />
			<footer id="rodape">
				<?php include("i-rodape.php"); ?>
			</footer>
			
		</main>
		
		<?php include("i-botao-ancora.php"); ?>
		
	</body>
</html>								
