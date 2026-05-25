<?php $idProduto = $_GET['p']; ?>

<!-- filtro -->
<section>
  <div class="label-page">
    <h3>Produto/Detalhamento</h3>
  </div>

  <div class="box-conteudo">
    <article class="col3" id="article" style="transition:0.3s;">
      <img src="public/imgs/rosem.jpg" alt="foto do produto" class="img-produto" />
      <i onclick="ampliarImagem();">ampliar</i>
      <i onclick="reduzirImagem();">reduzir</i>
    </article>

    <div class="col9 info-produto" id="main" style="transition:0.3s;">
      <div class="col12" style="margin-bottom:40px;display:inline-flex">
        <img src="public/imgs/logo-philips.png" alt="foto do produto" class="img-logo-produto" />
      </div>
      <h1 class="title-page">Ingenia Elition 3.0T</h1>
      <h3 class="marca-linha-produto">Marca/Linha <?php echo $idProduto; ?></h3>
      <p class="text-page">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
        when an unknown printer took a galley of type and scrambled it to make a type
        specimen book. It has survived not only five centuries, but also the leap into
        electronic typesetting, remaining essentially unchanged. It was popularised
        in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
        and more recently with desktop publishing software like Aldus PageMaker including
        versions of Lorem Ipsum.
      </p>

      <button class="btn-whatsapp">
        <i class="fa fa-whatsapp" aria-hidden="true"></i>
        Solicitar orçamento
      </button>


      <p>
        <a href="produtos" style="text-decoration:none">
          <i class="fa fa-long-arrow-left btn-back" aria-hidden="true"></i>
          Voltar
        </a>
      </p>

    </div>

  </div>

</section>

<script src="public/js/produtos.js"></script>