<?php
	//LGPD
	session_cache_expire();
	
	if (session_id() == ""){
		session_start();
	}
?>
<?php
	@$idMarca = $_GET['m'];
	@$idLinha = $_GET['l'];
	
	include("controlg/conecta.php");
	
	$sql = "SELECT * FROM conteudo WHERE tipo ='2' ";
	$res = mysqli_query($conexao, $sql);
	while ($row = mysqli_fetch_array($res)) { 
		$id = $row['id'];
		$pagina = $row['pagina'];
		$titulo = $row['titulo'];
		$texto = $row['texto'];
		$tipo = $row['tipo'];
	}
	
	
	if($idMarca<1)
	$idLinha=0;
	
	
	if(!empty($idMarca)){
		$sql = "SELECT * FROM marca WHERE id='$idMarca' ";
		$res = mysqli_query($conexao, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$id_marca = $row['id'];
			$nome_marca = $row['nome'];
			$logomarca_marca = $row['logomarca'];
			
			if(!empty($logomarca_marca))
			$logomarca = "controlg/painel/files/".$logomarca_marca; 

		}
	}
	else{
		$idMarca="";
		$logo="filete-branco.jpg";
		$logomarca="img/".$logo;
		$disp = "display:none;";
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
			
			
			<div class="labelPage"><?php echo $pagina; ?></div>
			<section id="conteudoInt">
				<a name="p"></a>
				<span class="tituloPadrao"><?php echo $titulo; ?></span>  
				<p class="textoPadrao">
					<?php echo $texto; ?>
					<a name="focus"></a>
				</p>

				
				
				<img src="<?php echo $logomarca; ?>" style="<?php echo $disp; ?>" class="logomarca-lista" />
				
				<?php
					$sql = "SELECT titulo FROM linha WHERE id = '$idLinha'  ";
					$res = mysqli_query($conexao, $sql);
					while ($row = mysqli_fetch_array($res)) { 
						$titulolinha = $row['titulo'];
						echo "<div class='textoLegendaProdutos'><b>$titulolinha</b></div>";
					}
				?>
				
				
				<section class="box-filtro">
					<select class="campoPadraoMetade" name="select" onChange="MM_jumpMenu('parent',this,1)">
						<option disabled selected>&nbsp; &#9656; Marca</option>
						<?php
							$sql = "SELECT * FROM marca WHERE status=1";
							$res = mysqli_query($conexao, $sql);
							while ($row = mysqli_fetch_array($res)) { 
								$id_marca = $row['id'];
								$nome_marca = $row['nome'];
								$logomarca_marca = $row['logomarca'];
								
								if($idMarca==$id_marca)
								echo "<option selected value='produtos.php?m=$id_marca#focus'>$nome_marca</option>";
								else
								echo "<option value='produtos.php?m=$id_marca#focus'>$nome_marca</option>";
							}
						?>
					</select>
					

					
					<select class="campoPadraoMetade" name="select" onChange="MM_jumpMenu('parent',this,1)">
						<?php
							if($idMarca<1)
							echo "<option></option>";
							else
							echo "<option>&nbsp;&#9656; Linha</option>";
							
							$sql = "SELECT * FROM linha WHERE idmarca = '$idMarca'  ";
							$res = mysqli_query($conexao, $sql);
							while ($row = mysqli_fetch_array($res)) { 
								$id_linha = $row['id'];
								$titulo_linha = $row['titulo'];
								$idmarca_linha = $row['idmarca'];
								
								if(($idMarca==$idmarca_linha)&&($idLinha==$id_linha))
								echo "<option selected value='produtos.php?m=$idMarca&l=$id_linha#focus'>$titulo_linha</option>";
								else
								echo "<option value='produtos.php?m=$idMarca&l=$id_linha#focus'>$titulo_linha</option>";
							}
						?>
					</select>
				
				</section>
				
				
				<div class="box-produtos-lista">
					
					<?php
						
						$path = "controlg/painel/files/";
						$i=1;
						$j=1;
						
						if(($idMarca>0)and($idLinha<1)){
                            
                            $sql="SELECT tp.*, tp.id AS idProduto,tm.nome AS nomeMarca, tm.logomarca AS logoMarca, tl.id AS id_linha, tl.titulo AS titulo_linha
                            FROM produto tp, marca tm, linha tl
                            WHERE tp.idmarca = '$idMarca'
                            AND tm.id = tp.idmarca
                            AND tp.idlinha = tl.id
                            AND tp.status = 1";
							$res = mysqli_query($conexao, $sql);
							while ($row = mysqli_fetch_array($res)) { 
								$id_p = $row['id'];
								$titulo_p = $row['titulo'];
								$descricao_p = $row['descricao'];
								$foto_p = $row['foto'];
								$idmarca_p = $row['idmarca'];
								$idlinha_p = $row['idlinha'];
                                $idProduto = $row['idProduto'];
                                
                                $titulolinha = $row['titulo_linha'];
								
								//$idm = $row['idm'];
								$nomeMarca = $row['nomeMarca'];
								//$lgm = $row['lgm'];
                                
                                if(empty($foto_p)){
									$fotoproduto = "controlg/painel/imgs/sem_produto.jpg";
								}
								else{
									$fotoproduto = $path.$foto_p;
								}
                                
								
								if($i%4==0){
									echo "<div class='blocoProdutoRight'>
									<a href='produto.php?m=$idmarca_p&l=$idlinha_p&p=$id_p'>
									<img src='$fotoproduto' alt='item-$titulo_p' class='imgProdutoDestaque' />
									</a>
									<a href='produto.php?m=$idmarca_p&l=$idlinha_p&p=$id_p' class='tituloDestaque' style='float:left;width:100%'>$titulo_p</a>
									<div class='labelBlocoCor'>$nomeMarca - $titulolinha</div>
									</div>";
								}
								else{
									echo "<div class='blocoProdutoLeft'>	
									<a href='produto.php?m=$idmarca_p&l=$idlinha_p&p=$id_p'>
									<img src='$fotoproduto' alt='item-$titulo_p' class='imgProdutoDestaque' />
									</a>
									<a href='produto.php?m=$idmarca_p&l=$idlinha_p&p=$id_p' class='tituloDestaque' style='float:left;width:100%'>$titulo_p</a>
									<div class='labelBlocoCor'>$nomeMarca - $titulolinha</div>
									</div>";
								}
								
								if($i%4==0)
								echo "<div class='divisao-box-produto'></div>";
								
								$i++;
								
								
								
							}
							
							
							
						}
						
						
						
						
						if(($idMarca>0)and($idLinha>0)){
							
							$qr = "
							SELECT tp.id AS idproduto, tp.titulo, tp.descricao, tp.foto, tp.idmarca, tp.idlinha,
							tm.*, tl.id, tl.titulo AS titlinha, tl.idmarca AS idm
							FROM produto tp, marca tm, linha tl
							WHERE tp.idmarca = '$idMarca' 
							AND tm.id = $idMarca
							AND tp.idlinha = $idLinha 
							AND tl.id = $idLinha
							AND tp.status = '1'
							";
							$re = mysqli_query($conexao, $qr);
							$qtd = mysqli_num_rows($re);
							while ($row = mysqli_fetch_array($re)) { 
								$id_p = $row['id'];
								$idproduto = $row['idproduto'];
								$titulo_p = $row['titulo'];
								$descricao_p = $row['descricao'];
								$foto_p = $row['foto'];
								$idmarca_p = $row['idmarca'];
								$idlinha_p = $row['idlinha'];
								
								$idmarca_m = $row['id'];
								$nome_m = $row['nome'];
								$logo_m = $row['logomarca'];
								
								$idlinha_l = $row['id'];
								$titulo_l = $row['titlinha'];
								$idmarca_l = $row['idm'];
								
                                
                                if(empty($foto_p)){
									$fotoproduto = "controlg/painel/imgs/sem_produto.jpg";
								}
								else{
									$fotoproduto = $path.$foto_p;
								}
                                
                                
								if($j%4==0){
									echo "<div class='blocoProdutoRight'>
									<a href='produto.php?m=$idmarca_p&l=$idlinha_p&p=$idproduto#p'>
									<img src='$fotoproduto' alt='item-$titulo_p' class='imgProdutoDestaque' /> 
									</a>
									<a class='tituloDestaque' href='produto.php?m=$idmarca_p&l=$idlinha_p&p=$idproduto#p' style='float:left;width:100%'>$titulo_p</a>
									<div class='labelBlocoCor'>$nome_m - $titulo_l</div>
									</div>";
								}
								else{
									echo "<div class='blocoProdutoLeft'>
									<a href='produto.php?m=$idmarca_p&l=$idlinha_p&p=$idproduto#p'>
									<img src='$fotoproduto' alt='item-$titulo_p' class='imgProdutoDestaque' />
									</a>
									<a href='produto.php?m=$idmarca_p&l=$idlinha_p&p=$idproduto#p' class='tituloDestaque' style='float:left;width:100%'>$titulo_p</a>
									<div class='labelBlocoCor'>$nome_m - $titulo_l</div>
									</div>";
								}
								
								
								if($j%4==0)
								echo "<div class='divisao-box-produto'></div>";
								
								$j++;
								
							}
							
							
						}
						
						
						
						
						if (($idMarca<>"") and ($idLinha<>"") and($qtd<1))
						echo "<strong class='textoPadrao'>Não há produtos para sua busca</strong>";
					?>	
					
				</div>
				
				
				
				
			</section>
			
			<img src="img/tarja.png" class="tarja" />
			<footer id="rodape">
				<?php include("i-rodape.php"); ?>
			</footer>
			
		</main>
		
		<?php include("i-botao-ancora.php"); ?>
		
	</body>
</html>													
