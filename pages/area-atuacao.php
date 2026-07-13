<?php
$idmarca = !empty($_GET['m']) ? $_GET['m'] : 0;
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

<script src="public/js/area-atuacao.js"></script>
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


  <!-- filtro -->
  <div class="box-filtro col12">
    <h3>
      <i class="fa fa-filter" aria-hidden="true"></i>
      &nbsp;Filtro:
    </h3>
    <!-- Select Marca -->
    <select id="marca" onchange="setarMarca();" class="select">
      <option selected disabled>Marca</option>
      <?php
      $sql = "SELECT tm.id, tm.nome 
      FROM tb_marca AS tm, tb_area_atuacao AS taa 
      WHERE tm.status= 1
      AND taa.idmarca = tm.id";
      $res = mysqli_query($conexao, $sql);
      $qtd = mysqli_num_rows($res);
      while ($row = mysqli_fetch_array($res)) {
        $id_marca = $row['id'];
        $nome_marca = $row['nome'];
        $logomarca_marca = $row['logomarca'];
        echo "<option " . ($idmarca == $id_marca ? "selected" : "") . " value='$id_marca'>$nome_marca</option>";
      }
      ?>
    </select>
  </div>


  <?php
  $sql = "SELECT * FROM tb_area_atuacao WHERE idmarca='$idmarca' LIMIT 1";
  $res = mysqli_query($conexao, $sql);
  $qtd = mysqli_num_rows($res);
  while ($row = mysqli_fetch_array($res)) {
    $idmarca = $row['idmarca'];
    $legenda = $row['legenda'];
    $mapa = $row['mapa'];
    $texto = $row['texto'];
  }

  if (!empty($mapa)) {
    $mapa = "controlg/painel/files/" . $mapa;
  }

  if ($qtd < 1) {
    echo "<h4 class= 'alerta alert-info'><i class='fa fa-exclamation-circle' aria-hidden='true'></i>&nbsp;&nbsp;Selecione uma Marca</h4>";
    exit();
  }
  ?>


  <div class='col12 box-area'>

    <div class='box-bg-mapa'>
      <img src='<?php echo $mapa; ?>' class='img-mapa' alt='mapa' />
    </div>

    <div class='box-texto-mapa'>

      <img src='controlg/painel/files/16030-logo-konica.png' class='img-logo' alt='mapa' />

      <div class='box-uf'>
        <i class='fa fa-map-marker' aria-hidden='true'></i>
        <?php echo $legenda; ?>
      </div>

      <strong>Contatos:</strong>
      <span class='box-contato'><?php echo $texto; ?></span>

    </div>
  </div>

</section>