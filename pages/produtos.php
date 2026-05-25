<section>
  <div class="label-page">
    <h3>Produtos</h3>
  </div>

  <h1 class="title-page">
    Nossas linhas de produtos
  </h1>

  <p class="text-page">
    A Next possui uma linha completa de produtos capazes de atender as mais variadas necessidades. Com constantes investimentos em tecnologia e em atenção aos nossos clientes, buscamos oferecer as melhores soluções do mercado.
  </p>


  <!-- filtro -->
  <div class="box-filtro col12">
    <h3>
      <i class="fa fa-filter" aria-hidden="true"></i>
      &nbsp;Filtro:
    </h3>
    <select class="select">
      <option selected disabled>Marca</option>
      <option>Konika Minota</option>
      <option>Philips</option>
    </select>
    <select class="select">
      <option selected disabled>Linha</option>
      <option>Linha 1</option>
      <option>Linha 2</option>
      <option>Linha 3</option>
    </select>
    <span class="tag">&#10006;&nbsp;&nbsp;Philips</span>
  </div>

  <!-- Logo Marca parceira -->
  <div>
    <img src="public/imgs/logo-philips.png" class="logo-produto" alt="logo">
  </div>


  <!-- Lista de registros/produtos  -->
  <div class="col12 card-grupo">
    <?php
    $limit = 1;
    while ($limit < 10) {

      if ($limit % 4 == 0) {
        echo "<div class='card-produto card-last'>
        <a href='/next/produto?p=$limit'>
          <div class='box-imagem'>
            <img src='public/imgs/aerodrx10.jpg' alt='prod' />
          </div>
         </a>
        <h2><i class='fa fa-arrow-circle-o-right' aria-hidden='true'></i> Ingenia Elition 3.0T FIM </h2>
        <h4>Philips - Ressonância Magnética final $limit</h4>
        </div>";
        echo "<div class='col12 hr'></div>";
      } else {
        echo "<div class='card-produto card-first'>
        <a href='/next/produto?p=$limit'>
          <div class='box-imagem'>
            <img src='public/imgs/rosem.jpg' alt='prod' />
          </div>
        </a>
        <h2><i class='fa fa-arrow-circle-o-right' aria-hidden='true'></i> Ingenia Elition 3.0T</h2>
        <h4>Philips - Ressonância Magnética $limit</h4>
        </div>";
      }
      $limit++;
    }
    ?>
  </div>
</section>
<script src="public/js/produtos.js"></script>