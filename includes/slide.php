<div id="box-slide">
  <?php
  include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
  $sql = "SELECT * FROM tb_slider WHERE status = 1 ";
  $res = mysqli_query($conexao, $sql);
  $qtd = mysqli_num_rows($res);
  while ($row = mysqli_fetch_array($res)) {
    $id = $row['id'];
    $img_desk = $row['img_desk'];
    $img_mob = $row['img_mob'];
    $link = $row['link'];
    $destino = $row['destino'];
    $idcard = "card" . $id;
    $img_desk = "controlg/painel/files/" . $img_desk;
    echo "<div class='card' style='background-image:url(\"$img_desk\")' id='$idcard'></div>";
  }
  ?>
</div>

<div class="navegacao">
  <?php
  $sql = "SELECT * FROM tb_slider WHERE status = 1 ";
  $res = mysqli_query($conexao, $sql);
  while ($row = mysqli_fetch_array($res)) {
    $id = $row['id'];
    $link = $row['link'];
    $destino = $row['destino'];

    $idcard = "#card" . $id;
    echo "<a href='$idcard'></a>";
  }
  ?>
</div>

<img src="public/imgs/sombra-slide.png" class="sombra-slide" alt="sombra" />

<script src="public/js/slide.js"></script>