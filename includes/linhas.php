<section class="col12 box-linhas">
  <?php
  $path = "controlg/painel/files/";

  include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
  $sql = "SELECT * FROM tb_linhas_cards ORDER BY id ASC";
  $cons = $conexao->query($sql) or die($conexao->error);
  while ($row = $cons->fetch_array()) {
    $idCard =   $row['id'];
    $idlinha  =  $row['idlinha'];
    $nomeCard  =  $row['nome'];
    $anexoCard  =  $row['anexo'];
    $statusCard = $row['status'];

    $anexoCard = $path . $anexoCard;

    echo "<div class='card-linha'>
    <span class='nome-linha'>$nomeCard</span>
    <img src='$anexoCard' alt='$nomeCard'>
  </div>";
  }
  ?>
  <!-- <div class="card-linha">
    <span class="nome-linha">Ressonância Magnética</span>
    <img src="./public/imgs/card-r-m.jpg" alt="produto">
  </div>
  <div class="card-linha">
    <span class="nome-linha">Raio X</span>
    <img src="./public/imgs/card-r-x.jpg" alt="produto">
  </div>
  <div class="card-linha">
    <span class="nome-linha">Ultrassom</span>
    <img src="./public/imgs/card-u.jpg" alt="produto">
  </div>
  <div class="card-linha">
    <span class="nome-linha">Tomografia</span>
    <img src="./public/imgs/card-tmg.jpg" alt="produto">
  </div>
  <div class="card-linha">
    <span class="nome-linha">Arco Cirúrgico</span>
    <img src="./public/imgs/card-a-c.jpg" alt="produto">
  </div>
  <div class="card-linha">
    <span class="nome-linha">Homodinamica</span>
    <img src="./public/imgs/card-h.jpg" alt="produto">
  </div>
  <div class="card-linha">
    <span class="nome-linha">Mamografia</span>
    <img src="./public/imgs/card-m-dr.jpg" alt="produto">
  </div> -->
</section>

<div class="col12" style="text-align: center;">
  <img src="./public/imgs/btn-prev-off.png" class="btn-prev" onmouseover="iniciarRolagem(-1)" onmouseout="pararRolagem()" />
  <img src="./public/imgs/btn-next-off.png" class="btn-next" onmouseover="iniciarRolagem(1)" onmouseout="pararRolagem()" />
</div>

<script src="./public/js/linhas.js"></script>