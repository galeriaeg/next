<section>
  <div class="label-page">
    <h3>Produtos</h3>
  </div>

  <div class="title-page">
    <h1>
      Nossas linhas de produtos
    </h1>
  </div>

  <p class="text-page">
    A Next possui uma linha completa de produtos capazes de atender as mais variadas necessidades. Com constantes investimentos em tecnologia e em atenção aos nossos clientes, buscamos oferecer as melhores soluções do mercado.
  </p>

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


  <div>
    <img src="public/imgs/logo-philips.png" class="logo-produto" alt="logo">
  </div>

  <div class="col12 card-grupo">

    <?php
    $limit = 1;
    while ($limit < 10) {

      //TESTE 1
      // if ($limit % 4 == 0) {
      //   echo "<div class='card-produto card-last'>
      //   <div class='box-imagem'>
      //     <img src='public/imgs/aerodrx10.jpg' alt='prod' />
      //   </div>
      //   <h2>Ingenia Elition 3.0T</h2>
      //   <h4>Philips - Ressonância Magnética final $limit</h4>
      // </div>";
      //   echo "<div style='width:100%;height:1px;background:blue' class='col12'></div>";
      // } else {
      //   echo "<div class='card-produto  card-first'>
      //   <div class='box-imagem'>
      //     <img src='public/imgs/rosem.jpg' alt='prod' />
      //   </div>
      //   <h2>Ingenia Elition 3.0T</h2>
      //   <h4>Philips - Ressonância Magnética $limit</h4>
      // </div>";
      // }


      if ($limit % 4 == 0) {
        echo "<div class='card-produto card-last'>
         <div class='box-imagem'>
          <img src='public/imgs/aerodrx10.jpg' alt='prod' />
         </div>
        <h2>Ingenia Elition 3.0T FIM </h2>
        <h4>Philips - Ressonância Magnética final $limit</h4>
        </div>";
        echo "<div class='col12 hr'></div>";
      } else {
        echo "<div class='card-produto card-first'>
         <div class='box-imagem'>
          <img src='public/imgs/rosem.jpg' alt='prod' />
        </div>
        <h2>Ingenia Elition 3.0T</h2>
        <h4>Philips - Ressonância Magnética $limit</h4>
        </div>";
      }

      $limit++;
    }
    ?>




  </div>
</section>