<?php require_once "includes/slide.php"; ?>
<section class="col12 grupo-cards">

  <div class="card-light ">
    <div class="col12">
      <div class="hero">Novidades</div>
      <img src="public/imgs/ico-news.png" alt="icone" class="icon-card" />
    </div>
    <!-- <img src="controlg/painel/files/60480-flash.jpg" alt="capa" style="width:100%;margin-top:15px" /> -->
    <span class="data">10/11/2025</span>
    <h2>Philips inicia produção nacional do tomógrafo CT 5300, totalmente integrado com inteligência artific</h2>
    <a href="#">Philips inicia produção nacional do tomógrafo CT 5300,</a>
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


<div class="line-full textoPadrao"><span style="background:#fFf;padding:0 10px;">NOSSAS MARCAS</span></div>

<section class="box-marcas col12">
  <?php
  $path_files = "controlg/painel/files/";

  include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

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