<?php
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "SELECT * FROM tb_conteudo WHERE tipo ='6' LIMIT 1 ";
$res = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res)) {
  $id = $row['id'];
  $pagina = $row['pagina'];
  $titulo = $row['titulo'];
  $texto = $row['texto'];
  $tipo = $row['tipo'];
}
?>
<section>
  <div class="label-page">
    <h3><?php echo $pagina; ?></h3>
  </div>

  <h1 class="title-page">
    <?php echo $titulo; ?>
  </h1>

  <p class="text-page">
    <?php echo $texto; ?>
  </p>

  <div class="col12" style="display:grid">
    <?php
    $sql = "SELECT * FROM tb_noticias WHERE status = 1 ";
    $res = mysqli_query($conexao, $sql);
    $qtd = mysqli_num_rows($res);
    while ($row = mysqli_fetch_array($res)) {
      $id = $row['id'];
      $titulo = $row['titulo'];
      $data = $row['data'];
      echo "<h4 class='new'><a href='novidade/$id' target='_top'><i class='fa fa-plus-circle' aria-hidden='true'></i>
$data - $titulo</a></h4>";
    }
    ?>
  </div>
</section>