<h5 class="box-footer">

  <div class="box-footer-pri">
    <img src="public/imgs/logo.png" alt="logo rodapé" class="logo-footer" />
    R. Barão de São Borja, 62 - Room 501. 50070-325 <br />
    Boa Vista, Recife - PE, 50070-325<br />
    NextMed Soluções em Saúde © Copyright 2026
    <br /><br />
    <a href="https://www.galeriadesigneweb.com.br/" target="_blank">Dev: Galeria Design & Web</a>
  </div>

  <div class="box-footer-sec">
    <strong style="margin-bottom: 5px;">Menu</strong>
    <a href="home">&#8226; Home</a>
    <a href="sobre">&#8226; Sobre</a>
    <a href="produtos">&#8226; Produtos</a>
    <a href="atuacao">&#8226; Área de atuação</a>
    <a href="contato">&#8226; Contato</a>
  </div>

  <div class="box-footer-ter">
    <strong style="margin-bottom: 5px;">Soluções</strong>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

    $sql = "SELECT * FROM tb_linha ORDER by titulo ASC";
    $res = mysqli_query($conexao, $sql);
    while ($row = mysqli_fetch_array($res)) {
      $idLinha = $row['id'];
      $tituloLinha = $row['titulo'];
      $idmarca = $row['idmarca'];
      echo "<a href='produtos?m=$idmarca&l=$idLinha#focus'>&#8226; $tituloLinha</a>";
    }
    ?>
  </div>


</h5>