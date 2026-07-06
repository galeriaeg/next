<?php
require_once "includes/slide.php";

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
?>

<section class="col12 grupo-cards">

  <div class="card-light ">
    <div class="col12">
      <div class="hero">Novidades</div>
      <img src="public/imgs/ico-news.png" alt="icone" class="icon-card" />
    </div>
    <?php
    $sql = "SELECT id, titulo, descricao, data FROM tb_noticiaS WHERE status =1 ORDER BY ID DESC LIMIT 1 ";
    $res = mysqli_query($conexao, $sql);
    $qtd = mysqli_num_rows($res);
    while ($row = mysqli_fetch_array($res)) {
      $id = $row['id'];
      $titulo = $row['titulo'];
      $descricao = $row['descricao'];
      $data = $row['data'];
    }
    ?>
    <span class="data"><?php echo $data; ?></span>
    <h2><?php echo $titulo; ?></h2>
    <a href="novidade?n=<?php echo $id; ?>">
      <?php echo mb_strimwidth($descricao, 0, 88, "..."); ?>
    </a>
  </div>

  <div class="card-light">
    <div class="col12">
      <div class="hero">Soluções</div>
      <img src="public/imgs/ico-solucoes.png" alt="icone" class="icon-card" />
    </div>
    <h2>Estamos sempre atentos às novas tecnologias e às necessidades dos nossos clientes.</h2>
    <a href="#">
      Nossas parcerias com grandes marcas do mercado garantem seriedade, segurança e tecnologia de ponta.</a>
  </div>

  <div class="card-solid">
    <div class="col12">
      <div class="hero">Área de atuação</div>
      <img src="public/imgs/ico-mapa.png" alt="icone" class="icon-card" />
    </div>
    <h2>Estamos sempre atentos às novas tecnologias e às necessidades dos nossos clientes.</h2>
    <a href="#" class="a">
      Nossas parcerias com grandes marcas do mercado garantem seriedade, segurança e tecnologia de ponta.</a>
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