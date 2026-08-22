<?php //require_once "includes/slide.php"; 
?>
<!-- img src='public/imgs/sombra-slide.png' class="sombra-slide" alt='sombra' /-->

<?php include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php'); ?>

<section class="col12 grupo-cards">

  <!-- CARD NOVIDADES -->
  <div class="card-light ">
    <div class="col12">
      <div class="hero">Novidades</div>
      <img src="public/imgs/ico-news.png" alt="icone" class="icon-card" />
    </div>
    <?php
    $sql = "SELECT id, titulo, descricao, data FROM tb_noticias WHERE status =1 ORDER BY ID DESC LIMIT 1 ";
    $res = mysqli_query($conexao, $sql);
    $qtd = mysqli_num_rows($res);
    while ($row = mysqli_fetch_array($res)) {
      $id = $row['id'];
      $titulo = $row['titulo'];
      $descricao = $row['descricao'];
      $data = $row['data'];
    }
    ?>
    <span class="data"><?php echo (new DateTime($data))->format('d/m/Y'); ?></span>
    <h2><?php echo mb_strimwidth($titulo, 0, 68, "..."); ?></h2>
    <a href="novidade?n=<?php echo $id; ?>" class="a">
      <?php
      // 1. Remove todas as tags HTML do texto
      $texto_puro = strip_tags($descricao);
      // 2. Corta o texto limpo com segurança
      echo mb_strimwidth($texto_puro, 0, 100, "...");
      ?>
    </a>
  </div>

  <!-- CARD SOLUÇÕES -->
  <div class="card-light">
    <div class="col12">
      <div class="hero">Soluções</div>
      <img src="public/imgs/ico-solucoes.png" alt="icone" class="icon-card" />
    </div>
    <?php
    $sql = "SELECT titulo, texto FROM tb_conteudo WHERE tipo='7' LIMIT 1 ";
    $res = mysqli_query($conexao, $sql);
    $qtd = mysqli_num_rows($res);
    while ($row = mysqli_fetch_array($res)) {
      $titulo_s = $row['titulo'];
      $texto_s = $row['texto'];
    }
    ?>
    <h2><?php echo mb_strimwidth($titulo_s, 0, 88, "..."); ?></h2>
    <a href="produtos" class="aw"><?php echo mb_strimwidth($texto_s, 0, 120, "..."); ?></a>
  </div>


  <!-- CARD AREA DE ATUAÇÃO -->
  <div class="card-solid">
    <div class="col12">
      <div class="hero">Área de atuação</div>
      <img src="public/imgs/ico-mapa.png" alt="icone" class="icon-card" />
    </div>
    <?php
    $sql = "SELECT titulo, texto FROM tb_conteudo WHERE tipo='8' LIMIT 1 ";
    $res = mysqli_query($conexao, $sql);
    $qtd = mysqli_num_rows($res);
    while ($row = mysqli_fetch_array($res)) {
      $titulo_aa = $row['titulo'];
      $texto_aa = $row['texto'];
    }
    ?>
    <h2><?php echo mb_strimwidth($titulo_aa, 0, 88, "..."); ?></h2>
    <a href="produtos" class="aw"><?php echo mb_strimwidth($texto_aa, 0, 120, "..."); ?></a>
  </div>

</section>

<div class="line-full textoPadrao"><span style="background:#fFf;padding:0 10px;">NOSSOS PARCEIROS</span></div>

<section class="box-marcas col12">
  <?php
  $path_files = "controlg/painel/files/";

  $sql = "SELECT nome,logomarca,site FROM tb_marca WHERE status =1 ";
  $res = mysqli_query($conexao, $sql);
  $qtd = mysqli_num_rows($res);
  while ($row = mysqli_fetch_array($res)) {
    $nome = $row['nome'];
    $logomarca = $row['logomarca'];
    $site = $row['site'];

    $logomarca = $path_files . $logomarca;
    echo "<a href='$site' target='_blank'><img src='$logomarca' alt='$nome' class='marca-parceiro' /></a>";
  }
  ?>
</section>

<div class="line-full textoPadrao" style="filter: grayscale(1);"><span style="background:#fFf;padding:0 10px;">NOSSAS LINHAS DE PRODUTOS</span></div>

<section class="col12">
  <?php require_once "includes/linhas.php"; ?>
</section>