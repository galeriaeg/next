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
}
// Se não existir produto manda usuário pra Home
if ($qtd < 1) {
  echo "<script>window.location.href='home'</script>";
  exit();
}
?>

<section>
  <div class="label-page">
    <h3><?php echo $pagina; ?></h3>
  </div>

  <h1 class="title-page">
    <?php echo $titulo; ?>
  </h1>

  <p class="text-page p">
    <?php echo $texto; ?>
  </p>

  <div class="col12" style="display:grid">
    <?php
    $sql = "SELECT * FROM tb_noticias WHERE status = 1 ORDER BY data DESC ";
    $res = mysqli_query($conexao, $sql);
    $qtd = mysqli_num_rows($res);
    while ($row = mysqli_fetch_array($res)) {
      $id = $row['id'];
      $titulo = $row['titulo'];
      $data = $row['data'];

      $date = new DateTime($data);
      $data_exibir = $date->format('d/m/Y');

      echo "<h4 class='new'>
      <a href='novidade?n=$id' target='_top'>
        <i class='fa fa-plus-circle' aria-hidden='true'></i>&nbsp;&nbsp; $data_exibir - $titulo
      </a></h4>";
    }
    // Se não existir conteúdo manda usuário pra Home
    if ($qtd < 1) {
      echo "<script>window.location.href='home'</script>";
      exit();
    }
    ?>
  </div>
</section>

<nav class="box-paginacao">
  <button id="prev" onclick="mudarPagina(-1)">&#129032;</button>
  <span id="label" class="legenda">Página 1</span>
  <button id="next" onclick="mudarPagina(1)">&#129034;</button>
</nav>
<script src="public/js/pagination.js"></script>