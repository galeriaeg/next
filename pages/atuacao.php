<?php
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "SELECT * FROM tb_conteudo WHERE tipo ='3' LIMIT 1 ";
$res = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res)) {
  $id = $row['id'];
  $pagina = $row['pagina'];
  $titulo = $row['titulo'];
  $texto = $row['texto'];
  $tipo = $row['tipo'];
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

  <?php
  $sql = "SELECT * FROM tb_area_atuacao";
  $res = mysqli_query($conexao, $sql);
  $qtd = mysqli_num_rows($res);
  while ($row = mysqli_fetch_array($res)) {
    $idmarca = $row['idmarca'];
    $legenda = $row['legenda'];
    $mapa = $row['mapa'];
    $texto = $row['texto'];

    $mapa = "controlg/painel/files/" . $mapa;

    echo "<div class='col12' style='display:flex;align-items:top'>

    <div>
      <img src='controlg/painel/files/16030-logo-konica.png' width='150' alt='mapa' />
      <br />
      <span>$texto</span>
    </div>

    <img src='$mapa' width='200' alt='mapa' />
    <div>$legenda</div>
  </div>";
  }
  ?>
</section>