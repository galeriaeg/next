<section class="col12 box-linhas">
  <?php
  $path = "controlg/painel/files/";

  include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
  $sql = "SELECT * FROM tb_linhas_cards WHERE status = 1  ORDER BY nome ASC";
  $cons = $conexao->query($sql) or die($conexao->error);
  while ($row = $cons->fetch_array()) {
    $idCard =   $row['id'];
    $idlinha  =  $row['idlinha'];
    $nomeCard  =  $row['nome'];
    $anexoCard  =  $row['anexo'];
    $statusCard = $row['status'];

    $anexoCard = $path . $anexoCard;

    echo "<div class='card-linha' onclick='abrirPagina()'>
    <span class='nome-linha'>$nomeCard</span>
    <span class='label-linha'>+ Consultar</span>
    <img src='$anexoCard' alt='$nomeCard'>
  </div>";
  }
  ?>
</section>

<div class="col12" style="text-align: center;">
  <img src="./public/imgs/btn-prev-off.png" class="btn-prev" onmouseover="iniciarRolagem(-1)" onmouseout="pararRolagem()" />
  <img src="./public/imgs/btn-next-off.png" class="btn-next" onmouseover="iniciarRolagem(1)" onmouseout="pararRolagem()" />
</div>

<script src="./public/js/linhas.js"></script>